<?php

namespace App\Events\Contracts;

use App\Models\Customer;

interface HasCustomer
{
    public function getCustomer():Customer;
}
