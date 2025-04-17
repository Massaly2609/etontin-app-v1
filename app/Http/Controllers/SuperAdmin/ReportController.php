<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Tirage;
use App\Models\Tontine;
use App\Models\Cotisation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    //
    // Page principale des rapports
    public function index()
    {
        $totalTontines = Tontine::count();
        $totalCotisations = Cotisation::sum('montant');
        $participantsActifs = User::whereHas('cotisations', function ($query) {
            $query->where('created_at', '>=', now()->subDays(30));
        })->count();

        // Statistiques des cotisations
        $totalCotisations = Cotisation::sum('montant');

        // Statistiques des tirages
        $totalTirages = Tirage::count(); // Assurez-vous que le modèle Tirage existe
        $benefices = $totalCotisations - $totalTirages; // Calcul des bénéfices

        return view('report.index', compact(
            'totalTontines',
            'participantsActifs',
            'totalCotisations',
            'totalTirages',
            'benefices'
        ));
        // return view('report.index', compact('totalTontines', 'totalCotisations', 'participantsActifs'));
    }

    // Rapport des tontines
    public function tontinesReport()
    {
        $tontines = Tontine::withCount('participants')->get();
        return view('reports.tontines', compact('tontines'));
    }

    // Rapport des participants
    public function participantsReport()
    {
        $participants = User::withCount('cotisations')->get();
        return view('reports.participants', compact('participants'));
    }

    // Rapport des cotisations
    public function cotisationsReport()
    {
        $cotisations = Cotisation::with(['user', 'tontine'])->get();
        return view('reports.cotisations', compact('cotisations'));
    }

    // Rapport des tirages
    public function tiragesReport()
    {
        $tirages = Tirage::with(['user', 'tontine'])->get();
        return view('reports.tirages', compact('tirages'));
    }

    // Rapport financier
    public function financialReport()
    {
        $totalCotisations = Cotisation::sum('montant');
        $totalTirages = Tirage::sum('montant');
        $benefices = $totalCotisations - $totalTirages;

        return view('reports.financial', compact('totalCotisations', 'totalTirages', 'benefices'));
    }
}
