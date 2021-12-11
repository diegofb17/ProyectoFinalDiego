<?php

namespace App\Http\Controllers;

use App\Repositories\CategorieRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class AnadirStickerController extends Controller
{
    private $categorieRepository;

    public function __construct(
        CategorieRepository $categorieRepository
    )
    {
        $this->categorieRepository = $categorieRepository;
        $this->middleware('auth');

    }

    public function anadirSticker()
    {
        $data['categorias'] = $this->categorieRepository->listAllForSelect();

        return view('anadirSticker',['data'=>$data]);
    }
}
