<?php

namespace App\Workflows\Campaign;

use App\Workflows\Activities\GivePointToCustomer;
use App\Workflows\Activities\IssueCouponToCustomer;
use App\Workflows\CustomWorkflow;

class CustomerReferrerCampaign extends CustomWorkflow
{
    public function getActivities()
    {
        return [
            [
                'type'   => 'activity',
                'class'  => GivePointToCustomer::class,
                'params' => [
                    'amount'      => 100,
                    'customer_id' => $this->context['customer_id'],
                    'reason'      => 'Referral',
                ],
            ],
            [
                'type'  => 'timer',
                'value' => 10,
            ],
            [
                'type'   => 'activity',
                'class'  => IssueCouponToCustomer::class,
                'params' => [
                    'coupon_id'   => 445010705677371,
                    'customer_id' => $this->context['customer_id'],
                ],
            ],
        ];
    }
}
