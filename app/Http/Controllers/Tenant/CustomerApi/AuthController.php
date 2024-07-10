<?php

namespace App\Http\Controllers\Tenant\CustomerApi;

use App\Http\Controllers\ApiController;

class AuthController extends ApiController
{
    public function login()
    {
        $credentials = request()->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        if (!$this->auth()->attempt($credentials)) {
            return $this->error('Invalid credentials.', 401);
        }

        $token = $this->auth()->user()->createToken('customer')->plainTextToken;

        return $this->success([
            'token' => $token,
        ]);
    }

    public function getProfile()
    {
        return $this->success(auth()->user());
    }

    public function auth()
    {
        return auth('customer');
    }
}
