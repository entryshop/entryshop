<?php

namespace App\Http\Controllers\Tenant\Admin\Customer;

use App\Models\Tier;
use App\Models\TierSet;
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
                'type'    => 'select',
                'options' => TierSet::pluck('name', 'id'),
                'display' => fn($model) => $model->set->name,
            ],
        ];
    }
}

