<?php


namespace Tests\Feature\Customer;

use App\Actions\Tenant\Coupon\IssueCoupon;
use App\Exceptions\Coupon\CouponOutOfStock;
use App\Models\Coupon;
use App\Models\Customer;
use PHPUnit\Framework\Attributes\Test;
use Tests\TenantTestCase;

final class CouponTest extends TenantTestCase
{
    #[Test]
    public function can_issue_coupon()
    {
        $customer = Customer::factory()->create();
        $coupon   = Coupon::factory()->create();

        $customerCoupon = IssueCoupon::run(coupon: $coupon, customer: $customer);

        $this->assertDatabaseHas('customer_coupons', [
            'customer_id' => $customer->id,
            'coupon_id'   => $coupon->id,
            'code'        => $customerCoupon->code,
        ]);
    }

    #[Test]
    public function can_not_issue_out_stock_coupon()
    {
        $customer = Customer::factory()->create();
        $coupon   = Coupon::factory()->outstock()->create();

        $this->expectException(CouponOutOfStock::class);
        IssueCoupon::run(coupon: $coupon, customer: $customer);
    }
}
