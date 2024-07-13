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
                'display' => fn($model) => '<a href="'.route('tenant.admin.campaigns.'.$model->campaign->code.'.show', $model->id).'">'.$model->name.'</a>',
            ],
            [
                'name'    => 'type',
                'type'    => 'select',
                'options' => collect(GetCampaignTypes::run())->pluck('name', 'value'),
            ],
        ];
    }

}

