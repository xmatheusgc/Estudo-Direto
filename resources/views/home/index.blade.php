@extends('app')

@section('title', 'Inicio')

@section('content')

<main class="p-3">
    <div class="home-banner text-center border p-5">
        <h1 class="home-title">Bem-vindo ao Estudo Direto!</h1>
        <p class="lead">Encontre os melhores cursos online para impulsionar sua carreira.</p>
        <a href="{{ route('courses.index') }}" class="btn btn-primary btn-lg">Ver Cursos</a>
    </div>

    <section class="mt-5">
        <h2 class="home-title text-center w-100">Destaques</h2>
        <div class="d-flex justify-content-center flex-wrap">
            @foreach($featuredCourses as $course)
                <div class="home-course-card border m-3">
                    <img src="{{ asset('storage/' . $course->course_image) }}" class="card-img-top border-bottom" alt="Imagem do Curso">

                    <div class="card-body m-3">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                        <p><strong>Preço:</strong> R$ {{ number_format($course->price, 2, ',', '.') }}</p>
                    </div>

                    <a href="{{ route('courses.show', $course->id) }}" class="details-button btn btn-primary w-100">Detalhes</a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-5 text-center">
        <h2>Porque escolher nossos cursos?</h2>
        <p>Qualidade, confiança e acessibilidade. Aprenda no seu ritmo!</p>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Explore Todos os Cursos</a>
    </section>

    @if(session('closePopup'))
        <script>
            if (window.opener) {  
                window.opener.postMessage("close-popup", window.location.origin);
            }
            window.close();  
        </script>
    @endif
</main>

@endsection


