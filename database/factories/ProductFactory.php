<?php

namespace Database\Factories;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'category' => $this->faker->word,
            'status' => fake()->randomElement([ProductStatusEnum::AVAILABLE(), ProductStatusEnum::UNAVAILABLE()]),
        ];
    }
}
