<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categories (product types)
        $categoryNames = ['Shoes', 'Shirts', 'Trousers', 'Accessories'];
        $categories = collect($categoryNames)->mapWithKeys(function ($name) {
            $cat = Category::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
            return [$cat->slug => $cat];
        });

        // Attributes & values
        $color = Attribute::firstOrCreate(['slug' => 'color'], values: ['name' => 'Color']);
        $size = Attribute::firstOrCreate(['slug' => 'size'], ['name' => 'Size']);

        $colors = collect([
            'Black',
            '#000000',
            'White',
            '#FFFFFF',
            'Red',
            '#EF4444',
            'Blue',
            '#3B82F6',
            'Green',
            '#10B981',
            'Gray',
            '#9CA3AF',
        ])
            ->chunk(2)
            ->map(function ($pair) use ($color) {
                // Reindex to [0,1] then destructure
                [$name, $hex] = $pair->values()->all();

                return AttributeValue::firstOrCreate(
                    ['attribute_id' => $color->id, 'slug' => Str::slug($name)],
                    ['name' => $name, 'meta' => $hex]
                );
            });


        $sizes = collect(['XS', 'S', 'M', 'L', 'XL', 'XXL'])
            ->map(fn($n) => AttributeValue::firstOrCreate(
                ['attribute_id' => $size->id, 'slug' => Str::slug($n)],
                ['name' => $n]
            ));

        // Products
        Product::factory(120)->create()->each(function (Product $p) use ($categories, $colors, $sizes) {
            // 1–2 categories per product
            $p->categories()->attach(
                $categories->random(fake()->numberBetween(1, 2))->pluck('id')->all()
            );

            // Color (1) + Size (1–2)
            $p->attributeValues()->attach($colors->random(1)->pluck('id')->all());
            $p->attributeValues()->attach($sizes->random(fake()->numberBetween(1, 2))->pluck('id')->all());

            // Images: 1 primary + 1–2 more
            $primary = ProductImage::factory()->make(['is_primary' => true, 'sort_order' => 0]);
            $p->images()->save($primary);

            $extraCount = fake()->numberBetween(0, 2);
            for ($i = 1; $i <= $extraCount; $i++) {
                $p->images()->save(ProductImage::factory()->make(['sort_order' => $i]));
            }
        });
    }
}
