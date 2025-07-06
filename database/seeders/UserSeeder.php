<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@eproq.com',
            'password' => Hash::make('password'),
        ])->assignRole('superadmin');

        // Create Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@eproq.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        // Create Procurement Officer user
        User::create([
            'name' => 'Procurement Officer',
            'email' => 'procurement@eproq.com',
            'password' => Hash::make('password'),
        ])->assignRole('procurement-officer');

        // Create Vendor user
        User::create([
            'name' => 'Vendor',
            'email' => 'vendor@eproq.com',
            'password' => Hash::make('password'),
        ])->assignRole('vendor');
    }
}