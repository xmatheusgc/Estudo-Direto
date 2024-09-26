@extends('app')

@section('title', 'Criar Curso')

@section('content')

<main id="create-course-screen">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="create-course-form">
        @csrf

        <h1>Criar Novo Curso</h1>

        <div class="course-input-box">
            <input type="text" name="title" id="title" placeholder="Título do Curso" required>
        </div>

        <div class="course-input-box">
            <textarea name="description" id="description" placeholder="Descrição" required></textarea>
        </div>

        <div class="course-input-box">
            <input type="text" name="video" id="video" placeholder="Link do Vídeo">
        </div>

        <div class="course-input-box">
            <textarea name="exercises" id="exercises" placeholder="Exercícios"></textarea>
        </div>

        <div class="course-input-box">
            <input type="number" name="duration" id="duration" placeholder="Duração (em horas)" required>
        </div>

        <div class="course-input-box">
            <input type="url" name="resources" id="resources" placeholder="Recursos">
        </div>

        <div class="image-input-box course-input-box">
            <label for="course_image"><i class='bx bx-image-add'></i> Adicionar imagem </label>
            <input type="file" name="course_image" id="course_image">
        </div>

        <div class="select-input-box">
            <div class="type-container">
                <label for="type">Tipo de Curso:</label>
                <select name="type" id="type">
                    <option value="Programação">Programação</option>
                    <option value="FGB">FGB</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>

            <div class="level-container">
                <label for="level">Nível:</label>
                <select name="level" id="level">
                    <option value="Básico">Básico</option>
                    <option value="Intermediário">Intermediário</option>
                    <option value="Avançado">Avançado</option>
                </select>
            </div>
        </div> 

        <button type="submit" class="submit-course-btn">Criar Curso</button>
    </form>
</main>

@endsection
