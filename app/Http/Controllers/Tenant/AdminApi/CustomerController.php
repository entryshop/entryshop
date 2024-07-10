<?php


namespace App\Http\Controllers\Tenant\AdminApi;

use App\Http\Controllers\ApiController;

class CustomerController extends ApiController
{
    public function index()
    {
        return $this->success([
            'client'  => request()->user(),
            'message' => 'This is the customer index page.',
        ]);
    }
}
