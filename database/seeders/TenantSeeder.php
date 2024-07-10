<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Parse\Admin\Models\AdminUser;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        AdminUser::create([
            'name'     => 'Test User',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
