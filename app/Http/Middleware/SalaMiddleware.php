<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // SalaMiddleware.php
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->rol === 'sala') {
            return $next($request);
        }

        return abort(403, 'No tienes permisos para acceder a esta ruta.');
    }

}
