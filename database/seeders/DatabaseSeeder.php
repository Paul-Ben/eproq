<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run the role seeder first to create all necessary roles
        $this->call(RoleSeeder::class);

        // Run the user seeder to create users with assigned roles
        $this->call(UserSeeder::class);
    }
}
