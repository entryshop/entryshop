<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerApiAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        $client_key = $request->get('client_key') ?? $request->header('Client-Key');

        if (empty($client_key)) {
            abort(401, 'Client key is required.');
        }

        $client = Client::where('key', $client_key)->first();

        if (empty($client)) {
            abort(401, 'Invalid client key.');
        }

        $request->merge(['client' => $client]);

        return $next($request);
    }
}
