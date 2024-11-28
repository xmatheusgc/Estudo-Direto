<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register.submit');

    Route::get('/register/company', [AuthController::class, 'showCompanyRegister'])->name('auth.register.company');
    Route::post('/register/company', [AuthController::class, 'registerCompany'])->name('auth.register.company.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('login')->name('login.')->group(function () {
    Route::get('google', [OAuthController::class, 'redirectToGoogle'])->name('google');
    Route::get('google/callback', [OAuthController::class, 'handleGoogleCallback']);

    Route::get('facebook', [OAuthController::class, 'redirectToFacebook'])->name('facebook');
    Route::get('facebook/callback', [OAuthController::class, 'handleFacebookCallback']);

    Route::get('github', [OAuthController::class, 'redirectToGithub'])->name('github');
    Route::get('github/callback', [OAuthController::class, 'handleGithubCallback']);
});

Route::get('/auth/success', [OAuthController::class, 'success'])->name('auth.success');

