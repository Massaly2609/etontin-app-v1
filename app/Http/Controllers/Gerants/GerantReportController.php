<?php
namespace App\Http\Controllers\Gerants;

use App\Http\Controllers\Controller;

use App\Models\Tontine;
use App\Models\Participant;
use App\Models\Cotisation;

class GerantReportController extends Controller
{
    /**
     * Affiche le tableau de bord des rapports.
     */
    public function index()
    {
        // Récupérer les Tontines gérées par le gérant
        $tontines = Tontine::where('gerant_id', auth()->user()->id)->get();

        // Statistiques générales
        $totalTontines = $tontines->count();
        $totalParticipants = Participant::whereIn('idUser', function ($query) use ($tontines) {
            $query->select('idUser')
                  ->from('cotisations')
                  ->whereIn('idTontine', $tontines->pluck('id'));
        })->count();

        $totalCotisations = Cotisation::whereIn('idTontine', $tontines->pluck('id'))->sum('montant');

        return view('gerant.reports.index', compact('totalTontines', 'totalParticipants', 'totalCotisations'));
    }

    /**
     * Affiche un rapport détaillé sur les Tontines gérées.
     */
    public function tontinesReport()
    {
        // Récupérer les Tontines gérées par le gérant
        $tontines = Tontine::where('gerant_id', auth()->user()->id)->paginate(10);

        return view('gerant.reports.tontines', compact('tontines'));
    }

    /**
     * Affiche un rapport sur les participants des Tontines gérées.
     */
    public function participantsReport()
    {
        // Récupérer les Tontines gérées par le gérant
        $tontines = Tontine::where('gerant_id', auth()->user()->id)->pluck('id');

        // Récupérer les participants associés à ces Tontines
        $participants = Participant::whereIn('idUser', function ($query) use ($tontines) {
            $query->select('idUser')
                  ->from('cotisations')
                  ->whereIn('idTontine', $tontines);
        })->paginate(10);

        return view('gerant.reports.participants', compact('participants'));
    }

    /**
     * Affiche un rapport sur les cotisations des Tontines gérées.
     */
    public function cotisationsReport()
    {
        // Récupérer les Tontines gérées par le gérant
        $tontines = Tontine::where('gerant_id', auth()->user()->id)->pluck('id');

        // Récupérer les cotisations associées à ces Tontines
        $cotisations = Cotisation::whereIn('idTontine', $tontines)->paginate(10);

        return view('gerant.reports.cotisations', compact('cotisations'));
    }
}


