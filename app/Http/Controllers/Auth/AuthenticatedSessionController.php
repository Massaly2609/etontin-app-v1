<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Tontine;
use Illuminate\View\View;
use App\Models\Cotisation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{

    // Affichage de la page d'accueil
    public function dashboardSuperAdmin()
    {
        // Récupération des données dynamiques
        $stats = [
            'active_tontines' => Tontine::where('dateFin', '>', now())->count(),
            'active_gerants' => User::where('profil', 'GERANT')->count(),
            'total_participants' => Participant::count(),
            'latest_tontines' => Tontine::with('gerant')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
        ];

           // Données pour les graphiques
            $stats['tontines_per_month'] = Tontine::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->month => $item->count];
            })->toArray();

            // Remplir les mois manquants avec 0
            $completeData = [];
            for ($i = 1; $i <= 12; $i++) {
            $completeData[$i] = $stats['tontines_per_month'][$i] ?? 0;
            }



        return view('dashboard.superadmin', compact('stats', 'completeData'));
    }
    // Creation de la session
    public function create(): View
    {
        return view('auth.login');
    }

    // Stockage de la session
    public function store(Request $request)
    {
        try {
            // Validation des informations de connexion
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);


            // Tentative de connexion avec les informations fournies
            if (Auth::attempt($credentials)) {
                // Régénération de la session pour prévenir les attaques par fixation de session
                $request->session()->regenerate();

                // Récupérer l'utilisateur connecté
                $user = Auth::user();

                // Rediriger l'utilisateur en fonction de son rôle
                if ($user->isSuperAdmin()) {
                flash('Bienvenue ' . $user->nom . ' !', 'success');
                    return redirect()->route('superadmin.dashboard');
                } elseif ($user->isGerant()) {
                    flash('Bienvenue ' . $user->nom . ' !', 'success');
                    return redirect()->route('gerant.dashboard');
                } else {
                    flash('Bienvenue ' . $user->nom . ' !', 'success');
                    return redirect()->route('participant.dashboard');
                }
            }

            // Si l'authentification échoue
            flash('Adresse email ou mot de passe incorrect.', 'danger');
            return back();

        } catch (\Exception $e) {
            // Gestion des erreurs inattendues
            flash('Une erreur est survenue lors de la connexion.', 'danger');
            return back();
        }
    }

// Destruction de la session
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        flash('Vous avez été déconnecté.', 'success');
        return redirect('/');
    }
}
