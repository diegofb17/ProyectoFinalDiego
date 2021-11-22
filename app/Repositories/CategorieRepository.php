<?php

namespace App\Repositories;

use App\Models\Categorie;

class CategorieRepository
{
    public function listAll()
    {
        return Categorie::all();
    }
}
