<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Course\CourseController;

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
});

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

