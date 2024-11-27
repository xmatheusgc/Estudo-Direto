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
    public $postIdBeingEdited = null;

    protected $rules = [
        'text' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        $posts = Post::latest()->with('user')->get();
        return view('livewire.posts-component', compact('posts'));
    }

    public function showNewPostModal()
    {
        $this->resetForm(); 
    }

    public function addPost()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('post_images', 'public') : null;

        Post::create([
            'text' => $this->text,
            'post_image' => $imagePath,
            'author_id' => Auth::id(),
        ]);

        session()->flash('message', 'Post criado com sucesso!');
        $this->resetForm(); 
    }

    public function editPost($id)
    {
        $this->resetForm(); 

        $post = Post::find($id);

        if ($post && $post->author_id === Auth::id()) {
            $this->postIdBeingEdited = $id;
            $this->text = $post->text;
            $this->image = $post->post_image;
        } else {
            session()->flash('error', 'Ação não permitida.');
        }
    }

    public function updatePost()
    {
        $this->validate();

        $post = Post::find($this->postIdBeingEdited);

        if ($post && $post->author_id === Auth::id()) {
            $imagePath = $this->image instanceof \Livewire\TemporaryUploadedFile
                ? $this->image->store('post_images', 'public')
                : $post->post_image;

            $post->update([
                'text' => $this->text,
                'post_image' => $imagePath,
            ]);

            session()->flash('message', 'Post atualizado com sucesso!');
            $this->resetForm(); 
        } else {
            session()->flash('error', 'Ação não permitida.');
        }
    }

    public function deletePost($id)
    {
        $post = Post::find($id);

        if ($post && $post->author_id === Auth::id()) {
            $post->delete();
            session()->flash('message', 'Post deletado com sucesso!');
        } else {
            session()->flash('error', 'Ação não permitida.');
        }
    }

    public function resetForm()
    {
        $this->reset(['text', 'image', 'postIdBeingEdited']);
        $this->resetErrorBag(); 
    }
}
