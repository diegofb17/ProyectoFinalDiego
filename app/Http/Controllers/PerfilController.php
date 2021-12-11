<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    private $postRepository;
    private $contactRepository;
    private $userRepository;

    public function __construct(
        PostRepository $postRepository,
        ContactRepository $contactRepository,
        UserRepository $userRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->contactRepository = $contactRepository;
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }

    public function perfiles($id)
    {
        $data['userLogueado']=false;
        $data['followers'] = 0;
        $data['followed'] = 0;

        $data['userInfo'] = auth()->user();
        $idUser = $data['userInfo']->id;

        $data['followers'] = $this->contactRepository->listFollowers($id)->count();
        $data['followed'] = $this->contactRepository->listFollowed($id)->count();

        $data['postsUser'] = $this->postRepository->listByUserId($id);

        //Aqui manda los datos del usuario en el que navega
        if($id != $idUser){
            //Datos de ese usuario
            $data['userInfo'] = $this->userRepository->getById($id);

            $followedOrNot = $this->contactRepository->getIfUserIsFollowed($idUser, $id);
            $data['seguido'] = false;

            //Lo sigo o no lo sigo
            if($followedOrNot->count() > 0){
                $data['seguido'] = true;
            }

            //No es el usuario logueado
            $data['userLogueado'] = false;
        }else{
            $data['userLogueado'] = true;
        }

        return view('perfiles',['data'=>$data]);
    }
}
