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
                [
                    'title'    => 'Settings',
                    'icon'     => 'ri-settings-3-line',
                    'children' => [
                        [
                            'title' => 'Users',
                            'url'   => '/admin/admin-users',
                        ],
                    ],
                ],
            ])
            ->uploadUsing(fn($file) => tenant_asset($file->store('uploads')))
            ->brandName($tenant->id);
    }

    public function asListener(TenancyInitialized $event)
    {
        $this->handle($event->tenancy->tenant);
    }
}
