<?php
namespace Tests\Feature;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_fetch_all_products(): void
    {
        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertJson([]);
    }

    /** @test */
    public function it_can_create_a_product(): void
    {
        $data = [
            'name' => 'Laptop',
            'category' => 'Electronics',
            'status' => ProductStatusEnum::AVAILABLE(),
        ];

        $this->postJson(route('products.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /** @test */
    public function it_can_show_a_product(): void
    {
        $product = Product::factory()->create();

        $this->get(route('products.show', $product->id))
            ->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => $product->name,
            ]);
    }

    /** @test */
    public function it_can_return_404_if_product_not_found(): void
    {
        $this->get(route('products.show', 99))
        ->assertStatus(404)
            ->assertJson([
                'message' => 'Product not found',
            ]);
    }
}
