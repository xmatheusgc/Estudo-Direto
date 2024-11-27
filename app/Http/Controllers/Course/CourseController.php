<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // Exibir todos os cursos
    public function index()
    {
        $courses = Course::all();

        // Verificar se a requisição é uma API e retornar JSON se for
        if (request()->expectsJson()) {
            return response()->json($courses);
        }

        // Retornar a view para exibição dos cursos
        return view('courses.index', compact('courses'));
    }

    // Exibir um curso específico
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return request()->expectsJson() 
                ? response()->json(['message' => 'Curso não encontrado'], 404) 
                : abort(404, 'Curso não encontrado');
        }

        // Verificar se a requisição é uma API e retornar JSON se for
        if (request()->expectsJson()) {
            return response()->json($course);
        }

        // Retornar a view para exibição do curso
        return view('courses.show', compact('course'));
    }

    // Formulário de criação de curso
    public function create()
    {
        return view('courses.create');
    }

    // Armazenar um novo curso
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

        // Armazenar imagem, se presente
        if ($request->hasFile('course_image')) {
            $path = $request->file('course_image')->store('course_images', 'public');
            $validatedData['course_image'] = $path;
        }

        $course = Course::create($validatedData);

        // Retornar JSON se for API ou redirecionar para index com mensagem de sucesso
        return request()->expectsJson() 
            ? response()->json($course, 201) 
            : redirect()->route('courses.index')->with('success', 'Curso criado com sucesso!');
    }

    // Atualizar um curso existente
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return request()->expectsJson() 
                ? response()->json(['message' => 'Curso não encontrado'], 404) 
                : abort(404, 'Curso não encontrado');
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

        // Atualizar imagem, se presente
        if ($request->hasFile('course_image')) {
            $path = $request->file('course_image')->store('course_images', 'public');
            $validatedData['course_image'] = $path;
        }

        $course->update($validatedData);

        // Retornar JSON se for API ou redirecionar para index com mensagem de sucesso
        return request()->expectsJson() 
            ? response()->json($course) 
            : redirect()->route('courses.index')->with('success', 'Curso atualizado com sucesso!');
    }

    // Excluir um curso
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return request()->expectsJson() 
                ? response()->json(['message' => 'Curso não encontrado'], 404) 
                : abort(404, 'Curso não encontrado');
        }

        $course->delete();

        return request()->expectsJson() 
            ? response()->json(['message' => 'Curso excluído com sucesso']) 
            : redirect()->route('courses.index')->with('success', 'Curso excluído com sucesso!');
    }
}
