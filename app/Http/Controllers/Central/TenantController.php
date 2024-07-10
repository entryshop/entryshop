<?php

namespace App\Http\Controllers\Central;

use App\Actions\Central\CreateTenantAction;
use App\Models\Central\Tenant;
use Parse\Admin\Http\Controllers\CrudController;

class TenantController extends CrudController
{
    public $model = Tenant::class;

    public function filters()
    {
        return [
            [
                'name'        => 'keyword',
                'type'        => 'input',
                'filter'      => [
                    'operator' => 'search',
                ],
                'placeholder' => 'Search...',
            ],
        ];
    }

    public function columns($id = null)
    {
        return [
            [
                'name' => 'name',
            ],
            [
                'name'    => 'domains',
                'display' => function ($model) {
                    $domains = $model->domains;
                    $result  = '';
                    foreach ($domains as $domain) {
                        $result .= '<a href="http://' . $domain->domain . '" target="_blank">' . $domain->domain . '</a><br>';
                    }
                    return $result;
                },
            ],
        ];
    }

    public function form($id = null)
    {
        return [
            [
                'name'  => 'name',
                'rules' => 'required|string|max:255',
            ],
            [
                'name'  => 'domain',
                'rules' => 'required|string|max:255',
            ],
        ];
    }

    public function store()
    {
        $this->validate();

        CreateTenantAction::run([
            'name' => request('name'),
        ], request('domain'));

        return redirect(route('central.admin.tenants.index'));
    }
}
