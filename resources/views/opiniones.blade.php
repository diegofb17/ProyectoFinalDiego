@extends('layout')

@section('content')

    <div class="contenedor">
        <i class="fas fa-arrow-left"></i>
        <p>Opiniones</p>
        <div class="opiniones">
            <i class="fas fa-star"></i>
            <p>4,3/5 - 17 opiniones</p>
        </div>
        <hr>
        <div class="nivelOpinion">
            <div>
                <p>Genial</p>
                <p>7</p>
            </div>

            <div>
                <p>Muy bien</p>
                <p>2</p>
            </div>

            <div>
                <p>Bien</p>
                <p>2</p>
            </div>

            <div>
                <p>Regular</p>
                <p>2</p>
            </div>

            <div>
                <p>Mal</p>
                <p>4</p>
            </div>
        </div>
        <hr/>
        <div class="opinions2">
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
        </div>
    </div>

@endsection
