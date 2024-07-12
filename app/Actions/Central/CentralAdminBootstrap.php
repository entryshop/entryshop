<?php

namespace App\Actions\Central;

use Parse\Admin\Concerns\AsAction;

class CentralAdminBootstrap
{
    use AsAction;

    public function handle()
    {
        admin()
            ->theme()
            ->brandName('EntryShop')
            ->logout('/admin/logout')
            ->logo('/images/logo-dark.png')
            ->miniLogo('/images/logo-dark-sm.png')
            ->menus([
                [
                    'title' => 'Dashboard',
                    'icon'  => 'ri-dashboard-2-line',
                    'url'   => '/admin',
                ],
                [
                    'title' => 'Tenants',
                    'icon'  => 'ri-building-2-line',
                    'url'   => '/admin/tenants',
                ],
                [
                    'title' => 'Domains',
                    'icon'  => 'ri-global-line',
                    'url'   => '/admin/domains',
                ],
            ]);
    }
}
