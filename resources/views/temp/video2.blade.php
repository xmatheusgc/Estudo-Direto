@extends('app')

@section('title', 'Inicio')

@section('content')

<main class="mid">
    <div class="course-title"><h1>Curso de <span id="php">php</span></h1></div>
    <div class="videos-wrapper">
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/lMdioANjYwc" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>

        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/NhUFUfzZowM" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>

        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/AqDj3OSV0mM" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>
    </div>
</main>

@endsection

