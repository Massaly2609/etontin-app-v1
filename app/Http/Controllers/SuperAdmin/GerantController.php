<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Tontine;
use App\Models\Cotisation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;



class GerantController extends Controller
{

    // Affiche le tableau de bord du gérant
    public function dashboard()
    {
        $gerantId = auth()->id();

        // Statistiques principales
        $stats = [
            'managedTontinesCount' => Tontine::where('gerant_id', $gerantId)->count(),
            'activeParticipantsCount' => Participant::whereHas('tontine', fn($q) => $q->where('gerant_id', $gerantId))->count(),
            'totalCollected' => Cotisation::whereHas('tontine', fn($q) => $q->where('gerant_id', $gerantId))->sum('montant'),
            'latestTontines' => Tontine::where('gerant_id', $gerantId)
                ->withCount('participants')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
                ->each(function($tontine) {
                    $tontine->status = $tontine->dateFin > now() ? 'Active' : 'Terminée';
                    $tontine->progress = min(100, round(($tontine->participants_count / $tontine->nbreParticipant) * 100));
                })
        ];

        // Données pour le graphique des cotisations mensuelles
        $currentYear = date('Y');
        // Données pour le graphique des cotisations mensuelles
        $monthlyCotisations = DB::table('cotisations')
            ->join('tontines', 'cotisations.idTontine', '=', 'tontines.id')
            ->select(
                DB::raw('MONTH(cotisations.created_at) as month'),
                DB::raw('SUM(cotisations.montant) as total')
            )
            ->where('tontines.gerant_id', $gerantId)
            ->whereYear('cotisations.created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Préparer les données pour Chart.js (12 mois avec 0 par défaut)
        $cotisationsData = array_fill(1, 12, 0);
        foreach ($monthlyCotisations as $item) {
            $cotisationsData[$item->month] = $item->total;
        }

        // Données pour les graphiques
        $chartData = [
            'tontinesChart' => [
                'labels' => ['Actives', 'Terminées', 'À venir'],
                'data' => [
                    Tontine::where('gerant_id', $gerantId)
                        ->where('dateDebut', '<=', now())
                        ->where('dateFin', '>=', now())
                        ->count(),
                    Tontine::where('gerant_id', $gerantId)
                        ->where('dateFin', '<', now())
                        ->count(),
                    Tontine::where('gerant_id', $gerantId)
                        ->where('dateDebut', '>', now())
                        ->count()
                ],
                'colors' => ['#10B981', '#EF4444', '#3B82F6']
            ],
            'cotisationsChart' => [
                'labels' => ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
                'data' => array_values($cotisationsData), // Convertir l'array associatif en array indexé
                'color' => '#8B5CF6'
            ]
        ];
        // dd($chartData);
        return view('dashboard.gerant', array_merge($stats, $chartData));
    }

     // Affiche la liste des gérants
    public function index() {
            $gerants = User::gerants()
                    ->withCount('tontinesGerees')
                    ->paginate(10); // 10 éléments par page


        return view('superadmin.gerants.index', compact('gerants'));
    }

    // Affiche le formulaire de création d'un gérant
    public function create() {
        return view('superadmin.gerants.create');
    }

    // Enregistre un nouveau gérant
    public function store(Request $request)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'telephone' => 'required|unique:users,telephone',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8'
            ]);

            // Démarrer une transaction
            DB::beginTransaction();

            // Création du gérant
            User::create([
                'prenom' => $validated['prenom'],
                'nom' => $validated['nom'],
                'telephone' => $validated['telephone'],
                'email' => $validated['email'],
                'profil' => 'GERANT', // Ajout du profil
                'password' => Hash::make($validated['password']) // Sécurisation du mot de passe
            ]);

            // Valider la transaction
            DB::commit();

            // Message de succès
            return redirect()->route('superadmin.gerants.index')
                             ->with('success', 'Gérant créé avec succès.');

        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();

            // Message d'erreur
            return redirect()->back()->withInput()
                             ->with('error', 'Une erreur est survenue lors de l\'ajout du gérant : ' . $e->getMessage());
        }
    }
    // Affiche les détails d'un gérant
    public function show(User $gerant)
    {
        $gerant->loadCount('tontinesGerees');
        return view('superadmin.gerants.show', compact('gerant'));
    }

    // Affiche le formulaire de modification d'un gérant
    public function edit(User $gerant) {
        return view('superadmin.gerants.edit', compact('gerant'));
    }

    // Enregistre les modifications apportées à un gérant
    public function update(Request $request, User $gerant)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'telephone' => 'required|unique:users,telephone,' . $gerant->id,
                'email' => 'required|email|unique:users,email,' . $gerant->id,
                'password' => 'nullable|min:8'
            ]);

            // Démarrer une transaction
            DB::beginTransaction();

            // Gestion du mot de passe
            if (empty($validated['password'])) {
                unset($validated['password']);
            } else {
                $validated['password'] = Hash::make($validated['password']);
            }

            // Mise à jour du gérant
            $gerant->update($validated);

            // Valider la transaction
            DB::commit();

            // Message de succès
            return redirect()->route('superadmin.gerants.index')
                            ->with('success', 'Modifications sauvegardées avec succès.');

        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();

            // Message d'erreur
            flash()->error('Une erreur est survenue lors de la mise à jour du gérant : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // Supprime un gérant
    public function destroy(User $gerant)
    {
        try {
            // Démarrer une transaction
            DB::beginTransaction();

            // Suppression du gérant
            $gerant->delete();

            // Valider la transaction
            DB::commit();

            // Message de succès
            return redirect()->back()
                            ->with('success', 'Gérant supprimé avec succès.');

        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();

            // Message d'erreur
            flash()->error('Une erreur est survenue lors de la suppression du gérant : ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
