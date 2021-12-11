<?php

namespace App\Http\Controllers;

use App\Repositories\PostFavRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class ElementoGuardadoController extends Controller
{
    private $postFavRepository;
    private $postRepository;

    public function __construct
    (
        PostFavRepository $postFavRepository,
        PostRepository $postRepository
    )
    {
        $this->postFavRepository = $postFavRepository;
        $this->postRepository = $postRepository;
        $this->middleware('auth');
    }

    public function elementosGuardados()
    {
        $data['postsFav'] = $this->postFavRepository->listByUserId(auth()->user()->id);

        foreach ($data['postsFav'] as $postFav){

            $post = $this->postRepository->getById($postFav->id_post);

            $data['posts'][$post->id_post] = [
                'title' => $post->title,
                'name' => $post->name,
                'id_post' => $post->id_post,
                'picture' => $post->picture
            ];
        }

        return view('elementosGuardados', [
            'data' => $data
        ]);
    }
}
