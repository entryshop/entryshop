<?php

namespace App\Http\Controllers\Tenant\Admin\Customer;

use App\Models\TierSet;
use Parse\Admin\Http\Controllers\CrudController;

class TierSetController extends CrudController
{
    public $model = TierSet::class;
    public $route = 'tier-sets';

    public function fields($id = null)
    {
        return [
            [
                'name' => 'name',
            ],
        ];
    }
}

