<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['role_name' => 'Owner']);
        Role::create(['role_name' => 'Manager']);
        Role::create(['role_name' => 'Supervisor']);
        Role::create(['role_name' => 'Kasir']);
        Role::create(['role_name' => 'Gudang']);
    }
}