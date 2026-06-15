<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'brand' => fake()->text(12),
            'category_id' => Category::factory(),
            'color' => fake()->safeColorName(),
            'description' => fake()->text(32),
            'price' => rand(100, 999),
            'qty' => rand(0, 100)
        ];
    }
}
