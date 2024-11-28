<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        if (!Auth::user()->hasRole('company')) {
            return redirect()->route('courses.index')->with('error', 'Você não tem permissão para criar um curso.');
        }

        return view('courses.create');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id); 
        return view('courses.show', compact('course')); 
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|string',
            'duration' => 'required|numeric',
            'level' => 'nullable|string',
            'resources' => 'nullable|url',
            'category' => 'required|string|max:255',
            'type' => 'nullable|string',
        ]);

        if ($request->hasFile('course_image')) {
            $path = $request->file('course_image')->store('course_images', 'public');
            $validatedData['course_image'] = $path;
        }

        $validatedData['user_id'] = Auth::id();

        Course::create($validatedData);

        return redirect()->route('courses.index')->with('success', 'Curso criado com sucesso!');
    }
}
