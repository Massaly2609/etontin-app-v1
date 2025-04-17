<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, $role)
    // {

    //     // Vérifie si le rôle de l'utilisateur correspond au rôle requis
    //     if (Auth::user()->profil !== $role) {
    //         // Personnalise le message d'erreur en fonction du rôle
    //         $message = 'Accès interdit. Cette page est réservée aux ' . $role . 's.';

    //         // Retourne une erreur 403 avec le message personnalisé
    //         abort(403, $message);

    //     }

    //     // Si tout est bon, passe à la requête suivante
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, $role)
{
    // Vérifie si le rôle de l'utilisateur correspond au rôle requis
    if (Auth::user()->profil !== $role) {
        // Personnalise le message d'erreur en fonction du rôle
        $message = 'Accès interdit. Cette page est réservée aux ' . $role . 's.';

        // Retourne la vue 403 avec un code d'erreur 403
        return response()->view('error.403', ['message' => $message], 403);
    }

    // Si tout est bon, passe à la requête suivante
    return $next($request);
}
}
