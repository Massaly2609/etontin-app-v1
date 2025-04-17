<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    // Stockage de la session
     public function store(Request $request)
     {
         try {
             // Validation des données du formulaire
             $request->validate([
                 'prenom' => 'required|string|max:255',
                 'nom' => 'required|string|max:255',
                 'telephone' => 'required|string|max:15|unique:users',
                 'email' => 'required|string|email|max:255|unique:users',
                 'password' => 'required|string|min:8|confirmed',
             ]);

             // Création de l'utilisateur
             $user = User::create([
                 'prenom' => $request->prenom,
                 'nom' => $request->nom,
                 'telephone' => $request->telephone,
                 'email' => $request->email,
                 'password' => Hash::make($request->password),
             ]);

             // Rediriger avec un message de succès
             return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');

         } catch (\Exception $e) {
             // Capture d'erreurs inattendues et retour d'un message d'erreur générique
             flash('Une erreur est survenue lors de la création de votre compte.', 'danger');
             return back();
         }
     }

}
