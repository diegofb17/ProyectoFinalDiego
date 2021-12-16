@extends('layout')

@section('content')
    <div class="busqueda">
        <div>
            <div>
                <span>¿Que sitio quieres visitar?</span>
            </div>
            <div>
                <form action="mostrarBusqueda" method="post">
                    <div>
                        <div>
                            <input type="text" id="buscarPost" name="aBuscar">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                        <select class="js-example-basic-multiple" name="seleccion" multiple="multiple">
                            @foreach($data['categories'] as $key => $categorie)

                                <option value="{{$key}}">{{$categorie}}</option>
                            @endforeach
                        </select>
                    </div>
                    @csrf
                </form>
                @if(isset($errors) && count($errors)>0)
                    <div class="alert alert-danger" role="alert" style="margin-top: 1rem">
                        Hay uno o más campos vacíos*
                    </div>
                @endif
            </div>
        </div>
        <hr>
        <div class="usersSearched">
        @isset($data['users'])
            @foreach($data['users'] as $user)
                    <a href="{{ route('perfiles', $user->id) }}">
                        @if($user->profile_image != null)
                            <div class="sticker" style="background-image: url({{asset('imagesStored/'.$user->profile_image)}});background-size: cover;max-width: 100%">
                        @else
                            <div class="sticker" style="background-image: url({{asset('imagesStored/usuarioDefecto.png')}});background-size: cover;">
                        @endif

                            <div>
                                <h5>{{$user->user_aka}}</h5>
                            </div>
                        </div>
                    </a>
            @endforeach
        @endisset
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                placeholder: "Seleccione"
            });
        });
    </script>
@endsection
