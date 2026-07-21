<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tempArr = ['name' => fake()->sentence(rand(1,2), false),
                    'tagline' => fake()->sentence(rand(1,2), false)];

        $tempArr['slug'] = Str::slug($tempArr['name']);

        return $tempArr;
    }
}
