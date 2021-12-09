<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoritePost extends Model
{
    protected $fillable = [
        'id_user',
        'id_post'
    ];

    protected $table = 'post_favs';
}
