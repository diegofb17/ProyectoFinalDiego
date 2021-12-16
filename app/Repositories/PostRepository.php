<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function listAllAcceptedByFollow($usuariosSeguidos)
    {
        return Post::Join('categories', 'posts.id_categorie', '=', 'categories.id_categorie')
            ->select('posts.title', 'categories.name', 'posts.picture', 'posts.id_post')
            ->where('posts.accepted', true)
            ->whereIn('posts.id_user', $usuariosSeguidos)
            ->get();;
    }

    public function listByUserId($id)
    {
        return Post::Join('categories', 'posts.id_categorie', '=', 'categories.id_categorie')
            ->where('posts.id_user', $id)
            ->select('posts.title', 'categories.name', 'posts.picture', 'posts.id_post')
            ->get();;
    }

    public function getById($id)
    {
        return Post::where('id_post', $id)
            ->join('categories', 'posts.id_categorie', '=', 'categories.id_categorie')
            ->join('users', 'posts.id_user', '=', 'users.id')
            ->select('posts.title', 'posts.id_post', 'users.name as name_user', 'users.id', 'users.profile_image', 'categories.name', 'posts.picture', 'posts.text', 'posts.latitude', 'posts.longitude')
            ->get()->first();
    }

    public function createPost($data)
    {
        return Post::create([
            'id_user' => $data['id_user'],
            'id_categorie' => $data['id_categorie'],
            'title' => $data['title'],
            'text' => $data['text'],
            'picture' => $data['picture'],
            'accepted' => 1
        ]);
    }

    public function deleteById($id){

        return Post::where('id_post', $id)->delete();
    }
}
