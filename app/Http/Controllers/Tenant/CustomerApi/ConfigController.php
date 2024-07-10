<?php

namespace App\Http\Controllers\Tenant\CustomerApi;

use App\Exceptions\Coupon\CouponOutOfStock;
use App\Http\Controllers\ApiController;
use App\Supports\Helper;

class ConfigController extends ApiController
{
    public function __invoke()
    {
        throw new CouponOutOfStock();
        return $this->success([
            'tenant_id' => tenant('id'),
            'setting'   => Helper::setting('foo'),
        ]);
    }
}
