<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function listFollowed($id)
    {
        return Contact::where('id_user',$id)->get();
    }

    public function listFollowers($id)
    {
        return Contact::where('id_followed_user',$id)->get();
    }
}
