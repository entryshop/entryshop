<?php

namespace Database\Seeders;

use App\Events\Tenant\Transaction\TransactionCreatedEvent;
use App\Models\Campaign;
use App\Models\Client;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\CustomerEvent;
use App\Models\CustomEvent;
use App\Models\TierSet;
use App\Models\Wallet;
use App\Workflows\Activities\GivePointToCustomer;
use Illuminate\Database\Seeder;
use Parse\Admin\Models\AdminUser;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        AdminUser::create([
            'id'       => 443822365922276,
            'name'     => 'Test User',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        Client::create([
            'name'     => 'Test Client',
            'key'      => 'test_key',
            'secret'   => 'test_secret',
            'is_admin' => true,
        ]);

        $customer = Customer::factory()->create([
            'email'    => 'user@sample.com',
            'password' => bcrypt('password'),
        ]);

        $custom_event = CustomEvent::create([
            'name'       => 'Daily Steps',
            'code'       => 'daily_steps',
            'attributes' => [
                [
                    'name' => 'count',
                ],
                [
                    'name' => 'date',
                ],
            ],
        ]);

        $customer_event = CustomerEvent::create([
            'event_id'    => $custom_event->id,
            'customer_id' => $customer->id,
            'event_date'  => now(),
            'attributes'  => [
                'count' => 1000,
                'date'  => '2024-01-06',
                'a'     => '2024-01-06',
            ],
        ]);

        Coupon::factory()->create([
            'name' => '满 100 减 12',
        ]);

        $tier_set = TierSet::create([
            'name' => 'Membership',
        ]);

        $tier_set->tiers()->create([
            'name'  => 'Bronze',
            'level' => 1,
        ]);

        $tier_set->tiers()->create([
            'name'  => 'Silver',
            'level' => 2,
        ]);

        $tier_set->tiers()->create([
            'name'  => 'Gold',
            'level' => 3,
        ]);

        Wallet::create([
            'name'       => 'Points',
            'is_default' => true,
        ]);

        Campaign::create([
            'name'     => 'Transaction campaign',
            'type'     => 'direct',
            'triggers' => [
                'type'  => 'event',
                'event' => TransactionCreatedEvent::class,
            ],
            'rules'    => [
                [
                    'conditions' => [
                    ],
                    'effects'    => [
                        [
                            'type'     => 'activity',
                            'activity' => GivePointToCustomer::class,
                            'target'   => 'customer',
                            'params'   => [
                                'points' => [
                                    'type'  => 'rate',
                                    'value' => 2,
                                ],
                            ],
                        ]
                    ],
                ],
            ],
        ]);
    }
}
