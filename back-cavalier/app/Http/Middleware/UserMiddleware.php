<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == 2) {
            return $next($request);
        }

        // L'utilisateur n'est pas connecté ou n'a pas le rôle approprié, rediriger vers la page de connexion
        return redirect('/login')->withErrors('message', 'Vous n\'avez pas les autorisations nécessaires pour accéder à cette page.');
    }
}
