<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AddIsAdminColumnTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_the_is_admin_column_to_users_table(): void
    {
        $this->artisan('migrate');
        $this->assertTrue(
            Schema::hasColumn('users', 'is_admin'));
    }

    /** @test */
    public function it_can_remove_the_is_admin_column_when_migration_is_rolled_back(): void
    {
        $this->artisan('migrate');
        $this->assertTrue(Schema::hasColumn('users', 'is_admin'));

        $this->artisan('migrate:rollback');

        $this->assertFalse(
            Schema::hasColumn('users', 'is_admin'));
    }
}
