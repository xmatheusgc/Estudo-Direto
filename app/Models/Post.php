<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = ['text', 'post_image', 'author_id'];

    // Definição da relação "pertence a" com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
