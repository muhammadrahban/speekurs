<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'comment', 'parent_comment_id', 'mark',
    ];

    function users(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
