<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    public function getPosts()
    {
        return $this->hasMany(Post::class);
    }

    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
