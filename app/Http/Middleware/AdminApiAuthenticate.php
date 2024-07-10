<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminApiAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->is_admin != true) {
            abort(401, 'Can not access this route.');
        }
        return $next($request);
    }
}
