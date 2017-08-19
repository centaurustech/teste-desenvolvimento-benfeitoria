<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    function index() {

        $posts = Post::all();
    	
        return view('post.index')->with('posts', $posts);
    }

    function create() {
    	return view('post.create');
    }

    function edit() {
    	return view('post.edit');
    }

    function save(Request $req) {
    	
    	$post 				= new Post();
    	$post->title  		= $req->title;
    	$post->description  = $req->description;
    	$post->image_path   = $req->cover;
    	if($post->save()) {
			$req->session()->flash('alert-success', 'Post criado com sucesso!!');
    		return redirect('/');    	
    	}

    }
}
