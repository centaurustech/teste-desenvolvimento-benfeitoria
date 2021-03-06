<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_author', 'author_id', 'post_id');
    }
}
