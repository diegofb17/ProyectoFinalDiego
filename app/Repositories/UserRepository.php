<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getById($id)
    {
        return User::where('id_user',$id)
            ->select(DB::raw('CONCAT_WS(" ",name,last_name) as name'))
            ->get();
    }
}
