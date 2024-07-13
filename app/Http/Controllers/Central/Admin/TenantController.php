<?php

namespace App\Http\Controllers\Central\Admin;

use App\Actions\Central\CreateTenantAction;
use App\Actions\Tenant\Wallet\GetWallet;
use App\Models\Central\Tenant;
use App\Models\Customer;
use App\Support\Helper;
use Illuminate\Http\Request;
use Parse\Admin\Http\Controllers\CrudController;

class TenantController extends CrudController
{
    public $model = Tenant::class;
    public $can_create = true;

    public function getModules()
    {
        return [
            'module_coupons'   => 'Coupons',
            'module_campaigns' => 'Campaigns',
            'module_content'   => 'Content',
        ];
    }

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

    public function getRowActions()
    {
        return fn($model) => $this->getViewRowButton($model);
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
        admin()->success('Tenant created successfully.');
        return redirect()->back();
    }

    public function getShowView($id = null)
    {
        return 'central.admin.tenants.show';
    }

    public function getShowData($id)
    {
        $model   = Tenant::findOrFail($id);
        $summary = $model->run(function () {
            return [
                'customers' => Customer::count(),
                'wallet'    => GetWallet::run(),
            ];
        });

        $modules = $model->run(function () {
            $result = [];
            foreach ($this->getModules() as $name => $label) {
                $result[] = [
                    'name'  => $name,
                    'label' => $label,
                    'value' => Helper::setting($name, 0),
                ];
            }
            return $result;
        });

        return compact('model', 'modules', 'summary');
    }

    public function settings($id, Request $request)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->run(function () use ($request) {
            $settings = [];
            foreach ($this->getModules() as $name => $label) {
                $settings[$name] = $request->get($name) ? 1 : 0;
            }
            Helper::setting($settings);
        });

        admin()->success('Settings updated successfully.');

        return redirect()->back();
    }
}
