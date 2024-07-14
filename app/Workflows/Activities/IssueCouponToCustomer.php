<?php


namespace App\Workflows\Activities;

use Workflow\Activity;

class IssueCouponToCustomer extends Activity
{
    public $tries = 1;

    public function execute($params, $context = [])
    {
        return [];
    }
}
