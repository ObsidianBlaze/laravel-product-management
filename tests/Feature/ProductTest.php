<?php
namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_fetch_all_products()
    {
        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertJson([]);
    }

    /** @test */
    public function it_can_create_a_product()
    {
        $data = [
            'name' => 'Laptop',
            'category' => 'Electronics',
            'status' => 'available',
        ];

        $this->postJson(route('products.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /** @test */
    public function it_can_show_a_product()
    {
        $product = Product::factory()->create();

        $this->get(route('products.show', $product->id))
            ->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => $product->name,
            ]);
    }
}
