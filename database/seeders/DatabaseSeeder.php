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
            'lifetime_access' => true,
            'username' => 'thomasdelage',
            'name' => 'Thomas',
            'email' => 'contact@thomasdelage.com',
        ]);

        Product::factory()->count(3)
            ->sequence(
                [
                    'stripe_id' => 'price_1PSfR2Rt929MsGc0O4lnF2kU',
                    'name' => 'Monthly',
                    'description' => 'monthly access',
                    'type' => 'monthly',
                    'price' => 4.99,
                ],
                [
                    'stripe_id' => 'price_1PSfR2Rt929MsGc0WNCwyQ4o',
                    'name' => 'Yearly',
                    'description' => 'yearly access',
                    'type' => 'yearly',
                    'price' => 49.99
                ],
                [
                    'stripe_id' => 'price_1PSfR2Rt929MsGc0mgoFnZoY',
                    'name' => 'One Time Payment',
                    'description' => 'lifetime access',
                    'type' => 'one-time',
                    'price' => 99.99,
                ],
            )
            ->create();
    }
}
