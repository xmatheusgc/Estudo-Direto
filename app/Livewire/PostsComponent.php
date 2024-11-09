<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsComponent extends Component
{
    use WithFileUploads;

    public $text;
    public $image;
    public $isFormVisible = false;  

    protected $rules = [
        'text' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048', 
    ];

    protected $listeners = ['postAdded' => '$refresh'];

    public function render()
    {
        $posts = Post::latest()->with('user')->get();
        return view('livewire.posts-component', compact('posts'));
    }

    public function addPost()
    {

        $userId = Auth::id();
        if (is_null($userId)) {
            session()->flash('error', 'Usuário não autenticado');
            return;
        }

        $this->validate();

        $imagePath = $this->image ? $this->image->store('post_images', 'public') : null;

        // Criação do post
        Post::create([
            'text' => $this->text,
            'post_image' => $imagePath,
            'author_id' => $userId, 
        ]);

        $this->dispatch('postAdded'); 

        session()->flash('message', 'Post criado com sucesso!');

        $this->isFormVisible = false;

        $this->reset(['text', 'image']);
    }

    public function toggleForm()
    {
        $this->isFormVisible = !$this->isFormVisible;
    }

    public function closeForm()
    {
        $this->isFormVisible = false;
    }
}
