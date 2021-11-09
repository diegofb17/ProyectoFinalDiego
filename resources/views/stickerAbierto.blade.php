@extends('layout')

@section('content')
    <div class="sticker" style="background-image: url('images/arcos_felipe.jpg');background-size: cover;">
        <div>
            <h5>Categoría</h5>
            <div>
                <i class="fas fa-share-alt"></i>
                <i class="fas fa-map-marker-alt"></i>
                <i class="far fa-bookmark"></i>
            </div>
        </div>
    </div>
    <div class="stickerBody">
        <h3>Titulo del sticker</h3>
        <p>Descripcion del sticker</p>
        <div class="imagenesSticker">
            <img src="images/arcos_felipe.jpg">
            <img src="images/arcos_felipe.jpg">
            <img src="images/arcos_felipe.jpg">
            <img src="images/arcos_felipe.jpg">
        </div>

        <div class="userProfile">
            <p>Subido por @id_usuario</p>
            <a href="{{route('perfiles')}}"><img src="images/foto_usuario.jfif"></a>
        </div>

        <div class="opinions">
            <div>
                <i class="fas fa-star"></i>
                {{--En este span va la media de las valoraciones--}}
                <span>4.8/5 - <a href="{{route('opiniones')}}"><span class="underline">17 Opiniones</span></a></span>
            </div>
            <div>
                <span>Valora este sitio</span>
                <div class="stars">
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
            <textarea placeholder="Opinion del lugar" rows="5" maxlength="200"></textarea>

            <form action="#">
                <button type="submit">Enviar opinion</button>
            </form>
        </div>
    </div>
@endsection
