<?php

namespace App\Http\Controllers\Tenant\Admin\Customer;

use App\Models\Customer;
use Parse\Admin\Http\Controllers\CrudController;

class CustomerController extends CrudController
{
    public $model = Customer::class;
    public $route = 'customers';

    public function fields($id = null)
    {
        return [
            [
                'name' => 'name',
            ],
            [
                'name' => 'email',
            ],
        ];
    }
}

