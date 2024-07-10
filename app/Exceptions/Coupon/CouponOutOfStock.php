<?php

namespace App\Exceptions\Coupon;

use App\Exceptions\BusinessException;

class CouponOutOfStock extends BusinessException
{
    public $coupon;

    public function __construct($coupon = null)
    {
        $this->coupon = $coupon;
        parent::__construct("Coupon {$coupon?->name} out of stock");
    }

    public function withData()
    {
        if (app()->hasDebugModeEnabled()) {
            return [
                'coupon' => $this->coupon,
            ];
        }
        return null;
    }
}
