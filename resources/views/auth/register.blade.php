@extends('app')

@section('title', 'Registro')

@section('content')

<main class="d-flex justify-content-center align-items-center">

    @if($errors->any())
        <div class="alert alert-danger">
            <p id="lbl-error">{{ $errors->first() }}</p>
        </div>
    @endif  

    <form action="{{ route('auth.register.submit') }}" method="POST" class="login-form border rounded p-3">
        @csrf
        <h1 class="login-title text-center mb-4">Registrar</h1>

        <div class="form-group">
            <label for="name" class="form-label"><i class='bx bxs-user'></i> Nome Completo</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nome Completo" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="username" class="form-label"><i class='bx bxs-user'></i> Apelido (Opcional)</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Apelido (Opcional)" value="{{ old('username') }}">
            @error('username')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label"><i class='bx bxs-envelope'></i> E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label"><i class='bx bxs-lock-alt'></i> Senha</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
            @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label"><i class='bx bxs-lock-alt'></i> Confirme a Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirme a Senha" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block w-100 mt-4">Registrar</button>

        <p class="mt-3 text-center">
            Já possui uma conta? <a href="{{ route('auth.login') }}" class="text-decoration-none">Entrar</a>
        </p>

        <div class="d-flex justify-content-center">
            <span class="oauth-login m-1 p-1">
                <a href="javascript:void(0)" onclick="loginWithPopup('{{ route('login.google') }}')" class="btn btn-danger w-100 mb-2"><i class='bx bxl-google'></i> Google</a>
            </span>
            
            <span class="oauth-login m-1 p-1">
                <a href="javascript:void(0)" onclick="loginWithPopup('{{ route('login.facebook') }}')" class="btn btn-primary w-100 mb-2"><i class='bx bxl-facebook-circle'></i> Facebook</a>
            </span>
    
            <span class="oauth-login m-1 p-1">
                <a href="javascript:void(0)" onclick="loginWithPopup('{{ route('login.github') }}')" class="btn btn-dark w-100 mb-2"><i class='bx bxl-github'></i> GitHub</a>
            </span>
        </div>
    </form>
</main>

<script>
    function loginWithPopup(url) {
        const width = 600;
        const height = 600;
        const left = (screen.width - width) / 2;
        const top = (screen.height - height) / 2;
        
        const popup = window.open(url, 'SocialLogin', `width=${width},height=${height},top=${top},left=${left}`);
        
        const checkPopup = setInterval(() => {
            if (popup.closed) {
                clearInterval(checkPopup);
                window.location.reload();
            }
        }, 500);
    }

    window.addEventListener('message', function(event) {
        if (event.origin === window.location.origin && event.data === 'close-popup') {
            window.location.reload();
        }
    });
</script>

@endsection
