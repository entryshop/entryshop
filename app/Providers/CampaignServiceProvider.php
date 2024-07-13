<?php

namespace App\Providers;

use App\Campaigns\EmailBroadcastCampaign;
use App\Campaigns\ReferrerCampaign;
use Illuminate\Support\ServiceProvider;

class CampaignServiceProvider extends ServiceProvider
{

    public function campaigns()
    {
        return [
            ReferrerCampaign::class,
            EmailBroadcastCampaign::class,
        ];
    }

    public function boot()
    {
        foreach ($this->campaigns() as $campaign) {
            $campaign::boot();
        }
    }
}
