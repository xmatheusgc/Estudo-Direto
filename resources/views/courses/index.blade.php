@extends('app')

@section('title', 'Cursos')

@section('content')

<main id="d-flex justify-content-start align-items-center p-3">
    <h2 class="course-screen-title">Lista de Cursos</h2>
    <div class="course-card-container">
        @foreach($courses as $course)
            <div class="course-card">
                <img src="{{ asset('storage/' . $course->course_image) }}" alt="{{ $course->title }}">
                <div class="card-section">
                    <h2>{{ $course->title }}</h2>
                    <p>{{ $course->description }}</p>
                    <p>Duração: {{ $course->duration }} horas</p>
                </div> 
                <a href="{{ route('courses.show', $course->id) }}" class="view-course-btn">Ver Curso</a>
            </div>
        @endforeach
    </div>
</main>


@endsection
