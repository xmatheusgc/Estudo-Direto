<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ApiCourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses); 
    }

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

        return response()->json($course, 201); 
    }

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
