<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusquedaController extends Controller
{
    private $userRepository;

    public function __construct
    (
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function busqueda()
    {
        $data['categories'] = [
            'Usuario' => 'Usuarios...'
        ];

        return view('busqueda',[
            'data' => $data
        ]);
    }

    public function mostrarBusqueda(Request $request){
        $data['categories'] = [
            'Usuario' => 'Usuarios...'
        ];

        $validation = $this->validateRequest($request->all());

        if (!$validation['isValid']) {
            return view('/busqueda', [
                'errors' => $validation['errors']->messages(),
                'data' => $data
            ]);
        }

        if($request->seleccion == null){
            $seleccion = 'usuario';
        }else{
            $seleccion = $request->seleccion;
        }

        $data['users'] = $this->userRepository->getByUser($request->aBuscar);

        return view('busqueda',[
            'data' => $data
        ]);
    }

    private function validateRequest($request)
    {
        $response = [
            'isValid' => true,
            'errors' => []
        ];

        $validator = Validator::make($request, [
            'aBuscar' => 'required',
        ]);

        if (!$validator->passes()) {
            $response = [
                'isValid' => false,
                'errors' => $validator->errors(),
            ];
        }

        return $response;
    }
}
