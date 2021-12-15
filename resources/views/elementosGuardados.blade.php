@extends('layout')

@section('content')
    <div class="pagElementosGuardados">
        <div class="elementosGuardados">
            <a href="{{url()->previous()}}">
                <i class="fas fa-arrow-left"></i>
            </a>
            <span>Elementos guardados</span>
            <a>
                <i class="fas fa-ellipsis-v"></i>
            </a>
        </div>
        @if($data['postsFav']->count() == 0)
            <div class="card text-center mt-3">
                <div class="card-body">
                    <h5 class="card-title">No hay elementos guardados</h5>
                    <p></p>
                    <a href="{{route('paginaPrincipal')}}" class="btn btn-primary">Ir a ver stickers</a>
                </div>
            </div>
        @else
            @foreach($data['posts'] as $post)
                <a href="{{ route("stickerAbierto",$post['id_post']) }}">
                    <div class="sticker"
                         style="background-image: url('imagesStored/{{$post['picture']}}');background-size: cover;">
                        <div>
                            <p>{{$post['title']}}</p>
                        </div>
                        <div>
                            <h5>{{$post['name']}}</h5>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
@endsection
