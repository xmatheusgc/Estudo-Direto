<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/signin', [LoginController::class, 'login'])->name('login');
    Route::post('/auth', [LoginController::class, 'auth']);

    Route::get('/signup', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/users/store', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('login/facebook', [AuthController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [AuthController::class, 'handleFacebookCallback']);

Route::get('login/github', [AuthController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [AuthController::class, 'handleGithubCallback']);

Route::get('/auth/success', [AuthController::class, 'success'])->name('auth.success');
