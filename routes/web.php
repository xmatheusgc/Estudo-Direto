<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

Route::get('/',             [PageController::class, 'index'])       ->name('welcome');
Route::get('/about',        [PageController::class, 'about'])       ->name('about');
Route::get('/courses',      [PageController::class, 'courses'])     ->name('courses')->middleware('auth');

Route::get('/courses/video1',      [PageController::class, 'video1'])     ->name('video1')->middleware('auth');
Route::get('/courses/video2',      [PageController::class, 'video2'])     ->name('video2')->middleware('auth');

Route::get('/contact',      [PageController::class, 'contact'])     ->name('contact');
Route::get('/community',    [PageController::class, 'community'])   ->middleware('auth');
Route::get('/blog',         [PageController::class, 'blog'])        ->name('blog');
Route::get('/calendar',     [PageController::class, 'calendar'])    ->name('calendar')->middleware('auth');

Route::get('/users/login',  [LoginController::class, 'login'])  ->name('login');
Route::post('/auth',        [LoginController::class, 'auth']);
Route::get('/users/logout', [LoginController::class, 'logout']) ->middleware('auth');

Route::get('/users/create-account', [RegisterController::class, 'create']);
Route::post('/users/store',         [RegisterController::class, 'store']);

Route::get('/users/profile', [ProfileController::class, 'profile'])->middleware('auth')->name('profile.show');
Route::put('/users/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');