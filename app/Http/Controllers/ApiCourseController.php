<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ApiCourseController extends Controller
{
    // Método para listar todos os cursos como JSON
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses); // Retorna a lista de cursos como JSON
    }

    // Método para exibir um curso específico como JSON
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Curso não encontrado'], 404);
        }

        return response()->json($course);
    }

    // Método para armazenar um novo curso
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'video' => 'nullable|string',
            'exercises' => 'nullable|string',
            'duration' => 'nullable|string',
            'level' => 'nullable|string',
            'resources' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        $course = Course::create($validatedData);

        return response()->json($course, 201); // Código 201 indica que o curso foi criado
    }

    // Método para atualizar um curso existente
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Curso não encontrado'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'image' => 'nullable|string',
            'video' => 'nullable|string',
            'exercises' => 'nullable|string',
            'duration' => 'nullable|string',
            'level' => 'nullable|string',
            'resources' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        $course->update($validatedData);

        return response()->json($course);
    }

    // Método para excluir um curso existente
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Curso não encontrado'], 404);
        }

        $course->delete();

        return response()->json(['message' => 'Curso excluído com sucesso']);
    }
}
