<?php

namespace App\Events\Tenant\Transaction;

use App\Events\Contracts\HasCustomer;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransactionCreatedEvent implements HasCustomer
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Transaction $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getCustomer(): Customer
    {
        return $this->transaction?->customer;
    }
}
