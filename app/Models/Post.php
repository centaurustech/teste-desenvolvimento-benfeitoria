<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'post_author', 'post_id', 'author_id');
    }
}
