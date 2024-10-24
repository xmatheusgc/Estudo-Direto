<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // Método para listar cursos (API e frontend)
    public function index()
    {
        $courses = Course::all();
        // Verifica se a requisição é uma API
        if (request()->expectsJson()) {
            return response()->json($courses);
        }

        return view('courses.index', compact('courses'));
    }

    // Método para mostrar um curso específico (API e frontend)
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Curso não encontrado'], 404);
        }

        if (request()->expectsJson()) {
            return response()->json($course);
        }

        return view('courses.show', compact('course'));
    }

    // Método para criar um novo curso (API e frontend)
    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|string',
            'exercises' => 'nullable|string',
            'duration' => 'required|numeric',
            'level' => 'nullable|string',
            'resources' => 'nullable|url',
            'type' => 'nullable|string',
        ]);

        if ($request->hasFile('course_image')) {
            $path = $request->file('course_image')->store('course_images', 'public');
            $validatedData['course_image'] = $path;
        }

        $course = Course::create($validatedData);

        // Retorna resposta para API ou redireciona para o frontend
        if ($request->expectsJson()) {
            return response()->json($course, 201);
        }

        return redirect()->route('courses.index')->with('success', 'Curso criado com sucesso!');
    }

    // Método para atualizar um curso (API)
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Curso não encontrado'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|string',
            'exercises' => 'nullable|string',
            'duration' => 'nullable|numeric',
            'level' => 'nullable|string',
            'resources' => 'nullable|url',
            'type' => 'nullable|string',
        ]);

        if ($request->hasFile('course_image')) {
            $path = $request->file('course_image')->store('course_images', 'public');
            $validatedData['course_image'] = $path;
        }

        $course->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json($course);
        }

        return redirect()->route('courses.index')->with('success', 'Curso atualizado com sucesso!');
    }

    // Método para excluir um curso (API)
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
