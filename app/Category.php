<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [ 'name' ];

    public function Post(){
        return $this->belongsTo( Post::class, 'id', 'id' );
    }
}
