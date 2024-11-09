<!DOCTYPE html>
<html lang="pt-br">

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
    @vite(['resources/sass/app.scss'])
</head>

<body>
  <nav class="d-flex align-items-center justify-content-between p-4 shadow-sm border-bottom bg-light lh-1">
    <h1 class="nav-logo"><a href="{{ route('home') }}" class="text-decoration-none">EstudoDireto</a></h1>

    <ul class="d-none d-md-flex justify-content-center p-0 m-0 nav-menu">
      <li class="nav-list-item"><a href="{{ route('home') }}">Início</a></li>
      <li class="nav-list-item"><a href="{{ route('courses.index') }}">Cursos</a></li>
      <li class="nav-list-item"><a href="{{ route('blog') }}">Blog</a></li>
      <li class="nav-list-item"><a href="{{ route('about') }}">Sobre</a></li>
      <li class="nav-list-item"><a href="{{ route('contact') }}">Contato</a></li>
    </ul>

    <ul class="d-flex align-items-center justify-content-end gap-1 p-0 m-0 nav-utils">
      <li>
        @if(Auth::check())
          <a id="account-img" href="{{ route('profile.show') }}">
            @if(Auth::user()->profile_image)
              <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Foto de Perfil" class="profile-icon">
            @else
              <i class='bx bx-user-circle account-icon'></i>
            @endif
          </a> 
        @else
          <a href="{{ route('login') }}" class="d-none d-md-flex align-items-center gap-1"><i class='bx bx-user-circle'></i>Login</a></li>
        @endif
      </li>

      <li class="nav-item dropdown d-block d-md-none">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class='bx bx-menu'></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="{{ route('home') }}">Início</a></li>
          <li><a class="dropdown-item" href="{{ route('courses.index') }}">Cursos</a></li>
          <li><a class="dropdown-item" href="{{ route('blog') }}">Blog</a></li>
          <li><a class="dropdown-item" href="{{ route('about') }}">Sobre</a></li>
          <li><a class="dropdown-item" href="{{ route('contact') }}">Contato</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item d-flex align-items-center gap-1" href="{{ route('login') }}"><i class='bx bx-user-circle'></i>Fazer Login</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  @yield('content')

  <footer class="d-flex justify-content-start align-itens-center border p-5"></footer>

  @livewireScripts
  @vite(['resources/js/app.js'])  
</body>
</html> 