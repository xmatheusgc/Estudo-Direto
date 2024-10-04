<!-- resources/views/profile.blade.php -->
@extends('app')

@section('title', 'Perfil')

@section('content')
<main class="container">
    <div class="profile-card">
        <div class="user-main">
            @if(Auth::user()->profile_image)
                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Foto de Perfil" class="profile-image">
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="20vh" height="20vh" viewBox="0 0 24 24"><path d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z" fill="var(--secondary-text-color)"/><path d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z" fill="var(--secondary-text-color)"/></svg> 
            @endif
            <h2>{{ Auth::user()->name }}</h2>
        </div>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
            
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" placeholder="Digite sua nova senha">
            
            <label for="profile_image">
                <div class="upload-container">
                    <div class="send-img"><i class='bx bx-plus'></i></div>
                    <p id="file-name" class="file-name">Enviar Imagem</p> <!-- Exibição do nome do arquivo -->
                </div>
            </label>
            <input type="file" id="profile_image" name="profile_image" onchange="displayFileName()" style="display: none;">            
            
            <button type="submit">Atualizar Perfil</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>        
</main>

<script>
    function displayFileName() {
        const fileInput = document.getElementById('profile_image');
        const fileNameDisplay = document.getElementById('file-name');
        
        if (fileInput.files.length > 0) {
            const fileName = fileInput.files[0].name;
            fileNameDisplay.textContent = fileName;
        } else {
            fileNameDisplay.textContent = ''; 
        }
    }
</script>

@endsection
