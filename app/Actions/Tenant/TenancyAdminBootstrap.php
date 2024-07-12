<?php

namespace App\Actions\Tenant;

use App\Actions\Tenant\Support\GetTenantAdminMenu;
use Lorisleiva\Actions\Concerns\AsAction;
use Stancl\Tenancy\Events\TenancyInitialized;

class TenancyAdminBootstrap
{
    use AsAction;

    public function handle($tenant)
    {
        $menus = GetTenantAdminMenu::run();

        admin()
            ->theme()
            ->brandName($tenant->name)
            ->logout('/admin/logout')
            ->logo('/images/logo-dark.png')
            ->miniLogo('/images/logo-dark-sm.png')
            ->menus($menus)
            ->uploadUsing(fn($file) => tenant_asset($file->store('uploads')));
    }

    public function asListener(TenancyInitialized $event)
    {
        $this->handle($event->tenancy->tenant);
    }
}
