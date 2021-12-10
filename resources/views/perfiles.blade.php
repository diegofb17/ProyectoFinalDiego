@extends('layout')

@section('content')
    <div class="profile">
        <div class="firstPart">
            <div>
                <a href="{{url()->previous()}}">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <span>{{isset($data['userInfo']['name']) ? $data['userInfo']['name'] : 'Usuario'}}</span>
                <i class="fas fa-qrcode" id="qrCode"></i>
            </div>

            <div>
                <div>
                    @if($data['userInfo']['profile_image'] != null)
                        <img src="{{asset('imagesStored/'.$data['userInfo']['profile_image'])}}">

                    @else
                        <img src="{{asset('imagesStored/usuarioDefecto.png')}}">
                    @endif
                    <p>{{isset($data['userInfo']->username) ? $data['userInfo']->username : ""}}</p>
                </div>
                <div>
                    <div>
                        <p>{{$data['followed']}}</p>
                        <p>Siguiendo</p>
                    </div>
                    <div>
                        <p>{{$data['followers']}}</p>
                        <p>Seguidores</p>
                    </div>
                </div>
                <div>
                    @if($data['userLogueado'] == true)
                        <a href="{{route('editarPerfil')}}"><button>Editar perfil</button></a>
                        <a href="{{route('elementosGuardados')}}"><button><i class="far fa-bookmark"></i></button></a>
                    @else
                        @if($data['seguido'])
                            <a href="{{route('dejarSeguirUsuario',$data['userInfo']->id)}}"><button class="unfollowButton">Dejar de seguir</button></a>
                        @else
                            <a href="{{route('seguirUsuario',$data['userInfo']->id)}}"><button class="followButton">Seguir</button></a>
                        @endif
                        <a href="https://www.instagram.com/{{$data['userInfo']->instagram_user}}"><button class="instagramButton"><i class="fab fa-instagram"></i></button></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="secondPart">
            <hr/>
            <i class="fas fa-list"></i>
            <hr/>
            <div>
                @if($data['postsUser']->count()>0)
                    @foreach($data['postsUser'] as $postUser)
                        <a href="{{ route("stickerAbierto",$postUser->id_post) }}">
                            <div class="sticker" style="background-image: url({{asset('imagesStored/'.$postUser->picture)}});background-size: cover;">
                                <div>
                                    <h5>{{$postUser->title}}</h5>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                        <div class="card-body text-center">
                            <h5 class="card-title">Este usuario no tiene posts disponibles</h5>
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection
