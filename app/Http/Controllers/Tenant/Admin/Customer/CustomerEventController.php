<?php

namespace App\Http\Controllers\Tenant\Admin\Customer;

use App\Models\CustomerEvent;
use Parse\Admin\Http\Controllers\CrudController;

class CustomerEventController extends CrudController
{
    public $model = CustomerEvent::class;
    public $route = 'customer-events';

    public function getShowView($id = null)
    {
        return 'tenant.admin.customer.events.show';
    }

    public function fields($id = null)
    {
        return [
            [
                'name' => 'event_date',
            ],
            [
                'name' => 'event',
                'view' => 'tenant.admin.displayers.customer_event',
            ],
            [
                'name'    => 'customer',
                'display' => fn($model) => $model->customer->name,
            ],
            [
                'name'    => 'actions',
                'display' => fn($row) => $this->getViewRowButton($row) . ' ' . $this->getEditRowButton($row),
                'create'  => false,
                'edit'    => false,
            ],
        ];
    }
}

