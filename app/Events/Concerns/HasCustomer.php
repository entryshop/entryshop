<?php

namespace App\Events\Concerns;

use App\Models\Customer;

trait HasCustomer
{
    public $customer;

    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
