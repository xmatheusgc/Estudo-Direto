@extends('app')

@section('title', 'Criar Curso')

@section('content')

<main class="container mt-5">
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-5 rounded shadow">
        @csrf

        <h1 class="mb-4 text-center">Criar Novo Curso</h1>

        <div class="mb-3">
            <label for="title" class="form-label">Título do Curso</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Título do Curso" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Link do Vídeo</label>
            <input type="text" name="video" id="video" class="form-control" placeholder="Link do Vídeo">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço do Curso (em R$)</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Preço do Curso" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoria do Curso</label>
            <input type="text" name="category" id="category" class="form-control" placeholder="Categoria do Curso" required>
        </div>

        <div class="mb-3">
            <label for="course_image" class="form-label">Adicionar Imagem</label>
            <input type="file" name="course_image" id="course_image" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="type" class="form-label">Tipo de Curso</label>
                <select name="type" id="type" class="form-select">
                    <option value="Programação">Programação</option>
                    <option value="FGB">FGB</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="level" class="form-label">Nível</label>
                <select name="level" id="level" class="form-select">
                    <option value="Básico">Básico</option>
                    <option value="Intermediário">Intermediário</option>
                    <option value="Avançado">Avançado</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duração (em horas)</label>
            <input type="number" name="duration" id="duration" class="form-control" placeholder="Duração do Curso" required>
        </div>

        <div class="mb-3">
            <label for="resources" class="form-label">Recursos Adicionais (URL)</label>
            <input type="url" name="resources" id="resources" class="form-control" placeholder="Link para Recursos Adicionais">
        </div>

        <button type="submit" class="btn btn-primary w-100">Criar Curso</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</main>

@endsection
