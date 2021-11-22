<?php

namespace App\Http\Controllers;

use App\Repositories\CategorieRepository;
use App\Repositories\OpinionRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PaginaPrincipalController extends Controller
{
    private $postRepository;
    private $categorieRepository;
    private $opinionRepository;
    private $userRepository;

    public function __construct(
        PostRepository $postRepository,
        CategorieRepository $categorieRepository,
        OpinionRepository $opinionRepository,
        UserRepository $userRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->categorieRepository = $categorieRepository;
        $this->opinionRepository = $opinionRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $data['posts'] = $this->postRepository->listAll();
        return view('paginaPrincipal', ['data' => $data]);
    }

    public function stickerAbierto($id)
    {
        $data['post'] = $this->postRepository->getById($id);
        $data['opinion'] = $this->opinionRepository->listOpinionByPostId($id);
        $contadorOpiniones = 0;
        $estrellasTotal = 0;
        foreach ($data['opinion'] as $opinion){
            $contadorOpiniones++;
            $estrellasTotal+=$opinion->punctuation;
        }

        $data['mediaPost'] = $estrellasTotal / $contadorOpiniones;
        $data['numOpiniones'] = $contadorOpiniones;

        return view('stickerAbierto',[
            'data' => $data,
            'id' => $id
        ]);
    }

    public function opiniones($id)
    {
        $data['opinion'] = $this->opinionRepository->listOpinionByPostId($id);
        $contadorOpiniones = 0;
        $estrellasTotal = 0;
        foreach ($data['opinion'] as $opinion){
            $contadorOpiniones++;
            $estrellasTotal+=$opinion->punctuation;
        }
        dd($data['opinion']);
        $data['mediaPost'] = $estrellasTotal / $contadorOpiniones;
        $data['numOpiniones'] = $contadorOpiniones;

        return view('opiniones',['data' => $data]);
    }

    public function perfiles()
    {
        $data['postsUser'] = $this->postRepository->listByUserId(1);
        return view('perfiles',['data'=>$data]);
    }

    public function elementosGuardados()
    {
        return view('elementosGuardados');
    }

    public function editarPerfil()
    {
        return view('editarPerfil');
    }

    public function anadirSticker()
    {
        return view('anadirSticker');
    }

    public function storeSticker(Request $request)
    {

        dd($request->all());
        return view('perfiles');
    }

    public function configuracion()
    {
        return view('configuracion');
    }

    public function busqueda()
    {
        $data['categories'] = $this->categorieRepository->listAll();
        return view('busqueda',[
            'data' => $data
        ]);
    }

    public function administrarCuenta()
    {
        return view('administrarCuenta');
    }

    public function storeOpinion(Request $request)
    {
        dd($request->all());
        return view('stickerAbierto');
    }
}
