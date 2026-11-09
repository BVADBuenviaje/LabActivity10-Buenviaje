<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    // Seeders and Factories
    public function definition(): array
    {
        return [
            'author_id' => Author::factory(),
            'title' => fake()->sentence(6),
            'category' => fake()->randomElement([
                'Announcement',
                'Health',
                'Peace & Order',
                'Ayuda',
                'Clean-up Drive',
            ]),
            'body' => fake()->paragraphs(3, true),
            'is_published' => true,
            'published_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn () => [
            'is_published' => false,
            'published_at' => null,
        ]);
    }
}
