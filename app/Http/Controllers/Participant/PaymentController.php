<?php

namespace App\Http\Controllers\Participant;

use App\Models\Tontine;
use App\Models\Cotisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $request->validate([
            'tontine_id' => 'required|exists:tontines,id',
            'moyen_paiement' => 'required|in:WAVE,OM',
            'numero_transaction' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $tontine = Tontine::findOrFail($request->tontine_id);

        try {
            DB::beginTransaction();

            // Vérifier si l'utilisateur est déjà inscrit
            if ($user->tontines()->where('tontines.id', $tontine->id)->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vous êtes déjà inscrit à cette tontine.'
                ], 400);
            }

            // Enregistrer l'inscription
            $user->tontines()->attach($tontine->id);

            // Enregistrer la cotisation
            Cotisation::create([
                'idUser' => $user->id,
                'idTontine' => $tontine->id,
                'montant' => $tontine->montant_de_base,
                'moyen_paiement' => $request->moyen_paiement,
                'numero_transaction' => $request->numero_transaction,
            ]);

            // Mettre à jour le nombre de participants
            $tontine->increment('nbreParticipant');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Paiement et inscription réussis',
                'redirect' => route('participant.tontines.show', $tontine->id)
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue: ' . $e->getMessage()
            ], 500);
        }
    }
}
