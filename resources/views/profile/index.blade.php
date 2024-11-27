<!-- resources/views/profile.blade.php -->
@extends('app')

@section('title', 'Perfil')

@section('content')
@section('content')

<div class="container">
    <div class="row">
        <!-- Informações Básicas do Usuário -->
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="{{ $user->profile_picture }}" class="card-img-top" alt="Foto de Perfil">
                <div class="card-body text-center">
                    <h4>{{ $user->name }}</h4>
                    <p>{{ '@' . $user->username }}</p>
                    <p>{{ $user->bio }}</p>
                </div>
            </div>
        </div>

        <!-- Conteúdo Principal do Perfil -->
        <div class="col-md-9">
            <!-- Nível e Progresso de Estudos -->
            <div class="card mb-4">
                <div class="card-header">Progresso de Estudos</div>
                <div class="card-body">
                    <p>Nível: <strong>{{ $user->level }}</strong></p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $user->progress }}%;" aria-valuenow="{{ $user->progress }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $user->progress }}%
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conquistas e Badges -->
            <div class="card mb-4">
                <div class="card-header">Conquistas</div>
                <div class="card-body">
                    @foreach ($user->achievements as $achievement)
                        <span class="badge badge-success">{{ $achievement->name }}</span>
                    @endforeach
                </div>
            </div>

            <!-- Histórico de Atividades e Progresso em Cursos -->
            <div class="card mb-4">
                <div class="card-header">Cursos Ativos</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($user->activeCourses as $course)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $course->name }}</strong><br>
                                    <small>Progresso: {{ $course->progress }}%</small>
                                </div>
                                <div class="progress" style="width: 50%;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $course->progress }}%;" aria-valuenow="{{ $course->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Estatísticas de Desempenho -->
            <div class="card mb-4">
                <div class="card-header">Estatísticas</div>
                <div class="card-body">
                    <p>Tempo Total de Estudo: {{ $user->total_study_time }} horas</p>
                    <p>Número de Cursos Completos: {{ $user->completed_courses_count }}</p>
                    <p>Notas Média: {{ $user->average_score }}</p>
                </div>
            </div>

            <!-- Recomendações de Cursos -->
            <div class="card mb-4">
                <div class="card-header">Recomendações para Você</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($user->recommendedCourses as $course)
                            <li class="list-group-item">
                                <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Interação com a Comunidade -->
            <div class="card mb-4">
                <div class="card-header">Amigos e Ranking</div>
                <div class="card-body">
                    <p>Posição no Ranking: #{{ $user->ranking_position }}</p>
                    <p>Amigos: {{ $user->friends->count() }}</p>
                    <ul class="list-group">
                        @foreach ($user->friends as $friend)
                            <li class="list-group-item">
                                <a href="{{ route('profile.show', $friend->id) }}">{{ $friend->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
