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

        return view('post.show')->with('post', $post);
    }

    /**
     * Create a post with tags and authors relation.
     *
     * @param  Request  $req
     * @return redirect
     */
    function save(PostRequest $req) {


        $file = Input::file('cover'); // retorna o objeto em questão
        $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        // var_dump($file);
        // var_dump(\Input::hasFile('photo'));

        $destinationPath = public_path().DIRECTORY_SEPARATOR.'cover';
        $fileName = pathinfo($file->getClientOriginalName())['basename'];

        //var_dump($file->move($destinationPath.DIRECTORY_SEPARATOR.'tmp'));
        $file->move($destinationPath, $fileName);

    	$post 				= new Post();
    	$post->title  		= $req->title;
    	$post->description  = $req->description;
    	$post->image_path   = '/cover/'.$fileName;

    	
        if($post->save()) {

            $post->tags()->sync($req->tags, false);                
            $post->authors()->sync($req->authors, false);                
            $req->session()->flash('alert-success', 'Post criado com sucesso!!');
    		
            return redirect('/');    	
    	}

    }
}
