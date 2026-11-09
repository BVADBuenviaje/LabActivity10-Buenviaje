<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Controller and Routing
Route::redirect('/', '/posts');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
