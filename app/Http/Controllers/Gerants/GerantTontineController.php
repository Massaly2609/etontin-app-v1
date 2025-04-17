<?php
namespace App\Http\Controllers\Gerants;

use App\Models\User;
use App\Models\Tontine;
use App\Models\Cotisation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GerantTontineController extends Controller
{
      /**
     * Affiche la liste des Tontines gérées par le gérant.
     */

    public function index()
    {
        $gerantId = auth()->id();

        // Récupérer les tontines paginées avec le nombre de participants
        $tontines = Tontine::where('gerant_id', $gerantId)
            ->withCount('participants')
            ->paginate(10);

        // Calculer les statistiques
        $activeTontinesCount = Tontine::where('gerant_id', $gerantId)
            ->where('dateFin', '>', now())
            ->count();

        $completedTontinesCount = Tontine::where('gerant_id', $gerantId)
            ->where('dateFin', '<=', now())
            ->count();

        // Total participants (somme des participants de toutes les tontines)
        $totalParticipants = DB::table('participants')
            ->whereIn('idTontine', function($query) use ($gerantId) {
                $query->select('id')
                    ->from('tontines')
                    ->where('gerant_id', $gerantId);
            })
            ->count();

        // Total collecté (somme des cotisations)
        $totalCollected = DB::table('cotisations')
            ->whereIn('idTontine', function($query) use ($gerantId) {
                $query->select('id')
                    ->from('tontines')
                    ->where('gerant_id', $gerantId);
            })
            ->sum('montant');

        return view('gerant.tontines.index', compact(
            'tontines',
            'activeTontinesCount',
            'completedTontinesCount',
            'totalParticipants',
            'totalCollected'
        ));
    }


    // // Création d'une tontine
    public function create()
    {
        return view('gerant.tontines.create', [
            'gerants' => User::where('profil', 'GERANT')->get()
        ]);
    }
    /**
     * Affiche les détails d'une Tontine spécifique.
     */
    public function show(Tontine $tontine)
    {
        // Vérifier que le gérant est bien responsable de cette Tontine
        if ($tontine->gerant_id !== auth()->user()->id) {
            abort(403, 'Accès non autorisé.');
        }

        // Récupérer les participants et les cotisations de la Tontine
        $participants = Participant::where('idTontine', $tontine->id)->get();
        $cotisations = Cotisation::where('idTontine', $tontine->id)->get();

        return view('gerant.tontines.show', compact('tontine', 'participants', 'cotisations'));
    }

    /**
     * Affiche le formulaire de modification d'une Tontine.
     */
    public function edit(Tontine $tontine)
    {
        // Vérifier que le gérant est bien responsable de cette Tontine
        if ($tontine->gerant_id !== auth()->user()->id) {
            abort(403, 'Accès non autorisé.');
        }

        return view('gerant.tontines.edit', compact('tontine'));
    }

    /**
     * Met à jour une Tontine.
     */
    public function update(Request $request, Tontine $tontine)
    {
        // Vérifier que le gérant est bien responsable de cette Tontine
        if ($tontine->gerant_id !== auth()->user()->id) {
            abort(403, 'Accès non autorisé.');
        }

        // Validation des données
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Mise à jour de la Tontine
        $tontine->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
        ]);

        return redirect()->route('gerant.tontines.index')->with('success', 'Tontine mise à jour avec succès.');
    }

    /**
     * Ajoute un participant à une Tontine.
     */
    public function addParticipant(Request $request, Tontine $tontine)
    {
        // Vérifier que le gérant est bien responsable de cette Tontine
        if ($tontine->gerant_id !== auth()->user()->id) {
            abort(403, 'Accès non autorisé.');
        }

        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'cni' => 'required|string|unique:participants,cni',
            'adresse' => 'required|string',
            'dateNaissance' => 'required|date',
        ]);

        // Création du participant
        Participant::create([
            'idUser' => auth()->user()->id, // Le gérant est l'utilisateur associé
            'tontine_id' => $tontine->id,
            'nom' => $request->nom,
            'cni' => $request->cni,
            'adresse' => $request->adresse,
            'dateNaissance' => $request->dateNaissance,
        ]);

        return redirect()->back()->with('success', 'Participant ajouté avec succès.');
    }
}

