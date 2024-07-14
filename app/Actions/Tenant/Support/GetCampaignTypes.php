<?php

namespace App\Actions\Tenant\Support;

use App\Campaigns\TransactionCampaign;
use App\Campaigns\ReferrerCampaign;
use Parse\Admin\Concerns\AsAction;

class GetCampaignTypes
{
    use AsAction;

    public function handle()
    {
        return [
            [
                'name'  => 'Referrer Campaign',
                'value' => ReferrerCampaign::class,
            ],
            [
                'name'  => 'Email broadcast',
                'value' => TransactionCampaign::class
            ],
        ];
    }
}
