<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\backend\PostsController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\backend\ProfilesController;


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::group(['prefix' => '/'], function() {
        Route::get('/', [PostsController::class, 'index'])->name('posts.index');
        Route::resource('posts', postsController::class);
    });

    Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function() {
        Route::get('/', [ProfilesController::class, 'index'])->name('profile.index');
        Route::post('/update', [ProfilesController::class, 'update'])->name('profile.update');
    });
    
    Route::group(['prefix' => 'settings', 'middleware' => 'auth'], function() {
        Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/update', [SettingsController::class, 'update'])->name('settings.update');
    });

});

