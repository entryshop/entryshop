<?php

namespace App\Actions\Central;

use App\Models\Central\Tenant;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * Create a tenant with the necessary information for the application.
 *
 * We don't use a listener here, because we want to be able to create "simplified" tenants in tests.
 * This action is only used when we need to create the tenant properly (with billing logic etc).
 */
class CreateTenantAction
{
    use AsAction;

    public function handle(array $data, string $domain): Tenant
    {
        $tenant = Tenant::create($data);

        $tenant->createDomain([
            'domain' => $domain,
        ])->makePrimary()->makeFallback();

        return $tenant;
    }
}
