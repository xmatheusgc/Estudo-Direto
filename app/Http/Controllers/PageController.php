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

    // Telas de video Temp

    public function video1()
    {
        return view('layouts.video1');
    }

    public function video2()
    {
        return view('layouts.video2');
    }

    // 

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
