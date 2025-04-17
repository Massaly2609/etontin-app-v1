<?php
namespace App\Http\Controllers\Gerants;

use App\Models\Tontine;
use App\Models\Cotisation;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GerantCotisationController extends Controller
{
     /**
     * Affiche la liste des cotisations des Tontines gérées par le gérant.
     */
    public function index()
    {
        // Récupérer les Tontines du gérant
        $tontines = Tontine::where('gerant_id', auth()->user()->id)->pluck('id');

        // Récupérer les cotisations de ces Tontines
        $cotisations = Cotisation::whereIn('idTontine', $tontines)->paginate(10);

        return view('gerant.cotisations.index', compact('cotisations'));
    }

    /**
     * Enregistre une nouvelle cotisation.
     */
    public function store(Request $request, Tontine $tontine)
    {
        // Vérifier que la Tontine est gérée par le gérant
        if ($tontine->gerant_id !== auth()->user()->id) {
            abort(403, 'Accès non autorisé.');
        }

        // Validation des données
        $request->validate([
            'idUser' => 'required|exists:users,id',
            'montant' => 'required|numeric|min:500',
            'moyen_paiement' => 'required|in:ESPECES,WAVE,OM',
        ]);

        // Enregistrement de la cotisation
        Cotisation::create([
            'idUser' => $request->idUser,
            'idTontine' => $tontine->id,
            'montant' => $request->montant,
            'moyen_paiement' => $request->moyen_paiement,
        ]);

        return redirect()->back()->with('success', 'Cotisation enregistrée avec succès.');
    }

    /**
     * Affiche les détails d'une cotisation.
     */
    public function show(Cotisation $cotisation)
    {
        // Vérifier que la cotisation appartient à une Tontine gérée par le gérant
        $tontine = Tontine::find($cotisation->idTontine);
        if ($tontine->gerant_id !== auth()->user()->id) {
            abort(403, 'Accès non autorisé.');
        }

        return view('gerant.cotisations.show', compact('cotisation'));
    }
}



