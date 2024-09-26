<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCourseController; // Controlador para API

// Prefixar as rotas com 'api/courses'
Route::prefix('courses')->group(function () {
    Route::get('/', [ApiCourseController::class, 'index'])->name('api.courses.index');      // Listar todos os cursos (JSON)
    Route::get('/{id}', [ApiCourseController::class, 'show'])->name('api.courses.show');     // Mostrar um curso específico (JSON)
    Route::post('/', [ApiCourseController::class, 'store'])->name('api.courses.store');      // Criar um novo curso (JSON)
    Route::put('/{id}', [ApiCourseController::class, 'update'])->name('api.courses.update'); // Atualizar um curso existente (JSON)
    Route::delete('/{id}', [ApiCourseController::class, 'destroy'])->name('api.courses.destroy'); // Deletar um curso (JSON)
});
