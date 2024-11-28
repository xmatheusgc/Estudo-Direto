@extends('app')

@section('content')

<main class="w-100 p-0">
    <section class="profile-banner d-flex align-items-center justify-content-between px-5 py-3 border-bottom shadow-sm" style="background-image: url('{{ $user->banner ? Storage::url($user->banner) : asset('images/default-banner.jpg') }}'); background-size: cover; background-position: center;">
        <div class="section-container d-flex align-items-center gap-3">
            <div class="profile-avatar border rounded-circle overflow-hidden">
                <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/default-avatar.png') }}" class="img-fluid d-none d-md-block">
            </div>
            <div>
                <h1>{{ $user->name }}</h1>
                @if ($user->username)
                    <p class="username-txt text-break text-wrap">{{ "@" . $user->username }}</p>
                @endif
            
            </div>
        </div>

        <div class="d-flex align-items-end h-100">
            <a href="{{ route('profile.edit', ['user' => $user->id]) }}" class="btn edit-profile rounded-circle border d-flex align-items-center justify-content-center"><i class='bx bx-edit'></i></a>
        </div>
    </section>

    <section class="d-flex justify-content-between user-activity">
        <div class="user-posts w-100 p-3 border border-bottom-0 border-top-0">
            <h1>Blog</h1>
            
            @forelse ($posts as $post)
                <div class="post-card d-flex flex-column flex-sm-row align-items-start border mb-3 m-3 rounded position-relative shadow-sm">
                    <div class="post-content d-flex flex-wrap flex-column flex-sm-row w-100">
                        <span class="author-container d-flex align-items-center gap-1 w-100 p-3">
                            @if($post->user && $post->user->avatar)
                                <img src="{{ Storage::url($post->user->avatar) }}" alt="User avatar" class="img-fluid rounded-circle user-avatar" style="width: 3.5rem;">
                            @else
                                <i class='bx bx-user-circle'></i>
                            @endif
                            <div>
                                <strong>{{ $post->user ? $post->user->name : 'Usuário desconhecido' }} ·</strong>
                                <small>{{ $post->created_at->format('d \d\e M \d\e Y') }}</small>
                            </div>
                        </span>
                        <span class="post-text w-100 border-bottom px-4">
                            <p>{{ $post->text }}</p>
                        </span>
        
                        @if($post->post_image) 
                            <span class="post-image-container w-100 text-center">
                                <img class="post-image img-fluid" src="{{ Storage::url($post->post_image) }}" alt="post image">
                            </span>                    
                        @endif
        
                        <span class="post-tools w-100 border-top">
                            <ul class="d-flex justify-content-center align-items-center w-100 p-1 m-0">
                                <li class="d-flex align-items-center mx-2"><i class='bx bx-heart'></i></li>
                                <li class="d-flex align-items-center mx-2"><i class='bx bx-message-alt'></i></li>
                                <li class="d-flex align-items-center mx-2"><i class='bx bx-share'></i></li>
                            </ul>
                        </span>
                    </div>
                </div>
            @empty
                <p class="alert alert-info" role="alert">{{ $user->name }} ainda não fez nenhuma postagem.</p>
            @endforelse
        </div>
    </section>
</main>

@endsection
