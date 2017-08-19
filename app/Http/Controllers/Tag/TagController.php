<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    

    /**
     * List of tags as json
     *
     * @param  Integer  $id
     * @return List of Tags
     */
    public function indexAPI($id = null)
    {
        if($id == null)
        {
            return Tag::orderBy('id', 'desc')->get();
        }
        else
        {
            return $this->show($id);
        }
    }

    public function show($id)
    {
        return Tag::find($id);
    }

    public function add(Request $request)
    {   
        if($request->has('tag_name')) {

            $tag = new Tag();
            $tag->tag_name = $request->tag_name;

            if($tag->save())
            {
                return json_encode(['success' => ['message' => 'Tag <strong>'.$tag->tag_name.'</strong> cadastrada com sucesso!', 'tag_id' => $tag->id ]]);
            }
            else
            {
                return json_encode(['error' => 'Algo inesperado aconeceu!']);
            }  
        }  
    }
}
