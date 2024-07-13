<?php

namespace App\Actions\Tenant\Campaign;

use App\Campaigns\ReferrerCampaign;
use App\Events\Tenant\CustomerRegisteredEvent;
use App\Models\Campaign;
use App\Models\Customer;
use App\Workflows\Campaign\CustomerReferrerCampaign;
use Illuminate\Support\Facades\Log;
use Parse\Admin\Concerns\AsAction;
use Workflow\WorkflowStub;

class StartReferrerCampaign
{
    use AsAction;

    public function handle($customer)
    {
        Log::debug('Starting referrer campaign for customer', ['customer' => $customer]);
        $referrer = Customer::where('referrer_token', $customer->register_referrer_token)->first();

        if (!$referrer) {
            Log::debug('No referrer found for customer', ['customer' => $customer]);
            return;
        }

        Log::debug('Found referrer for customer', ['customer' => $customer, 'referrer' => $referrer]);

        // find all referrer campaigns
        $campaigns = Campaign::where('type', ReferrerCampaign::class)->get();
        foreach ($campaigns as $campaign) {
            // start campaign workflow
            $workflow = WorkflowStub::make(CustomerReferrerCampaign::class);
            $workflow->start($campaign, $customer, $referrer);
        }
    }

    public function asListener(CustomerRegisteredEvent $event)
    {
        $this->handle($event->customer);
    }
}
