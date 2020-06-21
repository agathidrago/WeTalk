<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded= [];
    
    public function user()
    {
        return $this->belongsTO(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function likedPost(){

        return $this->belongsToMany(User::class);
    }
}
