<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Bookmark extends Model
{
    protected $fillable = [
        'post_id', 'user_id'
    ];

    function post(){
        $user_id = Auth::user()->id;
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
