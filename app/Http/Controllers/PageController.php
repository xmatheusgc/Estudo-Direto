<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home.index');
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
}
