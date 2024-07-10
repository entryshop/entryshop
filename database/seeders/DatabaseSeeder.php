<?php

namespace Database\Seeders;

use App\Actions\Central\CreateTenantAction;
use Illuminate\Database\Seeder;
use Parse\Admin\Models\AdminUser;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
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
