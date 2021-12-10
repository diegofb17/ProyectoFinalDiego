<?php

namespace App\Http\Controllers;

use App\Repositories\CategorieRepository;
use App\Repositories\ContactRepository;
use App\Repositories\OpinionRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PaginaPrincipalController extends Controller
{
    private $postRepository;
    private $categorieRepository;
    private $opinionRepository;
    private $contactRepository;

    public function __construct(
        PostRepository $postRepository,
        CategorieRepository $categorieRepository,
        OpinionRepository $opinionRepository,
        ContactRepository $contactRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->categorieRepository = $categorieRepository;
        $this->opinionRepository = $opinionRepository;
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $usuariosSeguidos = [];
        $idUser = auth()->user()->id;
        $usersFollowed=$this->contactRepository->listFollowed($idUser);

        foreach ($usersFollowed as $userFollowed){
            $usuariosSeguidos[]=$userFollowed->id_followed_user;
        }

        $data['posts'] = $this->postRepository->listAllAcceptedByFollow($usuariosSeguidos);

        return view('paginaPrincipal', ['data' => $data]);
    }

    public function editarPerfil()
    {
        $data = auth()->user();

        return view('editarPerfil',['data'=>$data]);
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

}
