@extends('app')

@section('title', 'Cursos')

@section('content')

<main>
    <h1>Cursos Disponíveis</h1>

    <section class="d-flex flex-wrap">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($courses as $course)
            <div class="course-card border m-3 shadow-sm">
                <div class="border-bottom">
                    <img src="{{ asset('storage/' . $course->course_image) }}" alt="Imagem do Curso {{ $course->title }}">
                </div>
                
                <div class="card-body m-3">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="card-text">{{ Str::limit($course->description, 100, '...') }}</p>
                    <p>Preço: R$ {{ number_format($course->price, 2, ',', '.') }}</p>
                    <p>Categoria: {{ $course->category }}</p>
                    <p>Nível: {{ $course->level ?? 'Não informado' }}</p>
                    <p>Duração: {{ $course->duration }} horas</p>
                </div>
                <a href="{{ route('courses.show', $course->id) }}" class="show-course btn btn-primary w-100 p-2">Ver Detalhes</a>
            </div>
        @endforeach
    </section>

    <livewire:comments-component />
</main>

@endsection
