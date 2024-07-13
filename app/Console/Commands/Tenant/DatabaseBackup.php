<?php

namespace App\Console\Commands\Tenant;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Concerns\HasATenantsOption;
use Stancl\Tenancy\Concerns\TenantAwareCommand;

class DatabaseBackup extends Command
{
    use TenantAwareCommand, HasATenantsOption;

    protected $signature = 'tenants:backup';
    protected $description = 'Backup tenant databases';

    public function handle()
    {
        foreach ($this->getTenants() as $tenant) {
            $this->info("Backing up database for tenant: [{$tenant->name}] started");
            $tenant->run(function () {
                Artisan::call('backup:run', [
                    '--only-db' => true,
                ]);
            });
            $this->info("Backing up database for tenant: [{$tenant->name}] done");
        }
    }
}
