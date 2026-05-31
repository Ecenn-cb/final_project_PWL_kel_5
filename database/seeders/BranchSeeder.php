<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            [
                'branch_name' => 'Cabang Medan',
                'city' => 'Medan',
                'address' => 'Jl. Gatot Subroto',
                'phone' => '061111111'
            ],
            [
                'branch_name' => 'Cabang Binjai',
                'city' => 'Binjai',
                'address' => 'Jl. Soekarno Hatta',
                'phone' => '061222222'
            ],
            [
                'branch_name' => 'Cabang Tebing Tinggi',
                'city' => 'Tebing Tinggi',
                'address' => 'Jl. Sudirman',
                'phone' => '061333333'
            ],
            [
                'branch_name' => 'Cabang Kisaran',
                'city' => 'Kisaran',
                'address' => 'Jl. Ahmad Yani',
                'phone' => '061444444'
            ],
            [
                'branch_name' => 'Cabang Pematangsiantar',
                'city' => 'Pematangsiantar',
                'address' => 'Jl. Merdeka',
                'phone' => '061555555'
            ]
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}