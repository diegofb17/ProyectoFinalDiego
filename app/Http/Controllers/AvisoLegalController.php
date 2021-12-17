<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvisoLegalController extends Controller
{
    public function cookies(){
        return view('cookies');
    }

    public function privacidad(){
        return view('privacidad');
    }

    public function terminos(){
        return view('terminos');
    }
}
