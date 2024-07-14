<?php


namespace App\Workflows\Activities;

use App\Actions\Tenant\Wallet\AddPoints;
use App\Models\Customer;
use Workflow\Activity;

class GivePointToCustomer extends Activity
{
    public $tries = 1;

    public function execute($params, $context = [])
    {
        $customer = Customer::findOrFail($params['customer_id']);
        AddPoints::run(
            customer: $customer,
            amount: $params['amount'],
            campaign: $context['campaign_id'],
            reason: $params['reason']
        );
        return [];
    }
}
