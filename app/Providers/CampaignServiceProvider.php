<?php

namespace App\Providers;

use App\Campaigns\TransactionCampaign;
use App\Campaigns\ReferrerCampaign;
use Illuminate\Support\ServiceProvider;

class CampaignServiceProvider extends ServiceProvider
{

    public function campaigns()
    {
        return [
            ReferrerCampaign::class,
            TransactionCampaign::class,
        ];
    }

    public function boot()
    {
        foreach ($this->campaigns() as $campaign) {
            $campaign::boot();
        }
    }
}
