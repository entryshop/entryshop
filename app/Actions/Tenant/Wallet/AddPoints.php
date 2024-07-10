<?php

namespace App\Actions\Tenant\Wallet;

use App\Models\Point;
use Parse\Admin\Concerns\AsAction;

class AddPoints
{
    use AsAction;

    public function handle($customer, $amount, $wallet = null,)
    {
        $wallet = GetWallet::run($wallet);

        Point::create([
            'customer_id'  => $customer->id,
            'wallet_id'    => $wallet->id,
            'value'        => $amount,
            'balance'      => $amount,
            'unlock_until' => now(),
            'expired_at'   => now()->addYear(),
        ]);

        activity('wallets')
            ->event('add-points')
            ->withProperties([
                'amount'      => $amount,
                'customer_id' => $customer->id,
                'wallet_id'   => $wallet->id,
            ])
            ->performedOn($customer)
            ->log('Add points ' . $amount . ' to wallet ' . $wallet->name);
    }
}
