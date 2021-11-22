@extends('layout')

@section('content')

    <div class="contenedor">
        <i class="fas fa-arrow-left"></i>
        <p>Opiniones</p>
        <div class="opiniones">
            <i class="fas fa-star"></i>
            <p>{{$data['mediaPost']}}/5 - {{$data['numOpiniones']}} opiniones</p>
        </div>

        <hr/>
        <div class="opinions2">
            @foreach($data['opinion'] as $opinion)
                <div class="user">
                    <div class="userInfo">
                        <span>Kerry</span>
                        <div>
                            <a href="#">
                                <img src="images/foto_usuario.jfif">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="textOpinion">
                        <p>Muy bien</p>
                        <p>Lorem ipsum dolor sit amet, aquarius consectetur adipiscing elit. Aliquam id ornare leo, eu
                            auctor magna.
                        </p>
                        <p>oct 2020</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
