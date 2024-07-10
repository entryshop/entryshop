<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Models\Wallet;
use Parse\Admin\Http\Controllers\CrudController;

class WalletController extends CrudController
{
    public $model = Wallet::class;

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
                'name'    => 'actions',
                'display' => fn($row) => $this->getEditRowButton($row),
                'create'  => false,
                'edit'    => false,
            ],
        ];
    }
}

