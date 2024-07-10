<?php

namespace App\Actions\Tenant\Wallet;

use App\Exceptions\Wallet\InsufficientBalanceException;
use App\Models\Point;
use Illuminate\Support\Facades\DB;
use Parse\Admin\Concerns\AsAction;

class UsePoints
{
    use AsAction;

    public function handle($customer, $amount, $wallet = null)
    {
        $wallet = GetWallet::run($wallet);

        $balance = GetPointsBalance::run(
            customer: $customer,
            wallet: $wallet,
        );

        if ($balance < $amount) {
            throw new InsufficientBalanceException();
        }

        $total_amount = $amount;
        $breakdowns   = Point::valid()
            ->where('wallet_id', $wallet->id)
            ->where('customer_id', $customer->id)
            ->orderBy('expired_at')
            ->get();

        DB::beginTransaction();
        foreach ($breakdowns as $breakdown) {
            if ($breakdown->balance >= $amount) {
                $breakdown->balance -= $amount;
                $amount             = 0;
                $breakdown->save();
                break;
            } else {
                $amount             -= $breakdown->balance;
                $breakdown->balance = 0;
                $breakdown->save();
            }
        }
        if ($amount > 0) {
            throw new InsufficientBalanceException();
        }
        DB::commit();

        activity('wallets')
            ->event('use-points')
            ->withProperties([
                'amount'      => $total_amount,
                'customer_id' => $customer->id,
                'wallet_id'   => $wallet->id,
            ])
            ->performedOn($customer)
            ->log('Used points ' . $total_amount . ' from wallet ' . $wallet->name);
    }
}
