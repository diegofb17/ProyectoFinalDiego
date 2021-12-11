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
    private $contactRepository;

    public function __construct(
        PostRepository $postRepository,
        ContactRepository $contactRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->contactRepository = $contactRepository;
        $this->middleware('auth');
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
}
