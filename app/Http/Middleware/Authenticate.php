<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if(! $request->expectsJson()){
            return response()->json(['error' => 'Sesión expirada'], 401);
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {

        if ($jwt = $request->cookie('jwt')) {
            $request->headers->set('Authorization', 'Bearer ' . $jwt);
        }
        $this->authenticate($request, $guards);

        return $next($request);
    }
}
