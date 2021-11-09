<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaPrincipalController extends Controller
{
    public function index()
    {
        return view('paginaPrincipal');
    }

    public function stickerAbierto()
    {
        return view('stickerAbierto');
    }

    public function opiniones()
    {
        return view('opiniones');
    }

    public function perfiles()
    {
        return view('perfiles');
    }

    public function elementosGuardados()
    {
        return view('elementosGuardados');
    }
}
