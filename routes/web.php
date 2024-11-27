<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempController;
use App\Http\Controllers\Profile\UserProfileController;

Route::get('/', [TempController::class, 'home'])->name('home');
Route::get('/about', [TempController::class, 'about'])->name('about');
Route::get('/contact', [TempController::class, 'contact'])->name('contact');
Route::get('/blog', [TempController::class, 'blog'])->name('blog');

Route::middleware(['auth'])->group(function () {
    Route::get('/community', [TempController::class, 'community'])->name('community');
    Route::get('/calendar', [TempController::class, 'calendar'])->name('calendar');
});

Route::get('/profile/{user}', [UserProfileController::class, 'show'])->name('profile.show');

require base_path('routes/auth.php');
require base_path('routes/courses.php');
