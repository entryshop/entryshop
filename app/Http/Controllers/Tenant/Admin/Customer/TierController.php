<?php

namespace App\Http\Controllers\Tenant\Admin\Customer;

use App\Models\Tier;
use Parse\Admin\Http\Controllers\CrudController;

class TierController extends CrudController
{
    public $model = Tier::class;
    public $route = 'tiers';

    public function fields($id = null)
    {
        return [
            [
                'name' => 'name',
            ],
            [
                'name' => 'level',
            ],
            [
                'name'    => 'set',
                'display' => fn($model) => $model->set->name,
            ],
        ];
    }
}

