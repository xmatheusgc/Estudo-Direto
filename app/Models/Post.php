<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'post_image', 'author_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
