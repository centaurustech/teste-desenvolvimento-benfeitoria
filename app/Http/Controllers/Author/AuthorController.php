<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
    * List of auhtors as json or single author
    *
    * @param  Integer  $id
    * @return List of auhtors
    */
    public function indexAPI($id = null)
    {
        if($id == null)
        {
            return Author::orderBy('id', 'desc')->get();
        }
        else
        {
            return $this->show($id);
        }
    }

    public function show($id) {
        return Author::find($id);
    }

    public function add(Request $request)
    {   
        if($request->has('author_name')) {

            $author = new Author();
            $author->name = $request->author_name;

            if($author->save())
            {
                return json_encode(['success' => ['message' => 'Autor <strong>'.$author->name.'</strong> cadastrada com sucesso!', 'auhtor_id' => $author->id ]]);
            }
            else
            {
                return json_encode(['error' => 'Algo inesperado aconeceu!']);
            }  
        }  
    }
}
