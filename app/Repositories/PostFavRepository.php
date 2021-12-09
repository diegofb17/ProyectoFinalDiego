<?php

namespace App\Repositories;

use App\Models\FavoritePost;

class PostFavRepository
{
    public function listAll()
    {
        return FavoritePost::all();
    }

    public function create($data)
    {
        return FavoritePost::create($data);
    }

    public function findByUserIdAndPostId($idUser, $idPost)
    {
        return FavoritePost::where('id_user', $idUser)
            ->where('id_post', $idPost)
            ->get();
    }

    public function deleteById($data){
        return FavoritePost::where('id_user', $data['id_user'])
            ->where('id_post', $data['id_post'])
            ->delete();
    }

    public function listByUserId($id){
        return FavoritePost::where('id_user', $id)
            ->get();
    }
}
