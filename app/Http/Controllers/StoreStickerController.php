<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreStickerController extends Controller
{
    private $postRepository;

    public function __construct(
        PostRepository $postRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->middleware('auth');
    }

    public function storeSticker(Request $request)
    {
        $arrayImagenes = [];

        $validation = $this->validateRequest($request->all());

        if (!$validation['isValid']) {
            return view('/anadirSticker', [
                'errors' => $validation['errors']->messages()
            ]);
        }


        $cnt = 1;
        if (count($request->imagenes)) {
            foreach ($request->imagenes as $key => $imagen) {
                $name = str_replace(' ', '-', $imagen->getClientOriginalName());

                $nombreImagen = time() . '-' . $name;

                if ($cnt == 1) {
                    $data = [
                        'id_user' => auth()->user()->id,
                        'id_categorie' => $request->get('categoriaSticker'),
                        'title' => $request->get('nombreSticker'),
                        'text' => $request->get('descripcionSticker'),
                        'picture' => $nombreImagen
                    ];

                    $postCreated = $this->postRepository->createPost($data);
                } else {
                    PostImage::create([
                        'id_post' => $postCreated->id,
                        'image' => $nombreImagen
                    ]);
                }

                $imagen->move(public_path('imagesStored'), $nombreImagen);

                $cnt++;
            }
        }

        return redirect()->route('perfiles',auth()->user()->id);
    }

    private function validateRequest($request)
    {
        $response = [
            'isValid' => true,
            'errors' => []
        ];

        $validator = Validator::make($request, [
            'nombreSticker' => 'required',
            'direccionSticker' => 'required',
            'descripcionSticker' => 'required',
            'categoriaSticker' => 'required',
            'imagenes' => 'required',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
