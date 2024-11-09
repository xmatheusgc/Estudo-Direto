@extends('app')

@section('title', 'Criar Curso')

@section('content')

<main>
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
            <label for="course_image"><i class='bx bx-image-add'></i><span id="file-name">Adicionar imagem</span></label>
            <input type="file" name="course_image" id="course_image" onchange="displayFileName()">
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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</main>

<script>
    function displayFileName() {
        const fileInput = document.getElementById('course_image');
        const fileNameDisplay = document.getElementById('file-name');
        
        if (fileInput.files.length > 0) {
            const fileName = fileInput.files[0].name;
            fileNameDisplay.textContent = fileName.length > 20 ? fileName.substring(0, 20) + '...' : fileName;
        } else {
            fileNameDisplay.textContent = ''; 
        }
    }
</script>

@endsection
 