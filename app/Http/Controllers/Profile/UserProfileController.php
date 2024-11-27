<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show(User $user) 
    {
        $user->load(['achievements', 'activeCourses', 'friends']); 

        return view('profile', compact('user'));  
    }
}
