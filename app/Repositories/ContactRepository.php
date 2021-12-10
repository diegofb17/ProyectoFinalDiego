<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function listFollowed($id)
    {
        return Contact::where('id_user', $id)
            ->get();
    }

    public function listFollowers($id)
    {
        return Contact::where('id_followed_user', $id)
            ->get();
    }

    public function getIfUserIsFollowed($idUser, $idUserFollowed)
    {
        return Contact::where('id_user', $idUser)
            ->where('id_followed_user', $idUserFollowed)
            ->get();
    }

    public function unfollowUser($idUser, $idUserFollowed)
    {

        return Contact::where('id_user', $idUser)
            ->where('id_followed_user', $idUserFollowed)
            ->delete();
    }

    public function followUser($idUser, $idUserFollowed)
    {
        return Contact::create([
            'id_user'=>$idUser,
            'id_followed_user' => $idUserFollowed
        ]);
    }
}
