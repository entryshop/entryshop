<?php

namespace App\Models\Central;

use App\Exceptions\NoPrimaryDomainException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parse\Admin\Concerns\Searchable;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Concerns\MaintenanceMode;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
    use Searchable;
    use MaintenanceMode;
    use HasFactory;

    public $searches = ['data', 'id'];

    public function primary_domain()
    {
        return $this->hasOne(Domain::class)->where('is_primary', true);
    }

    public function fallback_domain()
    {
        return $this->hasOne(Domain::class)->where('is_fallback', true);
    }

    public function route($route, $parameters = [], $absolute = true)
    {
        if (!$this->primary_domain) {
            throw new NoPrimaryDomainException;
        }

        $domain = $this->primary_domain->domain;

        $parts = explode('.', $domain);
        if (count($parts) === 1) { // If subdomain
            $domain = Domain::domainFromSubdomain($domain);
        }

        return tenant_route($domain, $route, $parameters, $absolute);
    }

    public function impersonationUrl($user_id): string
    {
        $token = tenancy()->impersonate($this, $user_id, $this->route('tenant.home'), 'web')->token;

        return $this->route('tenant.impersonate', ['token' => $token]);
    }
}
