<?php

namespace App\Exceptions\Coupon;

use Exception;

class CouponOutOfStock extends Exception
{
    public $coupon;

    public function __construct($coupon)
    {
        $this->coupon = $coupon;
        parent::__construct("Coupon {$coupon->name} out of stock");
    }
}
