<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');



Route::middleware(['auth'])->group(function () {
    Route::get('/community', [PageController::class, 'community'])->name('community');
    Route::get('/calendar', [PageController::class, 'calendar'])->name('calendar');

    Route::get('/users/profile', [ProfileController::class, 'profile'])->name('profile.show');
    Route::put('/users/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/users/logout', [LoginController::class, 'logout'])->name('logout');
});

require base_path('routes/auth.php');
require base_path('routes/courses.php');
