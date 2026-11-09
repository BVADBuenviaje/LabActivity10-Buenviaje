<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // Setup
    public function register(): void
    {
    }

    public function boot(): void
    {
        Paginator::useTailwind();
    }
}
