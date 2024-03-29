<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'schattig, gevlekt, groene ogen',
            'location' => $this->faker->company(),
            'breed' => $this->faker->word(),
            'description' => $this->faker->paragraph(2),
            'likes' => 0,
        ];
    }
}
