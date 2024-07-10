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
                    'title'    => 'Members',
                    'icon'     => 'ri-group-line',
                    'children' => [
                        [
                            'title' => 'List of members',
                            'url'   => '/admin',
                        ],
                        [
                            'title' => 'Tiers',
                            'url'   => '/admin',
                        ],
                        [
                            'title' => 'Segments',
                            'url'   => '/admin',
                        ],
                        [
                            'title' => 'Referrers',
                            'url'   => '/admin',
                        ],
                        [
                            'title' => 'Transactions',
                            'url'   => '/admin',
                        ],
                        [
                            'title' => 'Custom events',
                            'url'   => '/admin',
                        ],
                    ],
                ],
                [
                    'title' => 'Wallets',
                    'icon'  => 'ri-wallet-3-line',
                    'url'   => '/admin/wallets',
                ],
                [
                    'title' => 'Coupons',
                    'icon'  => 'ri-coupon-3-line',
                    'url'   => '/admin',
                ],
                [
                    'title' => 'Campaigns',
                    'icon'  => 'ri-flag-line',
                    'url'   => '/admin',
                ],
                [
                    'title' => 'Badges',
                    'icon'  => 'ri-copper-diamond-line',
                    'url'   => '/admin',
                ],
                [
                    'title' => 'Rewards',
                    'icon'  => 'ri-gift-2-line',
                    'url'   => '/admin',
                ],
                [
                    'title' => 'Scanning',
                    'icon'  => ' ri-qr-scan-2-line',
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
                        [
                            'title' => 'Developer',
                            'url'   => '/admin/admin-users',
                        ],
                    ],
                ],
            ])
            ->uploadUsing(fn($file) => tenant_asset($file->store('uploads')))
            ->logo('/images/logo-dark.png')
            ->miniLogo('/images/logo-dark-sm.png')
            ->brandName($tenant->name);
    }

    public function asListener(TenancyInitialized $event)
    {
        $this->handle($event->tenancy->tenant);
    }
}
