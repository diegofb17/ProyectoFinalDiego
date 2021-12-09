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
    }

    public function stickerAbierto($idPost)
    {
        $data['post'] = $this->postRepository->getById($idPost);
        $data['opinion'] = $this->opinionRepository->listOpinionByPostId($idPost);
        $data['elementoGuardado'] = false;
        $pictures = PostImage::where('id_post',$idPost)->get();

        foreach ($pictures as $picture){
            $data['images'][]=$picture->image;
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
            'id' => $idPost
        ]);
    }
}
