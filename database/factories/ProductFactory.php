<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    return [
        'title' => fake()->words(3, true),                      
        'description' => fake()->paragraph(2),                 
        'price' => fake()->randomFloat(2, 100, 9999),     
        'category_id' => fake()->numberBetween(1, 5),           
        'photo' => fake()->imageUrl(600, 600, 'products'),       
    ];
}

}
