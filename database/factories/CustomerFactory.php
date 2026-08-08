<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tempArr = [
            'name' => fake()->name,
            'email' => fake()->unique()->safeEmail,
            'phone' => rand(100000, 9999999),
            'address' => fake()->text(32)
        ];
        $tempArr['slug'] = Str::slug($tempArr['name']);

        return $tempArr;
    }
}
