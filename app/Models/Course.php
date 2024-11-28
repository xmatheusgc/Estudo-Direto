<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'title', 'description', 'price', 'course_image', 'video', 'duration', 'level', 'resources', 'category', 'type', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
