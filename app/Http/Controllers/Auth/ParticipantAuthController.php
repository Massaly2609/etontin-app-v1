<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Participant;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;




class ParticipantAuthController extends Controller
{

    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.participant.login');
    }

    // Traiter la connexion
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);



        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

        flash()->success('Bienvenue ' . Auth::user()->prenom . ' ' . Auth::user()->nom);
            return redirect()->intended(route('participant.dashboard'));
        }

        flash()->error('Email ou mot de passe incorrect');
        return back();
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        flash()->success('Vous êtes maintenant déconnecté');
        return redirect('/');
    }

    // Afficher le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('auth.participant.register');
    }

    // Traiter l'inscription
    public function register(Request $request)
    {
        try {
            // Validation des données de la requête
            $request->validate([
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'telephone' => 'required|string|unique:users',
                'password' => 'required|confirmed|min:8', // Règle 'confirmed' cruciale
                'dateNaissance' => 'required|date',
                'cni' => 'required|string|unique:participants',
                'adresse' => 'required|string|max:255',
                'imageCni' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Création de l'utilisateur
            $user = User::create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->password),
                'profil' => 'PARTICIPANT'
            ]);

            // Gestion de l'upload de la CNI
            $cniPath = $request->file('imageCni')->store('cni', 'private');

            // Création du participant
            Participant::create([
                'idUser' => $user->id,
                'dateNaissance' => $request->dateNaissance,
                'cni' => $request->cni,
                'adresse' => $request->adresse,
                'imageCni' => $cniPath
            ]);

            // Déclenchement de l'événement d'enregistrement
            event(new Registered($user));

            // Message de succès avec redirection
            return redirect()->route('participant.login')->with('success', 'Votre compte a été créé avec succès.');

        } catch (\Exception $e) {
            // Gestion des erreurs
            flash()->error('Une erreur est survenue lors de la création de votre compte.');
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la création de votre compte.']);
        }
    }

}

