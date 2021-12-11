<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditarPerfilController extends Controller
{
    public function editarPerfil()
    {
        $data = auth()->user();

        return view('editarPerfil',['data'=>$data]);
    }
}
