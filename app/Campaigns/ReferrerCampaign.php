<?php

namespace App\Campaigns;

use App\Actions\Tenant\Campaign\StartReferrerCampaign;
use App\Events\Tenant\CustomerRegisteredEvent;

class ReferrerCampaign extends Campaign
{
    public $name = 'Referrer Campaign';
    public $code = 'referrer';

    public static function events()
    {
        return [
            CustomerRegisteredEvent::class => [
                StartReferrerCampaign::class
            ]
        ];
    }
}
