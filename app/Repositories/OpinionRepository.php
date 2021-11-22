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
        return Opinion::Join('users','users.id_user','opinions.id_user')
            ->where('opinions.id_post',$id)
            ->select('opinions.*',DB::raw('CONCAT_WS(" ",name,last_name) as name'))
            ->get();
    }
}
