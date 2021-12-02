<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Post extends Model
{
    protected $fillable = [
        'title', 'sub_title', 'description', 'image', 'featured', 'date', 'category_id'
    ];

    public function Category(){
        return $this->belongsTo( Category::class, 'category_id', 'id' );
    }

    function like(){
        return $this->hasMany(Like::class, 'post_id', 'id');
    }

    function comment(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    function isliked(){
        $user_id = Auth::user()->id;
        return $this->hasMany(Like::class, 'post_id', 'id')->where('user_id' , $user_id);
    }

    function bookmark(){
        return $this->BelongsTo(Bookmark::class, 'post_id', 'id');
    }

    // function post(){
    //     $user_id = Auth::user()->id;
    //     return $this->belongsTo(Post::class, 'post_id', 'id');
    // }
}
