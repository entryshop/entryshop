<?php

namespace App\Workflows\Activities;

use Workflow\Activity;

class GiveReferrerReward extends Activity
{
    public function execute($customer)
    {
        return $customer->id;
    }
}
