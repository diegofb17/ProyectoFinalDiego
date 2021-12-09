<?php

namespace App\Repositories;

use App\Models\Categorie;

class CategorieRepository
{
    public function listAll()
    {
        return Categorie::all();
    }

    public function listAllForSelect(){
        return Categorie::all()->pluck('name','id_categorie');
    }
}
