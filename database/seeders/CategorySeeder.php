<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\RealEstate\Models\Category;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Str;

class CategorySeeder extends BaseSeeder
{
    public function run(): void
    {
        Category::query()->truncate();

        $categories = [
            'Apartment',
            'Villa',
            'Condo',
            'House',
            'Land',
            'Commercial property',
        ];

        foreach ($categories as $item) {
            $category = Category::query()->create([
                'name' => $item,
                'description' => fake()->realText(),
                'is_default' => rand(0, 1),
            ]);

            Slug::query()->create([
                'reference_type' => Category::class,
                'reference_id' => $category->id,
                'key' => Str::slug($category->name),
                'prefix' => SlugHelper::getPrefix(Category::class),
            ]);
        }
    }
}
