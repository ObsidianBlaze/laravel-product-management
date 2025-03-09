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
        Product::factory()->count(10)->create();

        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'category',
                        'status',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_create_a_product(): void
    {
        $data = [
            'name' => 'Laptop',
            'category' => 'Electronics',
            'status' => ProductStatusEnum::AVAILABLE()->value,
        ];

        $this->postJson(route('products.store'), $data)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'category',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ])
            ->assertJson([
                'data' => $data,
            ]);
    }

    /** @test */
    public function it_can_show_a_product(): void
    {
        $product = Product::factory()->create();

        $this->getJson(route('products.show', $product->id))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'category' => $product->category,
                    'status' => $product->status->value,
                    'created_at' => $product->created_at->toDateTimeString(),
                    'updated_at' => $product->updated_at->toDateTimeString(),
                ],
            ]);
    }

    /** @test */
    public function it_can_return_404_if_product_not_found(): void
    {
        $this->get(route('products.show', 5))
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Product not found!',
            ]);
    }
}
