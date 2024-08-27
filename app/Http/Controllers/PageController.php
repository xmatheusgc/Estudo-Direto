<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('layouts.welcome');
    }

    public function about()
    {
        return view('layouts.about');
    }

    public function courses()
    {
        return view('layouts.courses');
    }

    public function contact()
    {
        return view('layouts.contact');
    }

    public function community()
    {
        return view('layouts.community');
    }

    public function blog()
    {
        return view('layouts.blog');
    }

    public function calendar()
    {
        return view('layouts.calendar');
    }

    public function activities()
    {
        return view('layouts.activities');
    }
}
