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
            'name' => ucfirst(fake()->word()),
            'price' => fake()->randomFloat(2),
            'image' => "https://picsum.photos/id/" . random_int(0, 1000) . "/400/300",
            'description' => fake()->paragraph()
        ];
    }
}
