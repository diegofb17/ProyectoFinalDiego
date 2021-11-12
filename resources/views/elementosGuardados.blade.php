@extends('layout')

@section('content')
    <div class="elementosGuardados">
        <a href="{{url()->previous()}}">
            <i class="fas fa-arrow-left"></i>
        </a>
        <span>Elementos guardados</span>
        <a>
            <i class="fas fa-ellipsis-v"></i>
        </a>
    </div>
    <a href="{{route('stickerAbierto')}}">
        <div class="sticker" style="background-image: url('images/arcos_felipe.jpg');background-size: cover;">
            <div>
                <p>Titulo del sticker</p>
            </div>
            <div>
                <h5>Categoría</h5>
                <div>
                    <i class="fas fa-map-marker-alt"></i>
                    <i class="fas fa-bookmark"></i>
                </div>
            </div>
        </div>
    </a>
@endsection
