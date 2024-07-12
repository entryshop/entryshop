<?php

namespace App\Actions\Tenant;

use App\Actions\Tenant\Support\GetTenantAdminMenu;
use App\Support\Helper;
use Lorisleiva\Actions\Concerns\AsAction;

class TenancyAdminBootstrap
{
    use AsAction;

    public function handle()
    {
        $menus = GetTenantAdminMenu::run();

        admin()
            ->cspNonce(csp_nonce())
            ->theme()
            ->brandName(Helper::setting('site_name', tenant('name')))
            ->logout('/admin/logout')
            ->logo(Helper::setting('logo', '/images/logo-dark.png'))
            ->miniLogo(Helper::setting('logo_mini', '/images/logo-dark-sm.png'))
            ->menus($menus)
            ->uploadUsing(fn($file) => tenant_asset($file->store('uploads')));
    }
}
