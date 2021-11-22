@extends('layout')

@section('content')
    <div class="busqueda">
        {{--<div>
            <div>
                <span>¿Que sitio quieres visitar?</span>
            </div>
            <div>
                <div>
                    <div>
                        <input type="text" id="buscarPost">
                        <i class="fas fa-search"></i>
                    </div>
                    <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                        @foreach($data['categories'] as $categorie)
                            <option value="WY">{{$categorie->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="#">
                        <button>Reserva tu visita</button>
                    </a>
                </div>
            </div>
        </div>--}}
        <hr>
        <div class="postsBusqueda">
            <a href="{{url("stickerAbierto/1")}}">
                <div class="sticker" style="background-image: url('images/arcos_felipe.jpg');background-size: cover;">
                    <div>
                        <p>Categoria</p>
                    </div>
                    <div>
                        <h5>Arcos</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                placeholder: "Categoria"
            });
        });
    </script>
@endsection
