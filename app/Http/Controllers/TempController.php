<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class TempController extends Controller
{
    public function home()
    {
        $featuredCourses = Course::take(6)->get(); 
        return view('home.index', compact('featuredCourses'));
    }

    public function about()
    {
        return view('about.index');
    }

    public function contact()
    {
        return view('contact.index');
    }

    public function community()
    {
        return view('community.index');
    }

    public function blog()
    {
        return view('blog.index');
    }

    public function calendar()
    {
        return view('calendar.index');
    }

    public function activities()
    {
        return view('activities.index');
    }

    public function profile()
    {
        return view('profile.index');
    }
}
