<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductMigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_test_products_table_has_expected_columns(): void
    {
        $this->assertTrue(Schema::hasTable('products'));

        $expectedColumns = ['id', 'name', 'category', 'status', 'created_at', 'updated_at'];

        foreach ($expectedColumns as $column) {
            $this->assertTrue(Schema::hasColumn('products', $column), "Missing column: $column");
        }
    }}
