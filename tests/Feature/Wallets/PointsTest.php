<?php

namespace Tests\Feature\Wallets;

use App\Actions\Tenant\Wallet\AddPoints;
use App\Actions\Tenant\Wallet\GetPointsBalance;
use App\Actions\Tenant\Wallet\UsePoints;
use App\Exceptions\Wallets\InsufficientBalanceException;
use App\Models\Customer;
use App\Models\Wallet;
use PHPUnit\Framework\Attributes\Test;
use Tests\TenantTestCase;

final class PointsTest extends TenantTestCase
{

    protected function initData()
    {
        Wallet::factory()->create([
            'is_default' => true,
        ]);

        return Customer::factory()->create();
    }

    #[Test]
    public function can_add_points()
    {
        $customer = $this->initData();

        AddPoints::run($customer, 100);
        $this->assertEquals(100, GetPointsBalance::run($customer));

        AddPoints::run($customer, 200);
        $this->assertEquals(300, GetPointsBalance::run($customer));
    }

    #[Test]
    public function can_not_use_points()
    {
        $customer = $this->initData();
        AddPoints::run($customer, 100);
        $this->assertThrows(
            fn() => UsePoints::run($customer, 150),
            InsufficientBalanceException::class
        );
    }
}
