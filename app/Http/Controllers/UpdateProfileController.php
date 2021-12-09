<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller
{
    public function updateProfile(Request $request){
        $validation = $this->validateRequest($request->all());
        $data = auth()->user();
        $dataRequest=$request->all();

        if (!$validation['isValid']) {
            return view('/editarPerfil', [
                'errors' => $validation['errors']->messages(),
                'data' => $data
            ]);
        }

        if (isset($dataRequest['imagenPerfil']) && $dataRequest['imagenPerfil'] != null) {
            $name = str_replace(' ', '_', $dataRequest['imagenPerfil']->getClientOriginalName());

            $nombreImagen = time() . '-' . $name;

            User::where('id', $data->id)->update([
                'name' => $dataRequest['newNameUser'],
                'last_name' => $dataRequest['newLastNameUser'],
                'user_aka' => $dataRequest['newUser'],
                'instagram_user' => $dataRequest['newInstagramName'],
                'profile_image' => $nombreImagen
            ]);

            $dataRequest['imagenPerfil']->move(public_path('imagesStored'), $nombreImagen);
        }else{
            User::where('id', $data->id)->update([
                'name' => $dataRequest['newNameUser'],
                'last_name' => $dataRequest['newLastNameUser'],
                'user_aka' => $dataRequest['newUser'],
                'instagram_user' => $dataRequest['newInstagramName']
            ]);
        }

        $data = User::where('id', $data->id);

        return view('editarPerfil',[
            'data'=>$data->get()->first(),
            'modificado' => true
        ]);
    }

    private function validateRequest($request)
    {
        $response = [
            'isValid' => true,
            'errors' => []
        ];

        $validator = Validator::make($request, [
            'newNameUser' => 'required',
            'newLastNameUser' => 'required',
            'newUser' => 'required',
            'newInstagramName' => 'required'
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
