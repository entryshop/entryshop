<?php

namespace App\Http\Controllers\Tenant\Admin;

use Parse\Admin\Http\Controllers\CrudController;
use Parse\Admin\Models\AdminUser;

class AdminUserController extends CrudController
{
    public $model = AdminUser::class;
    public $route = 'admin-users';

    public function fields($id = null)
    {
        return [
            [
                'name' => 'name',
            ],
            [
                'name' => 'email',
            ],
            [
                'name' => 'avatar',
                'type' => 'image',
            ],
            [
                'name'        => 'password',
                'native_type' => 'password',
                'list'        => false,
                'value'       => '',
            ],
            [
                'name'    => 'actions',
                'create'  => false,
                'edit'    => false,
                'display' => function ($model) {
                    return $this->getEditRowButton($model);
                },
            ],
        ];
    }
}

