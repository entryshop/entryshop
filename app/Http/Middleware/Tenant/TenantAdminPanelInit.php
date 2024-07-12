<?php

namespace App\Http\Middleware\Tenant;

use App\Actions\Tenant\TenancyAdminBootstrap;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantAdminPanelInit
{
    public function handle(Request $request, Closure $next): Response
    {
        TenancyAdminBootstrap::run();
        return $next($request);
    }
}
