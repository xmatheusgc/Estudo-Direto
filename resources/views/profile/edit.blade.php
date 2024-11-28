@extends('app')

@section('title', 'Editar Perfil')

@section('content')
<main class="w-100 p-0">
    <section class="profile-banner d-flex align-items-center justify-content-between px-5 py-3 border-bottom shadow-sm" style="background-image: url('{{ $user->banner ? Storage::url($user->banner) : asset('images/default-banner.jpg') }}'); background-size: cover; background-position: center;">
        <div class="section-container d-flex align-items-center gap-3">
            <div class="profile-avatar border rounded-circle overflow-hidden">
                <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/default-avatar.png') }}" class="img-fluid">
            </div>
            <div>
                <h1>{{ $user->name }}</h1>
                @if ($user->username)
                    <p class="username-txt">{{"@" . $user->username }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="profile-edit-section h-100 p-3 d-flex justify-content-center">
        <form class="edit-profile-form border p-4 rounded shadow-sm" action="{{ route('profile.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                @error('name') 
                    <div class="alert alert-danger mt-2">{{ $message }}</div> 
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="username" class="form-label">Nome de Usuário</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}">
                @error('username') 
                    <div class="alert alert-danger mt-2">{{ $message }}</div> 
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email') 
                    <div class="alert alert-danger mt-2">{{ $message }}</div> 
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="avatar" class="form-label">Foto de Perfil</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
                @error('avatar') 
                    <div class="alert alert-danger mt-2">{{ $message }}</div> 
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="banner" class="form-label">Banner</label>
                <input type="file" name="banner" id="banner" class="form-control">
                @error('banner') 
                    <div class="alert alert-danger mt-2">{{ $message }}</div> 
                @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>        
    </section>
</main>
@endsection
