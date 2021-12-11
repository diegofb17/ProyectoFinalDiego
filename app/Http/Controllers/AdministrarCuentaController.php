<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrarCuentaController extends Controller
{
    public function administrarCuenta()
    {
        return view('administrarCuenta');
    }
}
