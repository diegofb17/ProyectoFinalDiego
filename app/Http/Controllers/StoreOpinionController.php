<?php

namespace App\Http\Controllers;

use App\Repositories\OpinionRepository;
use Illuminate\Http\Request;

class StoreOpinionController extends Controller
{
    private $opinionRepository;

    public function __construct
    (
        OpinionRepository $opinionRepository
    )
    {
        $this->opinionRepository = $opinionRepository;
    }

    public function storeOpinion(Request $request)
    {
        $data = [
            'id_user' => auth()->user()->id,
            'id_post' => $request->get('idPostOpinion'),
            'punctuation' => $request->get('puntuationOpinion'),
            'text' => $request->get('textOpinion')
        ];

        $this->opinionRepository->createOpinion($data);

        return redirect()->route('stickerAbierto',$request->get('idPostOpinion'));
    }
}
