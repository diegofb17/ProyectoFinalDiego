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
        $this->middleware('auth');
    }

    public function storeOpinion(Request $request)
    {
        $data = [
            'id_user' => auth()->user()->id,
            'id_post' => $request->get('idPostOpinion'),
            'punctuation' => $request->get('puntuationOpinion'),
            'text' => $request->get('textOpinion')
        ];

        $opinion = $this->opinionRepository->userAlreadyOpined($data['id_user'],$data['id_post']);
        $data['error'] = false;

        if ($opinion == 0) {
            $this->opinionRepository->createOpinion($data);

        } else {
            $data['error'] = true;
        }

        return redirect()->route('stickerAbierto', $request->get('idPostOpinion'));
    }
}
