@extends('app')

@section('title', 'Inicio')

@section('content')

<main class="main-home">
    <section class="banner">
        <div class="content">
            <h2 class="titles">Bem-vindo ao EstudoDireto</h2>
            <p>Transforme seus estudos com organização e eficiência.</p>
            <button class="banner-btn">Saiba mais!</button>
        </div>
        <img class="banner-img" src="img/home-screen-banner-light.svg" alt="Estudos Online">
    </section>
    
    <section class="cursos-populares">
        <div class="content">
            <h2 class="titles">Cursos Populares</h2>
            <div class="cursos-lista">
                <div class="curso-item">
                    <img src="https://static-00.iconduck.com/assets.00/laravel-icon-497x512-uwybstke.png" alt="Curso de Laravel">
                    <h3 class="titles">Curso de Laravel</h3>
                    <p>Aprenda Laravel do zero</p>
                </div>

                <div class="curso-item">
                    <img src="https://static-00.iconduck.com/assets.00/vue-js-icon-2048x1766-btrgkrhi.png" alt="Curso de Vue.js">
                    <h3 class="titles">Curso de Vue.js</h3>
                    <p>Desenvolvimento front-end com Vue.js</p>
                </div>

                <div class="curso-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png" alt="Curso de Vue.js">
                    <h3 class="titles">Curso de Java Script</h3>
                    <p>Desenvolvimento front-end com Java Script</p>
                </div>

                <div class="curso-item">
                    <img src="https://pngimg.com/d/php_PNG29.png" alt="Curso de Vue.js">
                    <h3 class="titles">Curso de PHP</h3>
                    <p>Desenvolvimento back-end com PHP</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="depoimentos">
        <div class="content">
            <h2 class="titles">Depoimentos</h2>
            <div class="depoimento-item">
                <p>"Excelente curso de Laravel, aprendi muito!"</p>
                <small>- João Silva</small>
            </div>
            <div class="depoimento-item">
                <p>"Os cursos são bem estruturados e fáceis de seguir."</p>
                <small>- Maria Oliveira</small>
            </div>
        </div>
    </section>  
</main>

@endsection

@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
