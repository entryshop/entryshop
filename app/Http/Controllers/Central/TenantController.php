<?php

namespace App\Http\Controllers\Central;

use App\Actions\Central\CreateTenantAction;
use App\Models\Central\Tenant;
use App\Support\Helper;
use Illuminate\Http\Request;
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

    public function getShowView($id = null)
    {
        return 'central.tenants.show';
    }

    public function getShowData($id)
    {
        $model    = Tenant::findOrFail($id);
        $settings = $model->run(function () {
            return [
                'module_coupons'   => Helper::setting('module_coupons', 0),
                'module_campaigns' => Helper::setting('module_campaigns', 0),
                'module_content'   => Helper::setting('module_content', 0),
            ];
        });

        return compact('model', 'settings');
    }

    public function settings($id, Request $request)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->run(function () use ($request) {
            Helper::setting([
                'module_coupons'   => $request->get('module_coupons') ? 1 : 0,
                'module_campaigns' => $request->get('module_campaigns') ? 1 : 0,
                'module_content'   => $request->get('module_content') ? 1 : 0,
            ]);
        });
        return redirect()->back();
    }
}
