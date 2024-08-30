@extends('app')

@section('title', 'Inicio')

@section('content')

<main class="mid">
    <div class="course-title"><h1>Curso de <span id="jav">JS</span></h1></div>
    <div class="videos-wrapper">
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/Ri76yOpLrNg" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>

        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/KWntxkf25nA" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>

        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/HSssE1PRQcA" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>
    </div>
</main>

@endsection

