@extends('app')

@section('title', 'Cursos')

@section('content')

<main id="course-screen">
    <section class="search-filter">

        <input type="text" placeholder="Buscar cursos...">
        <select>
            <option value="">Categoria</option>
            <option value="tecnologia">Tecnologia</option>
            <option value="negocios">Negócios</option>
        </select>
        <select>
            <option value="">Nível</option>
            <option value="iniciante">Iniciante</option>
            <option value="intermediario">Intermediário</option>
            <option value="avancado">Avançado</option>
        </select>
    </section>

    <section class="course-list">

        <article class="course-card">
            <img src="https://cdn-images-1.medium.com/max/990/1*hcws3Wa6u9IqaEZ_4X04uw.jpeg" alt="Curso 1">
            <div class="course-details">
                <h2>Curso Java Script</h2>
                <p>Descrição do Curso Aqui</p>
                <div class="course-info">
                    <span>Duração: 10 horas</span>
                    <span>Nível: Intermediário</span>
                </div>
                <a href="#" class="btn">Ver Curso</a>
            </div>
        </article>

        <article class="course-card">
            <img src="https://www.site.pt/wp-content/uploads/2022/01/o-que-e-php-845x480.jpg" alt="Curso 2">
            <div class="course-details">
                <h2>Curso PHP</h2>
                <p>Descrição do Curso Aqui</p>
                <div class="course-info">
                    <span>Duração: 15 horas</span>
                    <span>Nível: Avançado</span>
                </div>
                <a href="#" class="btn">Ver Curso</a>
            </div>
        </article>
    </section>
</main>

@endsection
