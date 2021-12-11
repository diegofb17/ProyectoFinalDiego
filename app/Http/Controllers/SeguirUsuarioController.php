<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class SeguirUsuarioController extends Controller
{
    private $contactRepository;

    public function __construct
    (
        ContactRepository $contactRepository
    )
    {
        $this->contactRepository = $contactRepository;
        $this->middleware('auth');
    }

    public function seguirUsuario($id){
        $idUser = auth()->user()->id;

        $this->contactRepository->followUser($idUser, $id);

        return redirect()->route('perfiles', $id);
    }
}
