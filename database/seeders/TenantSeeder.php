<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Customer;
use App\Models\CustomerEvent;
use App\Models\CustomEvent;
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
            ],
        ]);
    }
}
