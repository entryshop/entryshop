<?php

namespace App\Http\Controllers\Tenant\Admin\Campaign;

use App\Actions\Tenant\Support\GetCampaignTypes;
use App\Models\Campaign;
use Parse\Admin\Http\Controllers\CrudController;

class CampaignController extends CrudController
{
    public $model = Campaign::class;
    public $route = 'campaigns';
    public $can_create = true;

    public function fields($id = null)
    {
        return [
            [
                'name'    => 'name',
            ],
            [
                'name'    => 'type',
                'type'    => 'select',
                'options' => collect(GetCampaignTypes::run())->pluck('name', 'value'),
            ],
        ];
    }

    public function show($id)
    {
        return view('tenant.admin.campaign.show', [
            'model' => Campaign::findOrFail($id),
        ]);
    }

}

