<?php

namespace App\Actions\Tenant\Wallet;

use App\Models\Wallet;
use Parse\Admin\Concerns\AsAction;

class GetWallet
{
    use AsAction;

    public function handle($wallet = null)
    {
        if (empty($wallet)) {
            return Wallet::default()->first();
        }

        if ($wallet instanceof Wallet) {
            return $wallet;
        }

        return Wallet::where('code', $wallet)->first() ?? (Wallet::find($wallet) ?? Wallet::default()->first());
    }
}
