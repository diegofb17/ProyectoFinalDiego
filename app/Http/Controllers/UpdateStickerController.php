<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateStickerController extends Controller
{
    public function updateSticker(Request $request){
        dd($request->all());
    }
}
