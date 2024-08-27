@extends('app')

@section('title', 'Login')

@section('content')

<main id="login-screen">
    <form action="/auth" method="POST" class="login-form">
        @csrf
        <h1 class="login-title">Entrar</h1>

        <div class="input-box">
            <i class='bx bxs-envelope'></i>
            <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
        </div>

        <div class="input-box">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" name="password" placeholder="Senha" required>
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
            <a href="/users/create-account">Criar</a>
        </p>
    </form>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p id="lbl-error">{{ $error }}</p>
        @endforeach
    @endif
</main>

@endsection  