<?php

namespace App\Workflows\Campaign;

use App\Workflows\Activities\GiveReferrerReward;
use Illuminate\Support\Facades\Log;
use Workflow\ActivityStub;
use Workflow\Workflow;

class CustomerReferrerCampaign extends Workflow
{
    public function execute($campaign, $customer, $referrer)
    {
        Log::debug('handle referrer campaign' . $campaign->name);
        // get referrer customer
        $result = yield ActivityStub::make(GiveReferrerReward::class, $referrer, $customer);

        return $result;
    }
}
