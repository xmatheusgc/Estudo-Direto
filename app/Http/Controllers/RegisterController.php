<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users', 
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:12', 
                'regex:/[a-z]/', 
                'regex:/[A-Z]/', 
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/', 
                'confirmed', 
            ],
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), 
        ]);

        return redirect('/signin')->with('success', 'Cadastro realizado com sucesso!');
    }
}
