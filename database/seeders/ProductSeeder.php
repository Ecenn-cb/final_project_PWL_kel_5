<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'product_code' => 'PRD001',
            'product_name' => 'Indomie Goreng',
            'price' => 3500
        ]);

        Product::create([
            'category_id' => 2,
            'product_code' => 'PRD002',
            'product_name' => 'Aqua 600ml',
            'price' => 5000
        ]);

        Product::create([
            'category_id' => 3,
            'product_code' => 'PRD003',
            'product_name' => 'Chitato',
            'price' => 12000
        ]);
    }
}