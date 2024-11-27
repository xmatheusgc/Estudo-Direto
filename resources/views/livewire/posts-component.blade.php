<section class="d-flex justify-content-center flex-column flex-sm-row gap-1 w-100">
    <div class="d-flex flex-column options-section border w-100 d-none d-sm-block">
        @if(Auth::check())  
            <div class="d-flex justify-content-center border-bottom p-3 w-100">
                <button type="button" class="btn btn-primary w-100" wire:click="showNewPostModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Novo Post
                </button>
            </div>
        @else
            <div class="p-3 mb-3">
                <p class="alert alert-warning" role="alert">
                    Para começar a compartilhar e interagir com os posts, faça 
                    <a href="{{ route('auth.login') }}" class="alert-link">login</a>!
                </p>
            </div>    
        @endif
    </div>

    <div class="posts-section border h-100">
        @if (session()->has('message'))
            <div class="alert alert-success m-3">
                {{ session('message') }}
            </div>
        @endif

        @if($posts->isEmpty()) 
            <div class="alert alert-info text-center m-3">
                Parece que ainda não há nenhum post! Seja o primeiro a compartilhar algo com a gente.
            </div>
        @else
        @foreach($posts as $post)
            <div class="post-card d-flex flex-column flex-sm-row align-items-start border mb-3 m-3 rounded position-relative">
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
                        <p>{{ $post->text }}</p>
                    </span>
        
                    @if($post->post_image) 
                        <span class="post-image-container w-100 text-center">
                            <img class="post-image img-fluid" src="{{ asset('storage/' . $post->post_image) }}" alt="post image">
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
        
                <div class="dropdown position-absolute" style="top: 10px; right: 10px;">
                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-dots-horizontal-rounded'></i>
                    </a>
        
                    <ul class="dropdown-menu position-absolute drop-shape" aria-labelledby="dropdownMenuLink">
                        @if(Auth::check() && $post->author_id === Auth::id())  
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" wire:click="editPost({{ $post->id }})"><i class='bx bx-edit'></i> Editar</a></li>
                            <li><a class="dropdown-item text-danger" wire:click="deletePost({{ $post->id }})"><i class='bx bx-trash'></i> Excluir</a></li>
                        @endif
                        <li><a class="dropdown-item" href="#"><i class='bx bx-flag'></i> Denunciar</a></li>
                    </ul>
                </div>
            </div>
        @endforeach
        @endif
    </div>    

    <div class="modal fade" id="exampleModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $postIdBeingEdited ? 'Editar Postagem' : 'Nova Postagem' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetForm" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $postIdBeingEdited ? 'updatePost' : 'addPost' }}">
                        <div class="mb-3">
                            <label for="post-text" class="form-label">Mensagem:</label>
                            <textarea wire:model.defer="text" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="post-image" class="form-label">Imagem:</label>
                            <input type="file" wire:model.defer="image" class="form-control">
                            <div wire:loading wire:target="image" class="text-muted">Carregando imagem...</div>
                        </div>

                        @if($postIdBeingEdited && $image)
                            <div class="mb-3">
                                <img src="{{ is_string($image) ? asset('storage/' . $image) : $image->temporaryUrl() }}" alt="Imagem do post" class="img-fluid">
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                            {{ $postIdBeingEdited ? 'Atualizar' : 'Postar' }}
                        </button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
