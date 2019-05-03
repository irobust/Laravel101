<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Post extends Model
{
    protected $guarded = [
        'created_at', 'updated_at'
    ];

    // protected $fillable = [
    //     'title', 'body'
    // ];
    
    // protected $hidden = [
    //     'created_at', 'updated_at'
    // ];

    protected $casts = [
        'created_at' => 'date:d-m-Y'
    ];

    public function scopePopular($query, $id){
        return $query->where('id', $id);
    }

    public function getLongTitleAttribute(){
        return "{$this->title} add some text";
    }

    public function setLongTitleAttribute($value){
        $this->attributes['title'] = $value;
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'posts_tags')
                    ->withPivot('approved')
                    ->withTimestamps();
    }

    public function activeTags(){
        return $this->belongsToMany(Tag::class, 'posts_tags')
                    ->wherePivot('approved', 1);
    }
}
