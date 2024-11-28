<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Estudo Direto - Plataforma de Cursos Online">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Estudo Direto</title>

    @livewireStyles
    @livewireScripts
    @vite(['resources/sass/app.scss'])
</head>

<body>
  <nav class="d-flex align-items-center justify-content-between p-4 shadow-sm border-bottom lh-1">
    <h1 class="nav-logo"><a href="{{ route('home') }}">EstudoDireto</a></h1>

    <ul class="d-none d-md-flex justify-content-center p-0 m-0 nav-menu">
      <li class="nav-list-item"><a href="{{ route('home') }}">Início</a></li>
      <li class="nav-list-item"><a href="{{ route('courses.index') }}">Cursos</a></li>
      <li class="nav-list-item"><a href="{{ route('blog') }}">Blog</a></li>
      <li class="nav-list-item"><a href="{{ route('about') }}">Sobre</a></li>
      <li class="nav-list-item"><a href="{{ route('contact') }}">Contato</a></li>
    </ul>

    <div class="dropdown show d-none d-md-block">
      <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class='bx bx-sun'></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDark">
        <li><a class="dropdown-item d-flex align-items-center gap-1" data-bs-theme-value="light"><i class='bx bx-sun'></i>Claro</a></li>
        <li><a class="dropdown-item d-flex align-items-center gap-1" data-bs-theme-value="dark"><i class='bx bx-moon' ></i>Escuro</a></li>
      </ul>
    </div>

    <ul class="d-flex align-items-center justify-content-end gap-1 p-0 m-0 nav-utils">
      <li>
        @if(Auth::check())
          <a id="account-img" href="{{ route('profile.show', ['user' => Auth::user()]) }}">
            @if(Auth::user()->avatar)
              <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Foto de Perfil" class="user-profile">
            @else
              <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Foto de Perfil" class="user-profile">
            @endif
          </a> 
        @else
        <a href="{{ route('auth.login') }}" class="d-none d-md-flex align-items-center gap-1 p-2">
            <i class='bx bx-user-circle'></i>Login
        </a>
        @endif
      </li>

      <div class="dropdown show d-block d-md-none">
        <button class="btn dropdown d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class='bx bx-menu'></i>
        </button>
        <div class="dropdown-menu ">
          <a class="dropdown-item" href="{{ route('home') }}">Início</a>
          <a class="dropdown-item" href="{{ route('courses.index') }}">Cursos</a>
          <a class="dropdown-item" href="{{ route('blog') }}">Blog</a>
          <a class="dropdown-item" href="{{ route('about') }}">Sobre</a>
          <a class="dropdown-item" href="{{ route('contact') }}">Contato</a>
          @if (Auth::check() == false)
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item d-flex align-items-center gap-1" href="{{ route('auth.login') }}"><i class='bx bx-user-circle'></i>Fazer Login</a></li>
          @endif  
        </div>
      </div>
    </ul>
  </nav>

  @yield('content')

  <footer class="d-flex justify-content-start align-itens-center border-top p-5"></footer>

  @vite(['resources/js/app.js'])  
</body>
</html> 