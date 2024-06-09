<?php

namespace Database\Seeders;

use App\Models\Product;
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
        User::factory()->create([
            'role' => 'admin',
            'username' => 'thomasdelage',
            'name' => 'Thomas',
            'email' => 'contact@thomasdelage.com',
        ]);

        Product::factory()->count(3)->create();
    }
}
