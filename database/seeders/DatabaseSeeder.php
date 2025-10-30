<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        
        $this->call(RolesTableSeeder::class);
            $this->call([
        ProductSeeder::class,
    ]);
        User::factory(30)->create();
        // Product::factory(50)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}