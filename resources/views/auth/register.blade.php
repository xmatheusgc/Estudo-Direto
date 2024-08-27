@extends('app')

@section('title', 'Registro')

@section('content')

<main id="register-screen">
    <form action="/users/store" method="POST" class="register-form">
        @csrf
        <h1 class="register-title">Registrar</h1>

        <div class="input-box">
            <i class='bx bxs-user'></i>
            <input type="text" name="username" placeholder="Usuário" value="{{ old('username') }}" required>
        </div>

        <div class="input-box">
            <i class='bx bxs-envelope'></i>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="input-box">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" name="password" placeholder="Senha" required>
        </div>

        <div class="input-box">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" name="password_confirmation" placeholder="Confirme a Senha" required>
        </div>

        <button class="register-btn">Registrar</button>

        <p class="login">
            Já possui uma conta?
            <a href="/users/xlogin">Entrar</a>
        </p>
    </form>
</main>

@endsection  
