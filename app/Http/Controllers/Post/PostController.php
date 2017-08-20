<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\PostRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
class PostController extends Controller
{

    
    function index() {

        //Join with post and tags
        $posts = Post::with('tags')->get();

        return view('post.index')->with('posts', $posts);
    }

    function create() {
    	return view('post.create');
    }

    function edit() {
    	return view('post.edit');
    }

    function show($id) {

        $post = Post::find($id);
        
        //separate authors by commas
        $authors = '';
        foreach($post->authors as $author) { 
            $authors .= $author->name.', ';
        }

        //deleting comma ending
        $authors = rtrim($authors, ', ');
        
        return view('post.show')->with('post', $post)->with('authors', $authors);
    }

    /**
     * Create a post with tags and authors relation.
     *
     * @param  Request  $req
     * @return redirect
     */
    function save(PostRequest $req) {

        $post               = new Post();
        $file = Input::file('cover');

        if($file) {

            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'cover';
            $fileName = pathinfo($file->getClientOriginalName())['basename'];

            $file->move($destinationPath, $fileName);

            $post->image_path   = '/cover/'.$fileName;
        }
        
    	$post->title  		= $req->title;
    	$post->description  = $req->description;

    	
        if($post->save()) {

            $post->tags()->sync($req->tags, false);                
            $post->authors()->sync($req->authors, false);                
            
            $req->session()->flash('alert-success', 'Post criado com sucesso!!');
    		
            return redirect('/');    	
    	}

    }
}
