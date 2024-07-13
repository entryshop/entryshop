<?php

namespace App\Actions\Tenant\Customer;

use App\Events\Tenant\CustomerRegisteredEvent;
use App\Models\Customer;
use Parse\Admin\Concerns\AsAction;

class RegisterCustomer
{
    use AsAction;

    /**
     * Register a new customer, please ensure the data is validated before calling this action.
     *
     * @param $data
     * @return Customer
     */
    public function handle($data)
    {
        $customer = Customer::create($data);
        CustomerRegisteredEvent::dispatch($customer);
        return $customer;
    }
}
