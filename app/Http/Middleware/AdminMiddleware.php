<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->rol === 'admin') {
            return $next($request);
        }

        abort(403, 'No tienes permisos de administrador.');

    }
}
