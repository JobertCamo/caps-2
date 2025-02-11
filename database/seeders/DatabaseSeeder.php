<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'hr',
            'department' => 'IT Department',
            ],
        );
        User::factory()->create(
            [
            'name' => 'Test Employee',
            'email' => 'employee@example.com',
            'role' => 'emp',
            'department' => 'Sales Department',
            ],
        );
    }
}
