<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;  
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $credentials = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        
        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'email' => "Usuário ou Senha Inválidos!"
        ])->withInput();
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',
                'confirmed',
            ],
        ]);

        $validatedData['avatar'] = 'avatars/default-user.png';
        
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'] ?? null, 
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'avatar' => $validatedData['avatar'],
        ]);               

        $user->assignRole('user');

        return redirect('/login')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function showCompanyRegister()
    {
        return view('auth.company.register-company');
    }

    public function registerCompany(Request $req)
    {
        $validatedData = $req->validate([
            'company_name' => 'required|string|max:255',
            'company_cnpj' => 'required|string|max:18|unique:companies|regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/',
            'company_phone' => 'nullable|string|max:20',
            'company_address' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',
                'confirmed',
            ],
        ]);
    
        $avatar = 'avatars/default-user.png';
    
        $user = User::create([
            'name' => $validatedData['company_name'],
            'email' => $validatedData['email'],
            'username' => 'company_' . Str::slug($validatedData['company_name']) . rand(1000, 9999),
            'password' => Hash::make($validatedData['password']),
            'avatar' => $avatar, 
        ]);
    
        try {
            $company = Company::create([
                'company_name' => $validatedData['company_name'],
                'company_cnpj' => $validatedData['company_cnpj'],
                'company_phone' => $validatedData['company_phone'],
                'company_address' => $validatedData['company_address'],
                'user_id' => $user->id, 
            ]);
        } catch (\Exception $e) {
            dd('Erro ao salvar empresa:', $e->getMessage());
        }
    
        $user->assignRole('company');
    
        Auth::login($user);
    
        return redirect()->route('auth.login')->with('success', 'Cadastro de empresa realizado com sucesso!');
    }
    
}

