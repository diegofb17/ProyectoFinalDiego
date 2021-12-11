<?php

namespace App\Http\Controllers;

use App\Repositories\OpinionRepository;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    private $opinionRepository;

    public function __construct
    (
        OpinionRepository $opinionRepository
    )
    {
        $this->opinionRepository = $opinionRepository;
        $this->middleware('auth');
    }

    public function opiniones($id)
    {
        $data['mediaPost'] = 0;
        $data['opinion'] = $this->opinionRepository->listOpinionByPostId($id);

        $contadorOpiniones = 0;
        $estrellasTotal = 0;
        foreach ($data['opinion'] as $opinion){
            $contadorOpiniones++;
            $estrellasTotal+=$opinion->punctuation;
        }

        if($contadorOpiniones != 0){
            $data['mediaPost'] = $estrellasTotal / $contadorOpiniones;
        }

        $data['numOpiniones'] = $contadorOpiniones;

        return view('opiniones',['data' => $data]);
    }
}
