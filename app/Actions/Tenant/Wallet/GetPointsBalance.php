<?php

namespace App\Actions\Tenant\Wallet;

use App\Models\Point;
use Lorisleiva\Actions\Concerns\AsAction;

class GetPointsBalance
{
    use AsAction;

    public function handle($customer, $wallet = null)
    {
        $wallet = GetWallet::run($wallet);

        return Point::valid()
            ->where('customer_id', $customer->id)
            ->where('wallet_id', $wallet->id)
            ->sum('balance') ?? 0;
    }
}
