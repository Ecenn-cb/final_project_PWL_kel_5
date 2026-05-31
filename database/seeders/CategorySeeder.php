<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Makanan',
            'Minuman',
            'Snack',
            'Sembako',
            'Perawatan Tubuh',
            'Peralatan Rumah Tangga'
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category
            ]);
        }
    }
}