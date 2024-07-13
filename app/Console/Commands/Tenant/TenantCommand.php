<?php

namespace App\Console\Commands\Tenant;

use Illuminate\Console\Command;
use Stancl\Tenancy\Concerns\HasATenantsOption;
use Stancl\Tenancy\Concerns\TenantAwareCommand;

class TenantCommand extends Command
{
    use TenantAwareCommand, HasATenantsOption;

    protected $signature = 'app:tenant-command';
    protected $description = 'Test tenant command description';

    public function handle()
    {
        $this->info("hello". $this->getTenants()->first()->name);
    }
}
