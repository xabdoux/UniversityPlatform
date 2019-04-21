<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect('/home');
            switch (Auth::user()->role) {
        case "enseignant":
            return redirect('enseignant');
            break;
        case "etudiant":
            return redirect('etudiant');
            break;
        case "coordinateur":
            return redirect('coordinateur');
            break;
        case "administration":
            return redirect('administration');
            break;
        default:
            abort(403, 'Accès refusé pour ce type des roles.');
        }
        }

        return $next($request);
    }
}
