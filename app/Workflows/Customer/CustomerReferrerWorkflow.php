<?php

namespace App\Workflows\Customer;

use App\Workflows\Activities\GiveReferrerReward;
use Illuminate\Support\Facades\Log;
use Workflow\ActivityStub;
use Workflow\Workflow;
use Workflow\WorkflowStub;

class CustomerReferrerWorkflow extends Workflow
{
    public function execute($customer)
    {
        $result = yield ActivityStub::make(GiveReferrerReward::class, $customer);
        Log::debug('start '.$result);
        // Wait for 10 seconds
        $waitSeconds = yield WorkflowStub::sideEffect(fn () => random_int(60, 120));
        Log::debug('wait '.$waitSeconds);
        yield WorkflowStub::timer($waitSeconds);
        Log::debug('end '.$result);
        return $result;
    }
}
