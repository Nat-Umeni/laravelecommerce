<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seed = Str::random(12);
        $url  = "https://picsum.photos/seed/{$seed}/900/900";

        return [
            'url'         => $url,
            'alt'         => fake()->sentence(3),
            'is_primary'  => false,
            'sort_order'  => 0,
        ];
    }
}
