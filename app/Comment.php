<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'comment', 'parent_comment_id', 'mark',
    ];

    function users(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    function likeComment(){
        return $this->hasMany(Like::class, 'comment_id', 'id');
    }

    function isliked(){
        $user_id = Auth::user()->id;
        return $this->hasOne(Like::class, 'comment_id', 'id')->where('user_id' , $user_id);
    }
}
