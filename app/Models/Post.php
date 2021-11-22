<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id_user',
        'id_categorie',
        'title',
        'pictures',
        'text'
    ];

    protected $table = 'posts';
}
