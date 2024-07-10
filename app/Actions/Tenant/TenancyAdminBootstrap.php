<?php

namespace App\Actions\Tenant;

use Lorisleiva\Actions\Concerns\AsAction;
use Stancl\Tenancy\Events\TenancyInitialized;

class TenancyAdminBootstrap
{
    use AsAction;

    public function handle($tenant)
    {
        admin()
            ->logout('/admin/logout')
            ->menus([
                [
                    'title' => 'Dashboard',
                    'icon'  => 'ri-dashboard-2-line',
                    'url'   => '/admin',
                ],
            ])
            ->uploadUsing(function ($file) {
                return tenant_asset($file->store('uploads'));
            })
            ->brandName($tenant->id);
    }

    public function asListener(TenancyInitialized $event)
    {
        $this->handle($event->tenancy->tenant);
    }
}
