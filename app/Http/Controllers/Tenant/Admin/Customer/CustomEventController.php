<?php

namespace App\Http\Controllers\Tenant\Admin\Customer;

use App\Models\CustomEvent;
use Parse\Admin\Http\Controllers\CrudController;

class CustomEventController extends CrudController
{
    public $model = CustomEvent::class;
    public $route = 'custom-events';

    public function fields($id = null)
    {
        return [
            [
                'name'       => 'name',
                'filterable' => true,
                'filter'     => [
                    'operator' => 'like',
                ],
            ],
            [
                'name' => 'code',
            ],
            [
                'name' => 'active',
                'type' => 'switch',
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

