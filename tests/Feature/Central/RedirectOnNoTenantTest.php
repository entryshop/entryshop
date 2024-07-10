<?php

namespace Tests\Feature\Central;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Stancl\Tenancy\Contracts\TenantCouldNotBeIdentifiedException;
use Tests\TestCase;

final class RedirectOnNoTenantTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function exception_is_thrown(): void
    {
        $this->expectException(TenantCouldNotBeIdentifiedException::class);

        $this->withoutExceptionHandling()
            ->get('http://foo.localhost');
    }

}
