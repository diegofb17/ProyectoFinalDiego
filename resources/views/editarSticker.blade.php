@extends('layout')

@section('content')
    <form action="{{route('updateSticker')}}" method="post" enctype="multipart/form-data">
        <div>
            <a href="{{url()->previous()}}"><i class="fas fa-arrow-left"></i></a>
            <span>Edita el sticker</span>
            <button type="submit"><i class="fas fa-paper-plane"></i></button>
        </div>
        <div class="stickerEdit" style="background-image: url('{{asset('imagesStored/'.$data['post']['picture'])}}');background-size: cover;margin-bottom: -1.7rem">
            <div>
                <h5 class="w-50">
                    <select class="categorias w-75" name="categoriaSticker">
                        @foreach($data['categorias'] as $key => $categoria)
                            @if($data['post']['name']==$categoria)
                                <option selected value="{{$key}}">{{$categoria}}</option>
                            @else
                                <option value="{{$key}}">{{$categoria}}</option>
                            @endif
                        @endforeach
                    </select>
                </h5>
                <div>
                    <a style="visibility: hidden" href="updateSticker">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <label for="imagenPortadaSticker">
                        <i title="Cambiar imagen de portada" class="fas fa-image"></i>
                    </label>
                </div>
            </div>
        </div>

        <input style="visibility: hidden" accept="image/*" id="imagenPortadaSticker" type="file" name="imagenes"class="imagenes input-file">
        <input style="visibility: hidden" accept="image/*" id="imagenesEditarSticker" type="file" name="imagenes[]" class="imagenes input-file" multiple="multiple">

        <div class="stickerBody" style="margin-bottom: 6rem">
            <input type="text" id="nombreStickerEditar" name="nombreStickerEditar" value="{{$data['post']['title']}}">
            <textarea id="descripcionEditar" name="descripcionEditar">{{$data['post']['text']}}</textarea>
            <div class="imagenesSticker">
                @foreach($data['images'] as $image)
                    <img src="{{ asset('imagesStored/'.$image) }}">
                @endforeach
            </div>

            <button onclick="document.getElementById('imagenesEditarSticker').click()" type="button" class="btn">Cambiar imágenes</button>
        </div>
        @csrf
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.categorias').select2();
        });
    </script>
@endsection
