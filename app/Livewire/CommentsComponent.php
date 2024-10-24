<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsComponent extends Component
{
    public $comments = [];
    public $comment;
    public $rating;
    public $commentIdBeingEdited = null;
    public $user_name;

    public function mount()
    {
        $this->comments = Comment::all();

        // Verifique se o usuário está autenticado e defina o nome
        if (Auth::check()) {
            $this->user_name = Auth::user()->name; // Ajuste aqui conforme o nome do campo no seu model User
        } else {
            $this->user_name = ''; // Se não estiver autenticado, você pode deixar vazio ou redirecionar
        }
    }

    public function addComment()
    {
        // Verifique se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $this->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        Comment::create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name, // Adiciona o nome do usuário
        ]);        
    
        $this->resetFields();
        $this->comments = Comment::with('user')->get(); // Certifique-se de que os comentários estão sendo carregados corretamente
    }    

    public function editComment($id)
    {
        if ($this->commentIdBeingEdited !== null) {
            $this->reset(['user_name', 'comment', 'rating', 'commentIdBeingEdited']);
        }
    
        $comment = Comment::findOrFail($id);
        $this->commentIdBeingEdited = $id;
        $this->user_name = $comment->user_name;
        $this->comment = $comment->comment;
        $this->rating = $comment->rating;
    }
    

    public function updateComment()
    {
        $this->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $comment = Comment::findOrFail($this->commentIdBeingEdited);
        $comment->update([
            'comment' => $this->comment,
            'rating' => $this->rating,
        ]);

        $this->resetFields();
        $this->comments = Comment::all();
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->user_id === Auth::id()) {
            $comment->delete();
        }

        $this->comments = Comment::all();
    }

    public function resetFields()
    {
        $this->comment = '';
        $this->rating = null;
        $this->commentIdBeingEdited = null;
    }

    public function render()
    {
        $this->comments = Comment::with('user')->get(); 
        return view('livewire.comments-component', [
            'comments' => $this->comments,
        ]);
    }
    
}
