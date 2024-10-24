<div>
    <h2>Comentários</h2>
    @foreach ($comments as $comment)
    <div class="comment">
        <span class="comment-author">{{ $comment->user->name ?? 'Anônimo' }}</span>
        <div class="rating-stars" style="display: inline-block; margin-left: 5px;">
            @for ($i = 1; $i <= 5; $i++)
                <i class="{{ $i <= $comment->rating ? 'bx bxs-star filled' : 'bx bxs-star empty' }}"></i>
            @endfor
        </div>
        <br>
        <span class="comment-content">{{ $comment->comment }}</span> <br>
        <span class="comment-date">{{ $comment->created_at->format('d/m/Y') }}</span>
    
        @if ($comment->id === $commentIdBeingEdited)
            <div>
                <p class="comment-edit-title">Editar Comentário</p>
                <form wire:submit.prevent="updateComment">
                    <span  class="comment-input-container">
                        <textarea class="comment-text" wire:model="comment" required></textarea>
                        <select class="comment-rating" wire:model="rating" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </span>
                    <button type="submit" class="comment-button ">Atualizar</button>
                </form>
            </div>
        @endif
    
        @if ($comment->user_id === auth()->id())
            <div class="comment-actions">
                <button wire:click="editComment({{ $comment->id }})" class="action-button" style="font-size: 1.1rem"><i class='bx bx-edit-alt'></i></button>
                <button wire:click="deleteComment({{ $comment->id }})" class="action-button" style="font-size: 1rem"><i class='bx bx-trash-alt'></i></button>
            </div>
        @endif
    </div>
    
    @endforeach

    <form wire:submit.prevent="addComment" class="comment-form">
        <span class="comment-input-container">
            <textarea class="comment-text" wire:model="comment" placeholder="Seu comentário" required></textarea>
            <select class="comment-rating" wire:model="rating" required>
                <option value="">Avalie</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select> 
        </span>
        <button type="submit" class="comment-button ">Enviar</button>
    </form>
</div>
