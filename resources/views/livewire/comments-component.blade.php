<section class="comments-section my-5">
    <h1>Comentários</h1>
    <div class="comments-scroll p-1">
        @foreach ($comments as $comment)
        <div class="comment border rounded my-2 p-4 position-relative">
            <span class="comment-author"><strong>{{ $comment->user->name ?? 'Anônimo' }}</strong></span>
    
            <div class="rating-stars" style="display: inline-block; margin-left: 5px;">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="{{ $i <= $comment->rating ? 'bx bxs-star star-filled' : 'bx bxs-star star-empty' }}"></i>
                @endfor
            </div>
            <br>
            <span class="comment-content">{{ $comment->comment }}</span> <br>
            <span class="comment-date">{{ $comment->created_at->format('d/m/Y') }}</span>
        
            @if ($comment->user_id === auth()->id())
                <div class="comment-actions">
                    <div class="dropdown position-absolute comment-actions" style="top: 5px; right: 10px;">
                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </a>
            
                        <ul class="dropdown-menu position-absolute comment-drop-shape">
                            <li><a class="dropdown-item" wire:click="editComment({{ $comment->id }})"><i class='bx bx-edit'></i> Editar</a></li>
                            <li><a class="dropdown-item text-danger" wire:click="deleteComment({{ $comment->id }})"><i class='bx bx-trash'></i> Excluir</a></li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        @endforeach
    </div>

    <div class="comment-form-container">        
        <form wire:submit.prevent="{{ $commentIdBeingEdited ? 'updateComment' : 'addComment' }}" class="comment-form p-3 border rounded shadow-sm">
            <div class="mb-2">
                <label for="comment" class="form-label"><strong>{{ $commentIdBeingEdited ? 'Editar Comentário' : 'Novo Comentário' }}</strong></label>
                <textarea id="comment" class="form-control form-control-sm" wire:model="comment" placeholder="Digite seu comentário" required rows="2"></textarea>
            </div>
        
            <div class="mb-2">
                <label for="rating" class="form-label">Avalie</label>
                <select id="rating" class="form-select form-select-sm" wire:model="rating" required>
                    <option value="">Selecione uma nota</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary btn-sm">
                    {{ $commentIdBeingEdited ? 'Atualizar' : 'Enviar' }}
                </button>
        
                @if ($commentIdBeingEdited)
                    <button type="button" wire:click="cancelEdit" class="btn btn-secondary btn-sm">Cancelar</button>
                @endif
            </div>
        </form>               
    </div>
</section>
