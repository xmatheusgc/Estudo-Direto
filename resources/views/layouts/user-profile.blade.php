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
                <img src="{{ asset('images/default-profile.png') }}" alt="Foto de Perfil" class="profile-image">
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
        
</main>
@endsection
