<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    // Seeders and Factories
    public function run(): void
    {
        $authors = Author::all();
        $kagawad = Author::where('email', 'kagawad.buenviaje@bulletin.test')->first();

        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Buenviaje Clean-up Drive',
            'category' => 'Clean-up Drive',
            'body' => 'Join us for the Purok Buenviaje Clean-up Drive this weekend. Please bring cleaning materials and let us keep our purok clean and green.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-08-15 08:00:00',
            'views' => 0,
        ]);
    }
}
