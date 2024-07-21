<?php

namespace App\Campaigns;

use App\Events\Tenant\Transaction\TransactionCreatedEvent;
use Workflow\WorkflowStub;

class TransactionCampaign extends Campaign
{
    public $name = 'Transaction campaign';
    public $code = 'transaction';

    public static function events()
    {
        return [
            TransactionCreatedEvent::class,
        ];
    }

    public static function triggeredByEvent($event)
    {
        $customer = $event->getCustomer();

        $campaigns = \App\Models\Campaign::where('type', static::class)->get();
        foreach ($campaigns as $campaign) {
            $workflow = WorkflowStub::make(CustomerTransactionCampaign::class);
            $workflow->start([
                'campaign_id' => $campaign->id,
                'customer_id' => $customer->id,
            ]);
        }
    }
}
