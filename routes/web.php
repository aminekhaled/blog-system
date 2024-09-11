<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PostsController;

Auth::routes();

Route::group(['prefix' => 'posts'], function() {
    Route::get('show/{id}', [PostsController::class, 'show'])->name('frontend.posts.show');
    Route::get('show/by-category/{category_name}', [PostsController::class, 'showByCategory'])->name('frontend.posts.show-by-category');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
