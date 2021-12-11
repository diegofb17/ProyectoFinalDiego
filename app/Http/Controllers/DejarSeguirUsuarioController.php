<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class DejarSeguirUsuarioController extends Controller
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

    public function dejarSeguirUsuario($id)
    {
        $idUser = auth()->user()->id;

        $this->contactRepository->unfollowUser($idUser, $id);

        return redirect()->route('perfiles', $id);
    }
}
