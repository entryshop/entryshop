<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Customer;
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

        Customer::factory()->create([
            'email' => 'user@sample.com',
            'password' => bcrypt('password')
        ]);
    }
}
