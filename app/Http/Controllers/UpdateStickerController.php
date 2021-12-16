<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UpdateStickerController extends Controller
{
    public function updateSticker(Request $request){

        $idPost = $request->get('idPost');
        dd($request->all());
        Post::where('id_post',$idPost)
        ->update([
            'id_categorie' => $request->get('categoriaSticker'),
            'title' => $request->get('nombreStickerEditar'),
            'text' => $request->get('descripcionEditar')
        ]);

        return redirect()->route("stickerAbierto",$idPost);
    }
}
