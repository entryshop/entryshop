<?php

namespace App\Actions\Tenant\Coupon;

use Exception;
use Parse\Admin\Concerns\AsAction;

class UseCoupon
{
    use AsAction;

    public function handle(
        $customerCoupon,
        array $payload = []
    ) {

        if ($customerCoupon->status != 'active') {
            throw new Exception('Coupon is not active');
        }

        $customerCoupon->update([
            'status'  => 'used',
            'used_at' => now(),
            'payload' => array_merge($customerCoupon->payload ?? [], $payload),
        ]);

        activity('coupon')
            ->event('use-coupon')
            ->withProperties($customerCoupon->payload)
            ->performedOn($customerCoupon->customer)
            ->log('Coupon ' . $customerCoupon->coupon->name . ' [' . $customerCoupon->id . ']used');

        return $customerCoupon;
    }
}
