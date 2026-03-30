<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * //Tikrina, ar vartotojas turi nurodytą vaidmenį
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role   ← pavyzdžiui: "admin", "employee", "client"
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Jei vartotojas neprisijungęs
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Norėdami pasiekti šį puslapį, turite prisijungti.');
        }

        // Jei vartotojas neturi reikiamo vaidmens
        if (!auth()->check() || !auth()->user()->hasRole($role)) {
            abort(403, 'Neturite teisės mmatyti šio puslapio.');
        }
        return $next($request);
    }
}
