@extends('app')

@section('title', 'Noticias')

@section('content')

<main class="main-blog">
        <div class="main-container">
            <article class="post">
                <h2>Título da Postagem</h2>
                <p class="meta">Publicado em 28 de Maio de 2024 por <a href="#">Autor</a></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vehicula, elit vel condimentum porta, purus ex euismod diam, eu egestas nunc risus in libero.</p>
                <a href="#" class="read-more">Leia mais...</a>
            </article>
            <article class="post">
                <h2>Título da Postagem</h2>
                <p class="meta">Publicado em 27 de Maio de 2024 por <a href="#">Autor</a></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vehicula, elit vel condimentum porta, purus ex euismod diam, eu egestas nunc risus in libero.</p>
                <a href="#" class="read-more">Leia mais...</a>
            </article>
        </div>
        <div class="aside-container">
            <div class="widget">
                <h3>Sobre mim</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vehicula, elit vel condimentum porta.</p>
            </div>
            <div class="widget">
                <h3>Arquivos</h3>
                <ul>
                    <li><a href="#">Maio 2024</a></li>
                    <li><a href="#">Abril 2024</a></li>
                    <li><a href="#">Março 2024</a></li>
                </ul>
            </div>
            <div class="widget">
                <h3>Links</h3>
                <ul>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                </ul>
            </div>
        </div>
</main>

@endsection