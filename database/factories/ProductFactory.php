<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $name = fake()->words(3, true);
        $gender = fake()->randomElement(['men', 'women', 'unisex']);

        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name . '-' . fake()->unique()->numberBetween(1000, 9999)),
            'gender' => $gender,
            'description' => fake()->paragraph(),
            'price_cents' => fake()->numberBetween(1500, 15000),
            'stock' => fake()->boolean(20) ? 0 : fake()->numberBetween(1, 25), // ~20% sold out
            'is_published' => true,
            'published_at' => now()->subDays(fake()->numberBetween(0, 120)),
            'created_at' => now()->subDays(fake()->numberBetween(0, 120)),
            'updated_at' => now(),
        ];
    }
}
