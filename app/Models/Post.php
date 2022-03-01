<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'content'];

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getComments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function findElapsedTime($date)
    {
        $elapsed_time = ceil((time() - strtotime($date))/86400);

        $elapsed_time .= ($elapsed_time == 1 ? ' day' : ' days');

        return $elapsed_time . ' ago';
    }

    // public static function toEssay($post)
    // {
    //     $endline_pos = strpos($post, '.', 10); // find position of a specific character

    //     return substr_replace($post, '\n', $endline_pos, 0); // add character at a specific position
    // }
}
