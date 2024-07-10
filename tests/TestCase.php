<?php

namespace Tests;

use App\Actions\Central\CreateTenantAction;
use App\Models\Central\Tenant;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Str;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        config(['tenancy.database.prefix' => 'test_tenant']);
    }

    protected function createTenant(array $data = [], string $domain = null): Tenant
    {
        $domain = $domain ?? Str::random('10');

        return (new CreateTenantAction)(array_merge([
            'name' => 'Foo company',
        ], $data), $domain);
    }
}
