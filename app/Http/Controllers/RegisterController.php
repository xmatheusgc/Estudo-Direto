<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $req)
    {
        $user = new User();
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect('/users/login')->with('success', 'Cadastro realizado com sucesso!');
    }
}
