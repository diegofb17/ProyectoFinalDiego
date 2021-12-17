<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getById($id)
    {
        return User::where('id', $id)
            ->get()->first();
    }

    public function getByUser($userName)
    {
        return User::where('name','LIKE','%' . $userName . '%')->get();
    }
}
