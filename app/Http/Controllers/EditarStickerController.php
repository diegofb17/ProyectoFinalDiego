<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use App\Repositories\CategorieRepository;
use App\Repositories\PostRepository;

class EditarStickerController extends Controller
{
    private $postRepository;
    private $categorieRepository;

    public function __construct
    (
        PostRepository $postRepository,
        CategorieRepository $categorieRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->categorieRepository = $categorieRepository;
    }

    public function editarSticker($id){

        $data['post'] = $this->postRepository->getById($id);
        $data['categorias'] = $this->categorieRepository->listAllForSelect();

        $pictures = PostImage::where('id_post', $id)->get();

        foreach ($pictures as $picture) {
            $data['images'][] = $picture->image;
        }

        return view('editarSticker',['data'=> $data]);
    }
}
