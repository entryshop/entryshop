<?php

namespace App\Http\Controllers\Tenant\AdminApi;

use App\Http\Controllers\ApiController;
use App\Models\Client;

class AuthController extends ApiController
{
    public function getAccessToken()
    {
        $credentials = request()->validate([
            'key'    => 'required',
            'secret' => 'required',
        ]);

        $client = Client::where('key', $credentials['key'])
            ->where('secret', $credentials['secret'])
            ->first();

        if (!$client) {
            return $this->error('Invalid credentials.', 401);
        }

        return $this->success([
            'access_token' => $client->createToken('admin-api')->plainTextToken,
        ]);
    }
}
