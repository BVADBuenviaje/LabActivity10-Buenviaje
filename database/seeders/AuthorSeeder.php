<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    // Seeders and Factories
    public function run(): void
    {
        Author::create([
            'name' => 'Kagawad Brian Buenviaje',
            'position' => 'Kagawad',
            'email' => 'kagawad.buenviaje@bulletin.test',
        ]);

        Author::factory()->count(4)->create();
    }
}
