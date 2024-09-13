<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\category;
use App\Models\author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'category_id' => Category::inRandomOrder()->first()->id,
            'author_id' => Author::inRandomOrder()->first()->id,
            'average_rating' => $this->faker->randomFloat(1, 1, 5),
            'voter' => $this->faker->numberBetween(1, 1000),
        ];
    }
}