<?php

namespace App\Http\Middleware;

use App\Actions\Central\CentralAdminBootstrap;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CentralAdminPanelInit
{
    public function handle(Request $request, Closure $next): Response
    {
        CentralAdminBootstrap::run();
        return $next($request);
    }
}
