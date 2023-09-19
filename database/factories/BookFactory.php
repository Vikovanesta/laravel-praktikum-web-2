<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
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
            'title' => $this->faker->realText(20),
            'author' => $this->faker->name(),
            'description' => $this->faker->realText(200),
            'date_published' => $this->faker->date('d-m-Y'),
            'publisher' => $this->faker->company(), 
            'page_count' => $this->faker->numberBetween(100, 1000),
            'cover_url' => $this->faker->imageUrl(),
            'price' => $this->faker->randomNumber(6, false),
        ];
    }
}
