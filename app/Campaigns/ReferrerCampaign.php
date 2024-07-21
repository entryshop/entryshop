<?php

namespace App\Campaigns;

use App\Events\Contracts\HasCustomer;
use App\Events\Tenant\CustomerRegisteredEvent;
use App\Workflows\Campaign\CustomerReferrerCampaign;
use Workflow\WorkflowStub;

class ReferrerCampaign extends Campaign
{
    public $name = 'Referrer Campaign';
    public $code = 'referrer';

    public static function events()
    {
        return [
            CustomerRegisteredEvent::class,
        ];
    }

    public static function triggeredByEvent(HasCustomer $event)
    {
        $customer = $event->getCustomer();

        $campaigns = \App\Models\Campaign::where('type', static::class)->get();
        foreach ($campaigns as $campaign) {
            $workflow = WorkflowStub::make(CustomerReferrerCampaign::class);
            $workflow->start([
                'campaign_id' => $campaign->id,
                'customer_id' => $customer->id,
            ]);
        }
    }
}
