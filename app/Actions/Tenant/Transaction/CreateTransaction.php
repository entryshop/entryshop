<?php

namespace App\Actions\Tenant\Transaction;

use App\Models\Transaction;
use Parse\Admin\Concerns\AsAction;

class CreateTransaction
{
    use AsAction;

    public function handle($data)
    {
        Transaction::create($data);
    }
}
