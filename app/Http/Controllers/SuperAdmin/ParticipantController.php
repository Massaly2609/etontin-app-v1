<?php

namespace App\Http\Controllers\SuperAdmin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tirage;
use App\Models\Tontine;
use App\Models\Cotisation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class ParticipantController extends Controller
{

    //     // Affiche la liste des participants
    public function index(Request $request)
        {
            // Récupération des filtres
            $filters = $request->only(['tontine_id']);

            // Requête de base avec eager loading
            $query = User::where('profil', 'PARTICIPANT')
                ->with(['tontines' => fn($q) => $q->select('id', 'libelle')])
                ->withCount('cotisations')
                ->latest();

            // Application des filtres
            $query->when($filters['tontine_id'] ?? false,
                fn($q, $tontineId) => $q->whereHas('cotisations',
                    fn($q) => $q->where('idTontine', $tontineId)
                )
            );

            // Pagination avec append des filtres
            $participants = $query->paginate($request->per_page ?? 10)
                ->appends($filters);

            $tontines = Tontine::pluck('libelle', 'id');

            return view('superadmin.participants.index', compact('participants', 'tontines', 'filters'));
    }

    // Affiche les détails d'un participant
    public function show(User $participant)
    {
        try {
            // Vérifier si le participant existe réellement
            if (!$participant) {
                abort(404, 'Participant introuvable.');
            }

            // Charger les relations nécessaires
            $participant->load([
                'tontines' => fn($q) => $q->withPivot('created_at'),
                'cotisations' => fn($q) => $q->with('tontine:id,libelle')
            ]);

            // Retourner la vue avec les données du participant
            return view('superadmin.participants.show', compact('participant'));

        } catch (\Exception $e) {
            // Gestion des erreurs et affichage d'un message
            return redirect()->route('superadmin.participants.index')
                             ->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    // Tontines disponibles
    public function availableTontines()
    {
        $user = auth()->user();

        $tontines = Tontine::where('dateFin', '>', now()) // Tontines non expirées
            ->whereDoesntHave('participants', function($query) use ($user) {
                $query->where('idUser', $user->id); // Où l'utilisateur n'est pas déjà membre
            })
            ->withCount('participants')
            ->paginate(10);

        return view('participant.tontines.available', [
            'tontines' => $tontines,
            'user' => $user,
            'canJoinMore' => $user->tontines()->active()->count() < 2
        ]);
    }
      // Mes tontines actives
    public function myTontines()
      {
          $tontines = Auth::user()->tontines()
              ->active()
              ->withCount('participants')
              ->paginate(10);

          return view('participant.tontines.mine', compact('tontines'));
    }

      // Formulaire d'inscription
    public function joinTontineForm(Tontine $tontine)
    {
      return view('participant.tontines.join', compact('tontine'));
    }

    // Traitement de l'inscription
    public function joinTontine(Request $request, Tontine $tontine)
    {
            $user = Auth::user();

            $request->validate([
                'moyen_paiement' => 'required|in:WAVE,OM,ESPECES',
                'montant' => 'required|numeric|min:'.$tontine->montant_de_base,
                'numero_transaction' => 'required_if:moyen_paiement,WAVE,OM|nullable|string|max:50'
            ]);

            try {
                DB::beginTransaction();

                // Solution 1: Mise à jour directe avec where()
                Participant::where('idUser', $user->id)
                        ->update(['idTontine' => $tontine->id]);

                // OU Solution 2: Via l'instance existante
                $participant = Participant::where('idUser', $user->id)->first();
                if ($participant) {
                    $participant->idTontine = $tontine->id;
                    $participant->save();
                }

                // Enregistrement de la cotisation
                Cotisation::create([
                    'idUser' => $user->id,
                    'idTontine' => $tontine->id,
                    'montant' => $request->montant,
                    'moyen_paiement' => $request->moyen_paiement,
                    'numero_transaction' => $request->numero_transaction
                ]);

                $tontine->increment('nbreParticipant');

                DB::commit();

                return redirect()->route('participant.tontines.show', $tontine)
                    ->with('success', 'Inscription réussie!');

            } catch (\Exception $e) {
                DB::rollBack();
                \Log::info('Avant mise à jour - Participant:', [$participant]);
                $updated = $participant->update(['idTontine' => $tontine->id]);
                \Log::info('Après mise à jour - Statut:', [$updated]);
                \Log::info('Après mise à jour - Participant:', [$participant->fresh()]);
                return back()->with('error', 'Erreur: '.$e->getMessage());
            }
    }
      // Détail d'une tontine
      public function showTontine(Tontine $tontine)
      {
          $user = Auth::user();
          $cotisations = $user->cotisationsForTontine($tontine->id)->get();

          return view('participant.tontines.show', compact('tontine', 'cotisations'));
      }

      // Quitter une tontine
      public function leaveTontine(Tontine $tontine)
      {
          $user = Auth::user();

          try {
              DB::beginTransaction();

              $user->tontines()->detach($tontine->id);
              $tontine->decrement('nbreParticipant');

              DB::commit();

              return redirect()->route('participant.tontines.index')
                  ->with('success', 'Vous avez quitté la tontine avec succès');

          } catch (\Exception $e) {
              DB::rollBack();
              return back()->with('error', 'Erreur: '.$e->getMessage());
          }
      }

      // Historique des cotisations
      public function cotisations()
      {
            $cotisations = Auth::user()->cotisations()
            ->with('tontine')
            ->latest()
            ->paginate(10); // Retourne un LengthAwarePaginator

          return view('participant.cotisations.index', compact('cotisations'));
      }

        // Dashboard du participant
        public function dashboard(Request $request)
        {
            $user = Auth::user();

            // Données pour le graphique
            $contributions = Cotisation::where('idUser', $user->id)
                ->selectRaw('SUM(montant) as total, DATE_FORMAT(created_at, "%Y-%m") as month')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $contributionMonths = $contributions->pluck('month')->map(function($date) {
                return \Carbon\Carbon::createFromFormat('Y-m', $date)->format('M Y');
            });

            $contributionAmounts = $contributions->pluck('total');

            // Prochaines échéances (exemple)
            $upcomingPayments = $user->tontines()->active()->get()->map(function($tontine) {
                return [
                    'tontine' => $tontine->libelle,
                    'amount' => $tontine->montant_de_base,
                    'date' => now()->addMonth() // À remplacer par la vraie logique de calcul
                ];
            });

            return view('dashboard.participant', [
                'tontines' => $user->tontines()->active()->get(),
                'allTontines' => Tontine::availableForUser($user->id)->withCount('participants')->take(5)->get(),
                'cotisations' => $user->cotisations()->latest()->take(5)->get(),
                'nextDraw' => $user->tontines()->active()->first()?->prochaineEcheance(),
                'contributionMonths' => $contributionMonths,
                'contributionAmounts' => $contributionAmounts,
                'upcomingPayments' => $upcomingPayments,
            ]);
        }
         // Nouvelle méthode pour gérer les cotisations
        public function createCotisation(Tontine $tontine)
        {
            // Vérifier que l'utilisateur est bien membre de la tontine
            if (!Auth::user()->tontines()->where('id', $tontine->id)->exists()) {
                abort(403, 'Vous n\'êtes pas membre de cette tontine.');
            }

            return view('participant.cotisations.create', compact('tontine'));
        }

        // Enregistrement de la cotisation
        public function storeCotisation(Request $request, Tontine $tontine)
        {
            $user = Auth::user();

            $request->validate([
                'moyen_paiement' => 'required|in:WAVE,OM,ESPECES',
                'montant' => [
                    'required',
                    'numeric',
                    'min:'.$tontine->montant_de_base,
                    function ($attribute, $value, $fail) use ($tontine, $user) {
                        $totalCotise = DB::table('cotisations')
                            ->where('idUser', $user->id)
                            ->where('idTontine', $tontine->id)
                            ->sum('montant');

                        if (($totalCotise + $value) > $tontine->montant_total) {
                            $reste = $tontine->montant_total - $totalCotise;
                            $fail("Vous avez déjà cotisé {$totalCotise} FCFA. Il reste {$reste} FCFA à payer.");
                        }
                    }
                ]
            ]);

            try {
                DB::beginTransaction();

                // 1. Vérification période de la tontine
                $today = now();
                if (!$today->between($tontine->dateDebut, $tontine->dateFin)) {
                    throw new \Exception("Période inactive. La tontine est ouverte du {$tontine->dateDebut} au {$tontine->dateFin}.");
                }

                // 2. Vérification fréquence
                $derniereCotisation = DB::table('cotisations')
                    ->where('idUser', $user->id)
                    ->where('idTontine', $tontine->id)
                    ->orderByDesc('created_at')
                    ->first();

                if ($derniereCotisation) {
                    $derniereDate = Carbon::parse($derniereCotisation->created_at);

                    switch ($tontine->frequence) {
                        case 'JOURNALIERE':
                            if ($derniereDate->isToday()) {
                                throw new \Exception('1 cotisation/jour maximum.');
                            }
                            break;
                        case 'HEBDOMADAIRE':
                            if ($derniereDate->diffInDays($today) < 7) {
                                throw new \Exception('1 cotisation/semaine maximum.');
                            }
                            break;
                        case 'MENSUEL':
                            if ($derniereDate->diffInDays($today) < 30) {
                                throw new \Exception('1 cotisation/mois maximum.');
                            }
                            break;
                    }
                }

                // 3. Insertion/Mise à jour en une requête
                DB::table('cotisations')->updateOrInsert(
                    ['idUser' => $user->id, 'idTontine' => $tontine->id],
                    [
                        'montant' => DB::raw('montant + ' . $request->montant),
                        'moyen_paiement' => $request->moyen_paiement,
                        'updated_at' => $today,
                        'created_at' => $derniereCotisation ? $derniereCotisation->created_at : $today
                    ]
                );

                // // 4. Mise à jour solde utilisateur
                // DB::table('users')
                //     ->where('id', $user->id)
                //     ->increment('montant', $request->montant);

                DB::commit();

                // 5. Calcul et message de confirmation
                $totalCotise = DB::table('cotisations')
                    ->where('idUser', $user->id)
                    ->where('idTontine', $tontine->id)
                    ->sum('montant');

                $reste = $tontine->montant_total - $totalCotise;
                $message = $reste > 0
                    ? "Cotisation enregistrée. Total: {$totalCotise}/{$tontine->montant_total} FCFA."
                    : "Participation complétée avec succès!";

                return redirect()->route('participant.tontines.show', $tontine)
                    ->with('success', $message);

            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Erreur: '.$e->getMessage())->withInput();
            }
        }
        //historique des cotisations
        public function historique()
        {
            $user = Auth::user();

            // Récupérer les cotisations avec pagination
            $cotisations = $user->cotisations()
                ->with('tontine')
                ->latest()
                ->get()
                ->map(function ($item) {
                    $item->type = 'cotisation';
                    return $item;
                });

            // Récupérer les tirages avec pagination
            $tirages = $user->tirages()
                ->with('tontine')
                ->latest()
                ->get()
                ->map(function ($item) {
                    $item->type = 'tirage';
                    $item->montant = $item->tontine->montant_de_base ?? 0;
                    return $item;
                });

            // Convertir en Collection Laravel et fusionner
            $historique = collect($cotisations)->merge($tirages)
                ->sortByDesc('created_at');

            // Pagination manuelle
            $page = request()->get('page', 1);
            $perPage = 10;
            $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
                $historique->forPage($page, $perPage),
                $historique->count(),
                $perPage,
                $page,
                ['path' => request()->url()]
            );

            return view('participant.historique.index', [
                'historique' => $paginated,
                'types' => [
                    'cotisation' => 'Cotisation',
                    'tirage' => 'Tirage'
                ]
            ]);
        }

}
