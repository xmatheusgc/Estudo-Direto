<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseViewController extends Controller
{
    public function index()
    {
        $courses = Course::all(); 
        return view('courses.index', compact('courses')); 
    }
    

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }
}
