<?php

namespace App\Http\Controllers\Tenant\CustomerApi;

use App\Http\Controllers\ApiController;

class ConfigController extends ApiController
{
    public function __invoke()
    {
        return $this->success([
            'tenant_id' => tenant('id'),
        ]);
    }
}
