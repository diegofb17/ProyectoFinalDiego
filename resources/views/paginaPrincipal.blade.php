@extends('layout')

@section('content')
    @if(count($data['posts'])>0)
        <div class="paginaPrincipal">
            @foreach($data['posts'] as $post)
                <a href="{{ route("stickerAbierto",$post->id_post) }}">
                    <div class="sticker" style="background-image: url('imagesStored/{{$post->picture}}');background-size: cover;">
                        <div>
                            <p>{{$post->title}}</p>
                        </div>
                        <div>
                            <h5>{{$post->name}}</h5>
                        </div>
                    </div>
                </a>
            @endforeach
            @else
                <div class="card text-center mt-5" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title">No hay ninguna publicacion disponible</h5>
                        <p class="card-text">Lo usuarios a los que sigues todavia no han subido posts.</p>
                        <a href="busqueda" class="btn btn-primary">Busca nuevos usuarios</a>
                    </div>
                </div>
            @endif
        </div>
@endsection
