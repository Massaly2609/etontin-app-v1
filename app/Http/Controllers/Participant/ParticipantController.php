<?php

namespace App\Http\Controllers\Participant;

use App\Models\Tirage;
use App\Models\Tontine;
use App\Models\Cotisation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    /**
     * Affiche le tableau de bord du participant.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Récupérer l'ID du participant connecté
        $participantId = Auth::id();

        // Récupérer les tontines du participan t
        $tontines = Tontine::whereHas('participants', function ($query) use ($participantId) {
            $query->where('idUser', $participantId);
        })->get();

        // Récupérer les cotisations du participant
        $cotisations = Cotisation::where('idUser', $participantId)->get();

        // Récupérer les tirages du participant
        $tirages = Tirage::where('idUser', $participantId)->get();

        // Retourner la vue avec les données
        return view('participant.dashboard', compact('tontines', 'cotisations', 'tirages'));
    }
}
