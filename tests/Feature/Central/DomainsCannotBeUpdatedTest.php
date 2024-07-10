<?php

namespace Tests\Feature\Central;

use App\Exceptions\DomainCannotBeChangedException;
use App\Models\Central\Domain;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class DomainsCannotBeUpdatedTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function domain_attributes_can_be_changed(): void
    {
        $tenant = $this->createTenant();

        $domain = $tenant->createDomain('foo.localhost');

        /** @var Domain $domain */
        $domain->update([
            'is_primary' => true,
        ]);

        $this->assertSame(true, $domain->is_primary);
    }

    #[Test]
    public function domain_columns_cannot_be_changed(): void
    {
        $tenant = $this->createTenant();

        $this->expectException(DomainCannotBeChangedException::class);

        /** @var Domain $domain */
        $domain = $tenant->createDomain('foo.localhost');
        $domain->update([
            'domain' => 'bar.localhost',
        ]);
    }
}
