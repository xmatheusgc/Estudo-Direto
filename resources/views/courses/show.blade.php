@extends('app')

@section('title', $course->title)

@section('content')

<main class="d-flex justify-content-center align-items-center flex-column">
    <div class="container">
        <h1 class="card-title my-5">{{ $course->title }}</h1>
        <div class="col">
            <div class="card">
                @php
                    function convertToEmbed($videoUrl) {
                        if (preg_match('/youtu\.be\/([A-Za-z0-9_-]{11})/', $videoUrl, $matches)) {
                            return 'https://www.youtube.com/embed/' . $matches[1];
                        }

                        if (preg_match('/youtube\.com\/embed\/([A-Za-z0-9_-]{11})/', $videoUrl, $matches)) {
                            return $videoUrl;
                        }

                        return null;
                    }

                    $videoEmbedUrl = convertToEmbed($course->video);
                @endphp

                <iframe src="{{ $videoEmbedUrl }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="height: 500px;"></iframe>
                <div class="card-body course-detail-card">
                    <p class="card-text">{{ $course->description }}</p>
                </div>
            </div>
        </div>
    </div> 

    <a href="{{ route('courses.index') }}" class="back-button btn btn-primary my-3">Voltar</a>
</main>


  
@endsection
