<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tag extends Model
{
    protected $touches = ['posts'];

    protected $fillable = ['name'];

    public function posts(){
        return $this->belongsToMany(Post::class, 'posts_tags')
                    ->withPivot('approved')
                    ->withTimestamps();
    }

    public function activePosts(){
        return $this->belongsToMany(Post::class, 'posts_tags')
                    ->wherePivot('approved', 1);
    }
}
