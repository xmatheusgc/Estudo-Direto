<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
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
        return view('courses.create');
    }

    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            abort(404); 
        }

        return view('courses.show', compact('course')); 
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

        Course::create($validatedData);

        return redirect()->route('courses.index')->with('success', 'Curso criado com sucesso!');
    }
}
