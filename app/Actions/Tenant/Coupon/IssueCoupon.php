<?php

namespace App\Actions\Tenant\Coupon;

use App\Exceptions\Coupon\CouponOutOfStock;
use App\Models\CustomerCoupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Parse\Admin\Concerns\AsAction;

class IssueCoupon
{
    use AsAction;

    public function handle(
        $coupon,
        $customer,
        $payload = [],
    ) {
        if ($coupon->stock <= 0) {
            throw new CouponOutOfStock($coupon);
        }

        DB::beginTransaction();
        $customerCoupon = CustomerCoupon::create([
            'customer_id' => $customer->id,
            'coupon_id'   => $coupon->id,
            'status'      => 'active',
            'expires_at'  => Carbon::now()->add('180 days')->endOfDay(),
            'payload'     => $payload,
        ]);

        $coupon->decrement('stock');
        DB::commit();

        activity('coupon')->performedOn($customer)
            ->withProperties($customerCoupon->attributesToArray())
            ->event('issue-coupon')
            ->log('Coupon ' . $coupon->name . ' issued');

        return $customerCoupon;
    }
}
