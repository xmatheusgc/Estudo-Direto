<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Páginas de cursos
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create'); 
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store'); 
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show'); 
});

// API de cursos
Route::prefix('api/courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('api.courses.index');      
    Route::get('/{id}', [CourseController::class, 'show'])->name('api.courses.show');     
    Route::post('/', [CourseController::class, 'store'])->name('api.courses.store');      
    Route::put('/{id}', [CourseController::class, 'update'])->name('api.courses.update'); 
    Route::delete('/{id}', [CourseController::class, 'destroy'])->name('api.courses.destroy'); 
});
