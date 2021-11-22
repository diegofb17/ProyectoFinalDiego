<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function listAll()
    {
        return Post::Join('categories','posts.id_categorie','=','categories.id_categorie')
            ->select('posts.title','categories.name','posts.pictures','posts.id_post')
            ->get();;
    }

    public function listByUserId($id)
    {
        return Post::Join('categories','posts.id_categorie','=','categories.id_categorie')
            ->select('posts.title','categories.name','posts.pictures')
            ->where('posts.id_user',$id)
            ->get();;
    }

    public function getById($id)
    {
        return Post::where('id_post',$id)
            ->join('categories','posts.id_categorie','=','categories.id_categorie')
            ->join('users','posts.id_user','=','users.id_user')
            ->select('posts.title','users.name as name_user','users.id_user','users.profile_image','categories.name','posts.pictures','posts.text','posts.latitude','posts.longitude')
            ->get();
    }
}
