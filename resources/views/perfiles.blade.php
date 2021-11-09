@extends('layout')

@section('content')

    <div class="profile">
        <div class="firstPart">
            <div>
                <span>Diego</span>
                <i class="fas fa-qrcode"></i>
            </div>

            <div>
                <div>
                    <img src="images/foto_usuario.jfif">
                    <p>@diegofernandez29</p>
                </div>
                <div>
                    <div>
                        <p>57</p>
                        <p>Siguiendo</p>
                    </div>
                    <div>
                        <p>24</p>
                        <p>Seguidores</p>
                    </div>
                </div>
                <div>
                    <a><button>Editar perfil</button></a>
                    <a href="{{route('elementosGuardados')}}"><button><i class="far fa-bookmark"></i></button></a>
                </div>
            </div>
        </div>
        <div class="secondPart">
            <hr/>
            <i class="fas fa-list"></i>
            <hr/>
            <div>
                <div class="sticker" style="background-image: url('images/arcos_felipe.jpg');background-size: cover;">
                    <div>
                        <h5>Titulo sticker</h5>
                    </div>
                </div>

                <div class="sticker" style="background-image: url('images/arcos_felipe.jpg');background-size: cover;">
                    <div>
                        <h5>Titulo sticker</h5>
                    </div>
                </div>

                <div class="sticker" style="background-image: url('images/arcos_felipe.jpg');background-size: cover;">
                    <div>
                        <h5>Titulo sticker</h5>
                    </div>
                </div>

                <div class="sticker" style="background-image: url('images/arcos_felipe.jpg');background-size: cover;">
                    <div>
                        <h5>Titulo sticker</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
