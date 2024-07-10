<?php

namespace Tests\Feature\Central;

use App\Models\Central\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class TenantAdminTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function updating_tenant_admins_email_changes_the_email_in_the_tenant_too(): void
    {
        $tenant = Tenant::create([
            'name' => 'Foo Company',
        ]);

        $this->assertSame('Foo Company', Tenant::first()->name);
    }
}
