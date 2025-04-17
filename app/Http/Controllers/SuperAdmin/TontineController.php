<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Image;
use App\Models\Tirage;
use App\Models\Tontine;
use App\Models\Cotisation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class TontineController extends Controller
{
    // Affichage de la liste des tontines
     public function index()
    {

        $recentParticipants = Participant::with(['user', 'tontine'])
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        $tontines = Tontine::with('gerant')
        ->paginate(5); // 5 éléments par page

    return view('superadmin.tontines.index', compact('tontines', 'recentParticipants'));
    }

    // Création d'une tontine
    public function create()
    {
        return view('superadmin.tontines.create', [
            'gerants' => User::where('profil', 'GERANT')->get()
        ]);
    }

    // Création d'une tontine
    public function store(Request $request)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'libelle' => 'required|string|max:255',
                'frequence' => 'required|in:JOURNALIERE,HEBDOMADAIRE,MENSUEL',
                'dateDebut' => 'required|date|after_or_equal:today',
                'dateFin' => 'required|date|after:dateDebut',
                'montant_total' => 'required|integer|min:1000',
                'montant_de_base' => 'required|integer|min:500|lte:montant_total',
                'nbreParticipant' => 'required|integer|min:3|max:150',
                'gerant_id' => 'required|exists:users,id',
                'description' => 'nullable|string|max:500'
            ]);

            // Démarrer une transaction
            DB::beginTransaction();

            // Création de la tontine
            $tontine = Tontine::create($validated);

            // // Gestion des images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('tontines', 'public');
                    $tontine->images()->create(['nomImage' => $path]);
                }
            }


            // Valider la transaction
            DB::commit();

            // Message de succès
            flash()->success('Tontine créée avec succès!');
            return redirect()->route('superadmin.tontines.index');

        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();

            // Message d'erreur
            flash()->error('Une erreur est survenue lors de la création de la tontine : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // Affichage des détails de la tontine
    public function show(Tontine $tontine)
    {
        $recentParticipants = Participant::with(['user', 'tontine'])
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        return view('superadmin.tontines.show', [
            'tontine' => $tontine->load(['gerant', 'participants', 'cotisations']),
            'recentParticipants' => $recentParticipants,
        ]);
    }

    // Détails d'une tontine
    public function details(Tontine $tontine)
    {
            $recentParticipants = Participant::with(['user', 'tontine'])
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
            // $recentParticipants = Participant::with(['user', 'tontine'])
            // ->whereHas('tontine') // Seulement si la tontine existe
            // ->orderBy('created_at', 'desc')
            // ->take(5)
            // ->get();

            $tontine->load('gerant');
            return view('superadmin.tontines.show', compact('tontine', 'recentParticipants'));
     }

    // Modification d'une tontine
    public function edit(Tontine $tontine)
    {
        return view('superadmin.tontines.edit', [
            'tontine' => $tontine->load('images'), // Charge les images associées
            'gerants' => User::where('profil', 'GERANT')->get()
        ]);
    }

    // // Mise à jour d'une tontine
    public function update(Request $request, Tontine $tontine)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'libelle' => 'required|string|max:255',
                'frequence' => 'required|in:JOURNALIERE,HEBDOMADAIRE,MENSUEL',
                'dateDebut' => 'required|date',
                'dateFin' => 'required|date|after:dateDebut',
                'montant_total' => 'required|numeric|min:0',
                'montant_de_base' => 'required|numeric|min:0',
                'nbreParticipant' => 'required|integer|min:1',
                'gerant_id' => 'required|exists:users,id',
                'description' => 'nullable|string',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120' // 5MB max
            ]);

            // Démarrer une transaction
            DB::beginTransaction();

            // Mise à jour de la tontine
            $tontine->update($validated);

            // Gestion des nouvelles images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('tontines', 'public');
                    $tontine->images()->create(['nomImage' => $path]);
                }
            }

            // Valider la transaction
            DB::commit();

            flash()->success('Tontine mise à jour avec succès!');
            return redirect()->route('superadmin.tontines.index');

        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error('Une erreur est survenue lors de la mise à jour : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // Suppression d'une tontine
    public function destroy(Tontine $tontine)
    {
        try {
            DB::beginTransaction();

            // Supprimer d'abord les entrées liées
            Cotisation::where('idTontine', $tontine->id)->delete();
            Image::where('idTontine', $tontine->id)->delete();
            Participant::where('idTontine', $tontine->id)->update(['idTontine' => null]);
            Tirage::where('idTontine', $tontine->id)->delete();

            // Puis supprimer la tontine
            $tontine->delete();

            DB::commit();

            flash()->success('Tontine supprimée avec succès!');
            return redirect()->route('superadmin.tontines.index');

        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error('Une erreur est survenue lors de la suppression de la tontine : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    // Suppression d'une image
    public function deleteImage(Image $image)
    {
        try {
            // Supprimer le fichier physique
            $filePath = 'public/' . $image->nomImage;
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }

            // Supprimer l’entrée de la base de données
            $image->delete();

            return response()->json([
                'success' => true,
                'message' => 'Image supprimée avec succès'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }

}
