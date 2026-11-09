<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    // Build and Test
    use RefreshDatabase;

    public function test_posts_index_displays_published_posts(): void
    {
        $author = Author::create([
            'name' => 'Kagawad Brian Buenviaje',
            'position' => 'Kagawad',
            'email' => 'kagawad.buenviaje@bulletin.test',
        ]);

        $published = Post::create([
            'author_id' => $author->id,
            'title' => 'Purok Buenviaje Clean-up Drive',
            'category' => 'Clean-up Drive',
            'body' => 'Notice body content.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-08-15 08:00:00',
            'views' => 0,
        ]);

        $draft = Post::create([
            'author_id' => $author->id,
            'title' => 'Draft Notice',
            'category' => 'Announcement',
            'body' => 'Secret draft content.',
            'is_published' => false,
            'is_pinned' => false,
            'published_at' => null,
            'views' => 0,
        ]);

        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertSee('Barangay Bulletin - Purok Buenviaje');
        $response->assertSee('Purok Buenviaje Clean-up Drive');
        $response->assertDontSee('Draft Notice');
    }

    public function test_posts_index_filters_by_search_query_and_category(): void
    {
        $author = Author::create([
            'name' => 'Kagawad Brian Buenviaje',
            'position' => 'Kagawad',
            'email' => 'kagawad.buenviaje@bulletin.test',
        ]);

        Post::create([
            'author_id' => $author->id,
            'title' => 'Medical Mission Schedule',
            'category' => 'Health',
            'body' => 'Medical mission details.',
            'is_published' => true,
            'is_pinned' => false,
            'published_at' => now(),
            'views' => 0,
        ]);

        Post::create([
            'author_id' => $author->id,
            'title' => 'Ayuda Distribution Dates',
            'category' => 'Ayuda',
            'body' => 'Ayuda distribution details.',
            'is_published' => true,
            'is_pinned' => false,
            'published_at' => now(),
            'views' => 0,
        ]);

        $responseQuery = $this->get('/posts?q=Medical');
        $responseQuery->assertStatus(200);
        $responseQuery->assertSee('Medical Mission Schedule');
        $responseQuery->assertDontSee('Ayuda Distribution Dates');

        $responseCategory = $this->get('/posts?category=Ayuda');
        $responseCategory->assertStatus(200);
        $responseCategory->assertSee('Ayuda Distribution Dates');
        $responseCategory->assertDontSee('Medical Mission Schedule');
    }

    public function test_posts_show_increments_views_for_published_post(): void
    {
        $author = Author::create([
            'name' => 'Kagawad Brian Buenviaje',
            'position' => 'Kagawad',
            'email' => 'kagawad.buenviaje@bulletin.test',
        ]);

        $post = Post::create([
            'author_id' => $author->id,
            'title' => 'Purok Buenviaje Clean-up Drive',
            'category' => 'Clean-up Drive',
            'body' => 'Full clean-up body description.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-08-15 08:00:00',
            'views' => 5,
        ]);

        $response = $this->get('/posts/' . $post->id);

        $response->assertStatus(200);
        $response->assertSee('Purok Buenviaje Clean-up Drive');
        $response->assertSee('6 views');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'views' => 6,
        ]);
    }

    public function test_posts_show_aborts_404_for_draft_post(): void
    {
        $author = Author::create([
            'name' => 'Kagawad Brian Buenviaje',
            'position' => 'Kagawad',
            'email' => 'kagawad.buenviaje@bulletin.test',
        ]);

        $draft = Post::create([
            'author_id' => $author->id,
            'title' => 'Unpublished Internal Memo',
            'category' => 'Peace & Order',
            'body' => 'Internal memo content.',
            'is_published' => false,
            'is_pinned' => false,
            'published_at' => null,
            'views' => 0,
        ]);

        $response = $this->get('/posts/' . $draft->id);

        $response->assertStatus(404);
    }
}
