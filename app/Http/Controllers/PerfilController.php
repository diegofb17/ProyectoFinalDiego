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

            //Lo sigo o no lo sigo
            $data['seguido'] = false;


            //No es el usuario logueado
            $data['userLogueado'] = false;
        }else{
            $data['userLogueado'] = true;
        }

        return view('perfiles',['data'=>$data]);
    }
}
