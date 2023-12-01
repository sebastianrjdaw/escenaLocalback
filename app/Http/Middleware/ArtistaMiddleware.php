<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArtistaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // ArtistaMiddleware.php
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->rol === 'artista') {
            return $next($request);
        }

        return abort(403, 'No tienes permisos para acceder a esta ruta.');
    }

}
