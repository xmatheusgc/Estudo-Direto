<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');

Route::get('/signin', [LoginController::class, 'login'])->name('login');
Route::post('/auth', [LoginController::class, 'auth']);

Route::get('/signup', [RegisterController::class, 'create'])->name('register.create');
Route::post('/users/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index'); 

Route::middleware(['auth'])->group(function () {
    Route::get('/community', [PageController::class, 'community'])->name('community');
    Route::get('/calendar', [PageController::class, 'calendar'])->name('calendar');

    Route::get('/users/profile', [ProfileController::class, 'profile'])->name('profile.show');
    Route::put('/users/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/users/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create'); 
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store'); 
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show'); 
});

Route::prefix('api/courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('api.courses.index');      
    Route::get('/{id}', [CourseController::class, 'show'])->name('api.courses.show');     
    Route::post('/', [CourseController::class, 'store'])->name('api.courses.store');      
    Route::put('/{id}', [CourseController::class, 'update'])->name('api.courses.update'); 
    Route::delete('/{id}', [CourseController::class, 'destroy'])->name('api.courses.destroy'); 
});