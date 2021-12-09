<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $fillable = [
        'punctuation',
        'text',
        'id_post',
        'id_user'
    ];

    protected $table = 'opinions';
}
