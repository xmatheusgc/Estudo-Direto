<section class="d-flex justify-content-center flex-column flex-sm-row gap-1 w-100">
    <div wire:click="closeForm" class="overlay z-2" 
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); display: {{ $isFormVisible ? 'block' : 'none' }};">
    </div>

    <form wire:submit.prevent="addPost" class="add-post-form p-3 z-3" 
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: {{ $isFormVisible ? 'block' : 'none' }};">

        <input type="text" wire:model="text" placeholder="Escreva seu post..." required class="form-control mb-2">
        <input type="file" wire:model="image" class="form-control mb-2">
        <button type="submit" class="new-post-button">Postar</button>
    </form>

    <div class="d-flex flex-column options-section border w-100 d-none d-sm-block">
        @if(Auth::check())  
            <div class="d-flex justify-content-center border-bottom p-3 w-100">
                <button class="new-post-button border" wire:click="toggleForm">Postar</i></button>
            </div>
        @else
            <div class="p-3 mb-3">
                <p class="alert alert-warning" role="alert">
                    Para começar a compartilhar e interagir com os posts, faça <a href="/signin" class="alert-link">login</a>!
                </p>
            </div>    
        @endif
    </div>

    <div class="posts-section border h-100">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    
        @foreach($posts as $post)
            <div class="post-card d-flex flex-column flex-sm-row align-items-start border mb-3 m-3 rounded">
                <div class="post-content d-flex flex-wrap flex-column flex-sm-row w-100">
                    <span class="author-container d-flex gap-1 w-100 p-3">
                        @if($post->user && $post->user->avatar)
                            <img src="{{ $post->user->avatar }}" alt="User avatar" class="img-fluid rounded-circle" style="width: 3.5rem;">
                        @else
                            <i class='bx bx-user-circle'></i>
                        @endif
                        <div>
                            <strong>{{ $post->user ? $post->user->name : 'Usuário desconhecido' }} ·</strong>
                            <small>{{ $post->created_at->format('d \d\e M \d\e Y') }}</small>
                        </div>
                    </span>
                    <span class="post-text w-100 border-bottom px-4">
                        <p class="">{{ $post->text }}</p>
                    </span>

                    @if($post->post_image) 
                        <span class="post-image-container w-100 text-center p-2">
                            <img class="post-image img-fluid rounded" src="{{ asset('storage/' . $post->post_image) }}" alt="post image">
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
        @endforeach

        <div class="options-section border-top w-100 d-block d-sm-none">
            @if(Auth::check())
                <div class="d-flex justify-content-center p-1 w-100">
                    <button class="new-post-button border d-flex align-items-center" wire:click="toggleForm"><i class='bx bx-plus' ></i></button>
                </div>
            @endif
        </div>
    </div>    
</section>
