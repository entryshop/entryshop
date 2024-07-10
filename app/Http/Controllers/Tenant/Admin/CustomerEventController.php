<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Models\CustomerEvent;
use Parse\Admin\Http\Controllers\CrudController;

class CustomerEventController extends CrudController
{
    public $model = CustomerEvent::class;
    public $route = 'customer-events';

    public function fields($id = null)
    {
        return [
            [
                'name' => 'event-date',
            ],
            [
                'name'    => 'event',
                'display' => fn($model) => $model->event->name,
            ],
            [
                'name'    => 'customer',
                'display' => fn($model) => $model->customer->name,
            ],
            [
                'name'    => 'actions',
                'display' => fn($row) => $this->getEditRowButton($row),
                'create'  => false,
                'edit'    => false,
            ],
        ];
    }
}

