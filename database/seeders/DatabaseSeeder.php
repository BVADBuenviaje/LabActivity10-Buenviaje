<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Seeders and Factories
    public function run(): void
    {
        $this->call([
            AuthorSeeder::class,
            PostSeeder::class,
        ]);
    }
}
