<?php

namespace App\Http\Controllers\SuperAdmin;

use Log;

use App\Models\User;
use App\Models\Tirage;
use App\Models\Tontine;
use App\Models\Cotisation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class TirageController extends Controller
{

    public function index(Tontine $tontine)
    {
        $participantsEligibles = Participant::where('idTontine', $tontine->id)
            ->whereHas('user.cotisations', function($query) use ($tontine) {
                $query->where('idTontine', $tontine->id)
                    ->selectRaw('idUser, SUM(montant) as total')
                    ->groupBy('idUser')
                    ->havingRaw('SUM(montant) >= ?', [$tontine->montant_de_base]);
            })
            ->whereDoesntHave('user.tirages', function($query) use ($tontine) {
                $query->where('idTontine', $tontine->id);
            })
            ->with(['user', 'user.cotisations'])
            ->get();

        $canDraw = $participantsEligibles->isNotEmpty();

        return view('superadmin.tirages.index', [
            'tontine' => $tontine,
            'participantsEligibles' => $participantsEligibles->pluck('user'),
            'canDraw' => $canDraw
        ]);
    }


    public function store(Request $request, Tontine $tontine)
    {
        // Vérification des participants éligibles
        $participantsEligibles = Participant::where('idTontine', $tontine->id)
            ->whereHas('user.cotisations', function($query) use ($tontine) {
                $query->where('idTontine', $tontine->id)
                    ->selectRaw('idUser, SUM(montant) as total')
                    ->groupBy('idUser')
                    ->havingRaw('SUM(montant) >= ?', [$tontine->montant_de_base]);
            })
            ->whereDoesntHave('user.tirages', function($query) use ($tontine) {
                $query->where('idTontine', $tontine->id);
            })
            ->with(['user', 'user.cotisations'])
            ->get()
            ->pluck('user'); // On récupère seulement les users

        if ($participantsEligibles->isEmpty()) {
            return back()->with('error', 'Aucun participant éligible. Conditions requises : '.
                '- Être membre de la tontine '.
                '- Avoir cotisé au moins '.number_format($tontine->montant_de_base, 0, ',', ' ').' FCFA '.
                '- Ne pas avoir déjà gagné');
        }

        try {
            DB::beginTransaction();

            $gagnant = $participantsEligibles->random();

            Tirage::create([
                'idUser' => $gagnant->id,
                'idTontine' => $tontine->id
            ]);

            // Mettre à jour le statut du gagnant si nécessaire
            $participant = Participant::where('idUser', $gagnant->id)
                            ->where('idTontine', $tontine->id)
                            ->first();

            if ($participant) {
                $participant->update(['statut' => 'gagnant']); // Ajoutez ce champ si nécessaire
            }
            DB::commit();

            return redirect()->route('superadmin.tontines.tirages.index', $tontine)
                ->with('success', "Tirage effectué ! Gagnant : {$gagnant->prenom} {$gagnant->nom}");

        } catch (\Exception $e) {
            Log::error('Erreur lors du tirage: ' . $e->getMessage());
            DB::rollBack();
            return back()->with('error', 'Erreur lors du tirage: '.$e->getMessage());
        }
    }

}
