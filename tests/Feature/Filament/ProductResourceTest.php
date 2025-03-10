<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductResourceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_allow_only_admin_create_product(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $this->assertTrue(ProductResource::canCreate());

        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $this->assertFalse(ProductResource::canCreate());
    }

    /** @test */
    public function it_can_allow_only_admin_edit_product(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $product = Product::factory()->create();

        $this->assertTrue(ProductResource::canEdit($product));

        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $this->assertFalse(ProductResource::canEdit($product));
    }

    /** @test */
    public function it_can_allow_only_admin_delete_product(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $product = Product::factory()->create();

        $this->assertTrue(ProductResource::canDelete($product));

        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $this->assertFalse(ProductResource::canDelete($product));
    }
}
