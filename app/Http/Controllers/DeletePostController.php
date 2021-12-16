<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use App\Repositories\OpinionRepository;
use App\Repositories\PostFavRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class DeletePostController extends Controller
{
    private $postRepository;
    private $postFavRepository;
    private $opinionRepository;

    public function __construct
    (
        PostRepository $postRepository,
        PostFavRepository $postFavRepository,
        OpinionRepository $opinionRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->postFavRepository = $postFavRepository;
        $this->opinionRepository = $opinionRepository;
    }

    public function deletePost($id)
    {
        PostImage::where('id_post',$id)->delete();

        $this->postFavRepository->deleteByPostId($id);

        $this->opinionRepository->deleteOpinionsByPostId($id);

        $this->postRepository->deleteById($id);

        return redirect()->route('perfiles',auth()->user()->id);
    }
}
