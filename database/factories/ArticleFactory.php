<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            // Generates a random sentence (approx 6 words)
        'title' => fake()->sentence(6), 
        
        // Generates a random paragraph (approx 20 sentences)
        'content' => fake()->paragraph(20),
        
        ];
    }
}
