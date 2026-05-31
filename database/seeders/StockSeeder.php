<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        for ($branch = 1; $branch <= 5; $branch++) {

            Stock::create([
                'branch_id' => $branch,
                'product_id' => 1,
                'stock' => 100
            ]);

            Stock::create([
                'branch_id' => $branch,
                'product_id' => 2,
                'stock' => 200
            ]);

            Stock::create([
                'branch_id' => $branch,
                'product_id' => 3,
                'stock' => 150
            ]);
        }
    }
}