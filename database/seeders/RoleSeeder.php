<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'procurement-officer']);
        Role::create(['name' => 'vendor']);
        Role::create(['name' => 'contractor']);
    }
}