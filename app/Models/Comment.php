<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','post_id','content'];

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getPost()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
}
