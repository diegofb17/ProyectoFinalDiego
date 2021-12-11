<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use App\Repositories\CategorieRepository;
use App\Repositories\OpinionRepository;
use App\Repositories\PostFavRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class StickerAbiertoController extends Controller
{

    private $postRepository;
    private $opinionRepository;
    private $postFavRepository;

    public function __construct(
        PostRepository    $postRepository,
        OpinionRepository $opinionRepository,
        PostFavRepository $postFavRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->opinionRepository = $opinionRepository;
        $this->postFavRepository = $postFavRepository;
        $this->middleware('auth');
    }

    public function stickerAbierto(Request $request)
    {
        $requestData = $request->all();

        //Si existe el request del formulario cojo el id del post de ahi si no uso el que se le pasa por url
        isset($requestData['idPostOpinion']) ? $idPost = $requestData['idPostOpinion'] : $idPost=$request->route('id');

        //Aqui entra solo si se ha enviado el formulario de la opinion
        if (count($request->all()) > 0) {
            $data = [
                'id_user' => auth()->user()->id,
                'id_post' => $request->get('idPostOpinion'),
                'punctuation' => $request->get('puntuationOpinion'),
                'text' => $request->get('textOpinion')
            ];

            $opinion = $this->opinionRepository->userAlreadyOpined($data['id_user'],$data['id_post']);
            $data['error'] = false;

            if ($opinion == 0) {
                $this->opinionRepository->createOpinion($data);

            } else {
                $data['error'] = true;
            }
        }

        $data['post'] = $this->postRepository->getById($idPost);
        $data['opinion'] = $this->opinionRepository->listOpinionByPostId($idPost);
        $data['elementoGuardado'] = false;
        $pictures = PostImage::where('id_post', $idPost)->get();

        foreach ($pictures as $picture) {
            $data['images'][] = $picture->image;
        }

        $contadorOpiniones = 0;
        $estrellasTotal = 0;
        foreach ($data['opinion'] as $opinion) {
            $contadorOpiniones++;
            $estrellasTotal += $opinion->punctuation;
        }

        if ($contadorOpiniones == 0) {
            $data['mediaPost'] = 0;
        } else {
            $data['mediaPost'] = $estrellasTotal / $contadorOpiniones;
        }
        $test = $this->postFavRepository->findByUserIdAndPostId(auth()->user()->id, $idPost);

        if ($test->count() == 1) {
            $data['elementoGuardado'] = true;
        }

        $data['numOpiniones'] = $contadorOpiniones;
        return view('stickerAbierto', [
            'data' => $data,
            'id' => $idPost,
            'idUser' => auth()->user()->id
        ]);
    }

    public function storeOpinion(Request $request)
    {

        dd("dd");

        return redirect()->route('stickerAbierto', $request->get('idPostOpinion'));
    }
}
