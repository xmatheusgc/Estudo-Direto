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
    <h1 class="nav-logo"><a href="/" class="text-decoration-none">EstudoDireto</a></h1>

    <div class="drop-menu d-md-none border shadow-sm">
      <ul class="p-0 m-0">
        <li class="drop-list-item px-3 py-2"><a href="/">Início</a></li>
        <li class="drop-list-item px-3 py-2"><a href="/courses">Cursos</a></li>
        <li class="drop-list-item px-3 py-2"><a href="/blog">Blog</a></li>
        <li class="drop-list-item px-3 py-2"><a href="/about">Sobre</a></li>
        <li class="drop-list-item px-3 py-2"><a href="/contact">Contato</a></li>
        <li class="border-top px-3 py-2"><a href="/signin" class="d-flex align-items-center"><i class='bx bx-user-circle'></i>Fazer Login</a></li>
      </ul>
    </div>

    <ul class="d-none d-md-flex justify-content-center p-0 m-0 nav-menu">
      <li class="nav-list-item"><a href="/">Início</a></li>
      <li class="nav-list-item"><a href="/courses">Cursos</a></li>
      <li class="nav-list-item"><a href="/blog">Blog</a></li>
      <li class="nav-list-item"><a href="/about">Sobre</a></li>
      <li class="nav-list-item"><a href="/contact">Contato</a></li>
    </ul>

    <ul class="d-flex align-items-center justify-content-end gap-1 p-0 m-0 nav-utils">
      @if(Auth::check())
        <li>
          <a id="account-img" href="/users/profile">
            @if(Auth::user()->profile_image)
              <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Foto de Perfil" class="profile-icon">
            @else
              <i class='bx bx-user-circle account-icon'></i>
            @endif
          </a>
        </li>
      @else
        <a href="/signin" class="d-flex align-items-center gap-1"><i class='bx bx-user-circle'></i>Fazer Login</a></li>
      @endif

      <input type="checkbox" id="menu-toggle" class="menu-toggle d-none">
      <label for="menu-toggle" class="menu-icon d-md-none"><i class='bx bx-menu'></i></label>
    </ul>
  </nav>

  @yield('content')

  @livewireScripts
  @vite(['resources/js/app.js'])  
</body>
</html> 