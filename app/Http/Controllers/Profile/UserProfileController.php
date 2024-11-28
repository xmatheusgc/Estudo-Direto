<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
    
        if (!$user) {
            return redirect()->route('home')->with('error', 'Usuário não encontrado!');
        }
    
        $posts = $user->posts;
    
        $isCompany = $user->hasRole('company');
        $company = $isCompany ? $user->company : null;
    
        return view('profile.show', compact('user', 'posts', 'isCompany', 'company'));
    }
    

    public function editProfile(User $user)
    {
        if (Auth::user()->id != $user->id && !Auth::user()->hasRole('admin')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar este perfil.');
        }

        return view('profile.edit', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        if (Auth::user()->id != $user->id && !Auth::user()->hasRole('admin')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para atualizar este perfil.');
        }
    
        // Atualizando a validação do 'username' para permitir o valor atual
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id, // Permite o próprio username do usuário
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar); 
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validatedData['avatar'] = $avatarPath;
        }
    
        if ($request->hasFile('banner')) {
            if ($user->banner) {
                Storage::delete($user->banner); 
            }
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $validatedData['banner'] = $bannerPath;
        }
    
        $user->update($validatedData);
    
        return redirect()->route('profile.show', ['user' => $user])->with('success', 'Perfil atualizado com sucesso!');
    }      
}