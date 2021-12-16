<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use App\Repositories\CategorieRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreStickerController extends Controller
{
    private $postRepository;
    private $categorieRepository;

    public function __construct(
        PostRepository $postRepository,
        CategorieRepository $categorieRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->categorieRepository = $categorieRepository;
        $this->middleware('auth');
    }

    public function storeSticker(Request $request)
    {
        $arrayImagenes = [];
        $data['categorias'] = $this->categorieRepository->listAllForSelect();
        $validation = $this->validateRequest($request->all());

        if (!$validation['isValid']) {
            return view('/anadirSticker', [
                'errors' => $validation['errors']->messages(),
                'data' => $data
            ]);
        }

        $idUser = auth()->user()->id;
        $cnt = 1;
        if (count($request->imagenes)) {
            foreach ($request->imagenes as $key => $imagen) {

                $nombreImagen = $imagen->getClientOriginalName() . $idUser;

                if ($cnt == 1) {
                    $data = [
                        'id_user' => $idUser,
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
