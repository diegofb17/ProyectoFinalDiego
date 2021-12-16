<?php

namespace App\Repositories;

use App\Models\Opinion;
use Illuminate\Support\Facades\DB;

class OpinionRepository
{
    public function listAll()
    {
        return Opinion::all();
    }

    public function listOpinionByPostId($id)
    {
        return Opinion::Join('users', 'users.id', 'opinions.id_user')
            ->where('opinions.id_post', $id)
            ->select('opinions.*', 'users.*')
            ->get();
    }

    public function createOpinion($data)
    {
        return Opinion::create([
            'id_user' => $data['id_user'],
            'id_post' => intval($data['id_post']),
            'punctuation' => $data['punctuation'],
            'text' => $data['text']
        ]);
    }

    public function userAlreadyOpined($idUser,$idPost)
    {
        return Opinion::where('id_user',$idUser)
            ->where('id_post',$idPost)
            ->count();
    }

    public function deleteOpinionsByPostId($id)
    {
        return Opinion::where('id_post',$id)->delete();
    }
}
