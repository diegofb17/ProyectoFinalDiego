<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getById($id)
    {
        return User::where('id',$id)
            ->get()->first();
    }
}
