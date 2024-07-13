<?php

namespace App\Workflows\Activities;

use Illuminate\Support\Facades\Log;
use Workflow\Activity;

class GiveReferrerReward extends Activity
{
    public $retry = 3;

    public function execute($referrer, $customer)
    {
        Log::debug('give referrer 10 points'.$referrer->id);
        Log::debug('give customer 10 points'.$customer->id);

        return true;
    }
}
