<?php

namespace App\Http\Controllers;

use App\Repositories\PostFavRepository;
use Illuminate\Http\Request;

class DeleteFavoriteElementController extends Controller
{
    private $postFavRepository;

    public function __construct
    (
        PostFavRepository $postFavRepository
    )
    {
        $this->postFavRepository = $postFavRepository;
    }

    public function deleteFavoriteElement($idPost)
    {
        $data = [
            'id_user' => auth()->user()->id,
            'id_post' => $idPost
        ];

        $data['userInfo'] = auth()->user();
        $this->postFavRepository->deleteById($data);

        return redirect()->route("stickerAbierto",$data['id_post']);
    }
}
