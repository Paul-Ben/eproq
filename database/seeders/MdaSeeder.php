<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MdaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mdas')->insert([
            [
                'name' => 'Ministry of Finance',
                'description' => "Responsible for managing the state's finances and budget.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ministry of Health',
                'description' => 'Oversees public health policies and healthcare services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ministry of Education',
                'description' => 'Manages educational policies and institutions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ministry of Works',
                'description' => 'Handles infrastructure development and maintenance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ministry of Agriculture',
                'description' => 'Focuses on agricultural development and food security.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
