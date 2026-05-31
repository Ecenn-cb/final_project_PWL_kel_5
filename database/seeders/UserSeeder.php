<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'branch_id' => null,
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Gudang',
            'email' => 'gudang@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 5,
            'branch_id' => 1,
        ]);
    }
}