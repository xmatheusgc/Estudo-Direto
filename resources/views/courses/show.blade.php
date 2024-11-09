@extends('app')

@section('title', $course->title)

@section('content')
<main>
    <h1>{{ $course->title }}</h1>
    
    <p><strong>Descrição:</strong> {{ $course->description }}</p>

    @if($course->video)
        <p><strong>Vídeo:</strong> <a href="{{ $course->video }}" target="_blank">Assistir ao vídeo</a></p>
    @endif

    @if($course->exercises)
        <p><strong>Exercícios:</strong> {{ $course->exercises }}</p>
    @endif

    @if($course->resources)
        <p><strong>Recursos:</strong> <a href="{{ $course->resources }}" target="_blank">Acessar recursos</a></p>
    @endif

    <a href="{{ route('courses.index') }}">Voltar para a lista de cursos</a>
</main>
@endsection
