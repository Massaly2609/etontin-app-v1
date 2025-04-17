<?php
namespace App\Http\Controllers\Gerants;

use App\Models\Tontine;
use App\Models\Cotisation;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GerantParticipantController extends Controller
{
    /**
     * Affiche la liste des participants des Tontines gérées par le gérant.
     */
    public function index()
    {
        // Récupérer les Tontines du gérant
        $tontines = Tontine::where('gerant_id', auth()->user()->id)->pluck('id');

        // Récupérer les utilisateurs participants à ces Tontines via la table `cotisations`
        $userIds = Cotisation::whereIn('idTontine', $tontines)->pluck('idUser')->unique();

        // Récupérer les participants correspondants
        $participants = Participant::whereIn('idUser', $userIds)->paginate(10);

        return view('gerant.participants.index', compact('participants'));
    }

    /**
     * Affiche les détails d'un participant.
     */


    public function show(Participant $participant)
    {
        // Récupérer les Tontines du gérant
        $tontines = Tontine::where('gerant_id', auth()->user()->id)->pluck('id');

        //verifier que le participant est inscrit dans une tontine

        // Vérifier que le participant est associé à une Tontine gérée par le gérant
        $isParticipantInManagedTontines = Cotisation::where('idUser', $participant->idUser)
            ->whereIn('idTontine', $tontines)
            ->exists();

        if (!$isParticipantInManagedTontines) {
            abort(403, 'Accès non autorisé.');
        }

        return view('gerant.participants.show', compact('participant', 'tontines'));
    }

    /**
     * Supprime un participant.
     */
    public function destroy(Participant $participant)
    {
        // Récupérer les Tontines du gérant
        $tontines = Tontine::where('gerant_id', auth()->user()->id)->pluck('id');

        // Vérifier que le participant est associé à une Tontine gérée par le gérant
        $isParticipantInManagedTontines = Cotisation::where('idUser', $participant->idUser)
            ->whereIn('idTontine', $tontines)
            ->exists();

        if (!$isParticipantInManagedTontines) {
            abort(403, 'Accès non autorisé.');
        }

        // Supprimer le participant
        $participant->delete();

        return redirect()->route('gerant.participants.index')->with('success', 'Participant supprimé avec succès.');
    }
}
