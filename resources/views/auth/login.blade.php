@extends('app')

@section('title', 'Login')

@section('content')

<main>

    @if($errors->any())
        <div class="error-background">
            <p id="lbl-error">{{ $errors->first() }}</p>
        </div>
    @endif  

    <form action="{{ route('auth.login.submit') }}" method="POST" class="login-form">
        @csrf
    
        <h1 class="login-title">Entrar</h1>
    
        <div class="input-box">
            <i class='bx bxs-envelope'></i>
            <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
            @error('email')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="input-box">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" name="password" placeholder="Senha" required>
            @error('password')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="remember-forgot-box">
            <label for="remember">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Lembrar dispositivo
            </label>
    
            <a href="#">Esqueceu a senha?</a>
        </div>
    
        <button type="submit" class="login-btn">Entrar</button>
    
        <p class="register">
            Não possui uma conta?
            <a href="{{ route('auth.register') }}">Criar</a>
        </p>
    </form>
    
    <div>
        <span class="oauth-login">
            <a href="javascript:void(0)" onclick="loginWithPopup('{{ route('login.google') }}')" id="google-login-btn"><i class='bx bxl-google'></i>Google</a>
        </span>
        
        <span class="oauth-login">
            <a href="javascript:void(0)" onclick="loginWithPopup('{{ route('login.facebook') }}')" id="facebook-login-btn"><i class='bx bxl-facebook-circle'></i>Facebook</a>
        </span>
    
        <span class="oauth-login">
            <a href="javascript:void(0)" onclick="loginWithPopup('{{ route('login.github') }}')" id="github-login-btn"><i class='bx bxl-github'></i>Github</a>
        </span>
    </div>
</main>

<script>
    // Função para abrir o popup
    function loginWithPopup(url) {
        const width = 600;
        const height = 600;
        const left = (screen.width - width) / 2;
        const top = (screen.height - height) / 2;
        
        const popup = window.open(url, 'SocialLogin', `width=${width},height=${height},top=${top},left=${left}`);
        
        // Verifica se o popup foi fechado a cada 500ms
        const checkPopup = setInterval(() => {
            if (popup.closed) {
                clearInterval(checkPopup);
                window.location.reload(); // Atualiza a página principal ao fechar o popup
            }
        }, 500);
    }

    // Listener para fechar o popup e atualizar a página principal
    window.addEventListener('message', function(event) {
        if (event.origin === window.location.origin && event.data === 'close-popup') {
            window.location.reload(); // Atualiza a página principal
        }
    });
</script>

@endsection
