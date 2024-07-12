<?php

namespace Database\Seeders;

use App\Actions\Central\CreateTenantAction;
use Illuminate\Database\Seeder;
use Parse\Admin\Models\AdminUser;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        AdminUser::create([
            'name'     => 'Test User',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        CreateTenantAction::run([
            'name' => 'Test Tenant',
        ], 'demo.entryshop.test');
    }
}
