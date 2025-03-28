<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth::check()) {
            abort(403, 'No tienes permisos para acceder a esta página.');
        }

        if (!in_array(strtolower(auth::user()->rol), array_map('strtolower', $roles))) {
            abort(403, 'No tienes permisos para acceder a esta página.');
        }
        

        return $next($request);
    }
}
