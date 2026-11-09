<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    // Build and Test
    public function test_root_redirects_to_posts(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/posts');
    }
}
