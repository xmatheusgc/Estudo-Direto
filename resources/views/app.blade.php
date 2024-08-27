<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>EstudoDireto</title>
</head>
<body>
    <nav>
        <div class="nav-title-container nav-section">        
            <h1>EstudoDireto</h1>
        </div>

        <div class="nav-list-container nav-section">
            <ul class="nav-list">
                <li class="nav-list-item"><a href="/">Início</a></li>
                <li><a href="/contact">Contato</a></li>
                <li><a href="/about">Sobre</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/courses">Cursos</a></li>
            </ul>
        </div>

        <div class="nav-tools nav-section">
            <ul>
                <li class="btn-color-mode btn-light-mode"><button><i class='bx bx-sun'></i></button></li>
                <li class="btn-color-mode btn-dark-mode"><button><i class='bx bx-moon'></i></button></li>
                
                @if(Auth::check())
                    <li>
                        <a id="account-img" href="/users/profile">
                            @if(Auth::user()->profile_image)
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Foto de Perfil" class="profile-icon">
                            @else
                                <i class='bx bx-user-circle account-icon' style="font-size: 1.5em;"></i>
                            @endif
                        </a>
                    </li>
                    <li><a href="/users/logout"><i class='bx bx-exit account-icon' style="font-size: 1.4em;"></i>Sair</a></li>
                @else
                    <li><a href="/users/login"><i class='bx bx-user-circle account-icon' style="font-size: 1.5em;"></i>Entrar</a></li>
                    <li><a href="/users/create-account"><i class='bx bx-user-plus account-icon' style="font-size: 1.5em;"></i>Cadastre-se</a></li>
                @endif
            </ul>
        </div>      
    </nav>     

    @yield('content')

    <footer>
        <ul class="footer-list">
            <li><a href="#">Desenvolvedores</a></li>
            <li><a href="#">Ensine no Estudo Direto</a></li>
            <li><a href="#">Obtenha o aplicativo</a></li>
            <li><a href="#">Quem somos</a></li>
            <li><a href="#">Fale conosco</a></li>
        </ul>

        <ul class="footer-list">
            <li><a href="#">Carreiras</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Ajuda e suporte</a></li>
            <li><a href="#">Afiliado</a></li>
            <li><a href="#">Investidores</a></li>
        </ul>

        <ul class="footer-list">
            <li><a href="#">Políticas de privacidade</a></li>
            <li><a href="#">Termos</a></li>
            <li><a href="#">Configurações de cookie</a></li>
            <li><a href="#">Mapa do site</a></li>
            <li><a href="#">Declaração de acessibilidade</a></li>
        </ul>
    </footer>
</body>
</html>
