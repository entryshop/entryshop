<?php

namespace App\Actions\Tenant\Support;

use App\Support\Helper;
use Parse\Admin\Concerns\AsAction;

class GetTenantAdminMenu
{
    use AsAction;

    public function handle()
    {
        $menus = [
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
                        'url'   => '/admin/customers',
                    ],
                    [
                        'title' => 'Tiers',
                        'url'   => '/admin/tiers',
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
                        'url'   => '/admin/customer-events',
                    ],
                ],
            ],
            [
                'title' => 'Wallets',
                'icon'  => 'ri-wallet-3-line',
                'url'   => '/admin/wallets',
            ],
        ];

        if (Helper::setting('module_coupons')) {
            $menus[] = [
                'title' => 'Coupons',
                'icon'  => 'ri-coupon-3-line',
                'url'   => '/admin',
            ];
        }

        if (Helper::setting('module_campaigns')) {
            $menus[] = [
                'title' => 'Campaigns',
                'icon'  => 'ri-flag-line',
                'url'   => '/admin',
            ];
        }

        if (Helper::setting('module_badges')) {
            $menus[] = [
                'title' => 'Badges',
                'icon'  => 'ri-copper-diamond-line',
                'url'   => '/admin',
            ];
        }

        if (Helper::setting('module_rewards')) {
            $menus[] = [
                'title' => 'Rewards',
                'icon'  => 'ri-gift-2-line',
                'url'   => '/admin',
            ];
        }

        if (Helper::setting('module_scanning')) {
            $menus[] = [
                'title' => 'Scanning',
                'icon'  => 'ri-qr-scan-2-line',
                'url'   => '/admin',
            ];
        }

        if (Helper::setting('module_content')) {
            $menus[] = [
                'title' => 'Content',
                'icon'  => 'ri-camera-lens-line',
                'url'   => '/admin',
            ];
        }

        $menus[] = [
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
        ];
        return $menus;
    }
}
