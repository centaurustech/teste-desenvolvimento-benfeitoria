<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\PostRequest;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{

    
    function index() {

        $posts = Post::with('tags')->get();

        return view('post.index')->with('posts', $posts);
    }

    function create() {
    	return view('post.create');
    }

    function edit() {
        return view('post.edit');
    }

    function show() {

        $post = Post::find(Input::get('id'));
        
        return view('post.show')->with('post', $post);
    }

    /**
     * Create a post with tags and relation.
     *
     * @param  Request  $req
     * @return redirect
     */
    function save(PostRequest $req) {

    	$post 				= new Post();
    	$post->title  		= $req->title;
    	$post->description  = $req->description;
    	$post->image_path   = $req->cover;
    	
        if($post->save()) {

            $post->tags()->sync($req->tags, false);                
			
            $req->session()->flash('alert-success', 'Post criado com sucesso!!');
    		return redirect('/');    	
    	}

    }
}
