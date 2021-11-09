@extends('layout')

@section('content')
    <a href="{{route('stickerAbierto')}}">
        <div class="sticker" style="background-image: url('images/arcos_felipe.jpg');background-size: cover;">

            <div>
                <p>Titulo del sticker</p>
            </div>
            <div>
                <h5>Categoría</h5>
                <div>
                    <i class="fas fa-map-marker-alt"></i>
                    <i class="far fa-bookmark"></i>
                </div>
            </div>
        </div>
    </a>
@endsection
