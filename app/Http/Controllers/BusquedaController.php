<?php

namespace App\Http\Controllers;

use App\Repositories\CategorieRepository;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    private $categorieRepository;

    public function __construct
    (
        CategorieRepository $categorieRepository
    )
    {
        $this->categorieRepository = $categorieRepository;
    }

    public function busqueda()
    {
        $data['categories'] = $this->categorieRepository->listAllForSelect();
        return view('busqueda',[
            'data' => $data
        ]);
    }
}
