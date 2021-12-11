@extends('layout')

@section('content')
    <div class="sticker" style="background-image: url('{{asset('imagesStored/'.$data['post']['picture'])}}');background-size: cover;">
        <div>
            <h5>{{$data['post']['name']}}</h5>
            <div>
                @if($data['post']['id'] == $idUser)
                    <a href="{{route("editarSticker",$data['post']['id_post'])}}"><i class="fas fa-pencil-alt"></i></a>
                @else
                    <a style="visibility: hidden" href="#"><i class="fas fa-pencil-alt"></i></a>
                @endif
                <i class="fas fa-map-marker-alt"></i>
                @if($data['elementoGuardado'] == false)
                    <a href="{{ route("addFavoriteElement",$data['post']['id_post']) }}"><i class="far fa-bookmark"></i></a>
                @else
                    <a href="{{ route("deleteFavoriteElement",$data['post']['id_post']) }}"><i class="fas fa-bookmark"></i></a>
                @endif
            </div>
        </div>
    </div>
    <div class="stickerBody">
        <h3>{{$data['post']['title']}}</h3>
        <p>{{$data['post']['text']}}</p>
        <div class="imagenesSticker">
            @foreach($data['images'] as $image)
                <img src="{{ asset('imagesStored/'.$image) }}">
            @endforeach
        </div>

        <div class="userProfile">
            <p>Subido por {{$data['post']['name_user']}}</p>
            <a href="{{ route('perfiles', $data['post']['id']) }}">
                @if($data['post']['profile_image']!=null)
                    <img src="{{asset('imagesStored/'.$data['post']['profile_image'])}}">
                @else
                    <img src="{{asset('imagesStored/usuarioDefecto.png')}}">
                @endif
            </a>
        </div>

        <div class="opinions">
            <div>
                <i class="fas fa-star"></i>
                {{--En este span va la media de las valoraciones--}}
                <span>{{number_format($data['mediaPost'], 1)}}/5 - <a href="{{route('opiniones',$id)}}"><span class="underline">{{$data['numOpiniones']}} Opiniones</span></a></span>
            </div>
            <div>
                <span>Valora este sitio</span>
                <div class="stars">
                    <i class="far fa-star" id="star1"></i><i class="far fa-star" id="star2"></i><i class="far fa-star" id="star3"></i><i class="far fa-star" id="star4"></i><i class="far fa-star" id="star5"></i>
                </div>
            </div>
            <p id="errorOpiniones" style="color: red;font-weight: bold">
                @if(isset($data['error']) && $data['error'])
                    Solo puedes opinar una vez
                @endif
            </p>
            <textarea placeholder="Opinion del lugar" maxlength="300" rows="5" name="text_opinion" id="text_opinion"></textarea>

            <form action="{{route('storeOpinion')}}" method="get">
                @csrf
                <button class="btn" type="submit" id="enviarOpinion">Enviar opinion</button>
                <input type="hidden" id="puntuationOpinion" name="puntuationOpinion">
                <input type="hidden" id="textOpinion" name="textOpinion">
                <input type="hidden" id="idPostOpinion" name="idPostOpinion" value="{{$data['post']['id_post']}}">
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#enviarOpinion').click(function (e) {
            if($('#puntuationOpinion').val() != '' && $('#text_opinion').val().length >= 45) {
                $('#textOpinion').val($('#text_opinion').val())
            }else{
                if($('#text_opinion').val().length < 45){
                    if($('#text_opinion').val().length == 0){
                        $('#errorOpiniones').text('Campo de opinion vacío')
                    }else{
                        $('#errorOpiniones').text('Escribe una opinion mas larga')
                    }
                }else{
                    $('#errorOpiniones').text('Selecciona una puntuacion')
                }
                e.preventDefault();
            }
        });

        let star1 = $('#star1');
        let star2 = $('#star2');
        let star3 = $('#star3');
        let star4 = $('#star4');
        let star5 = $('#star5');
        let selected = false;

        star1.click(function () {
            star1.removeClass();
            star2.removeClass();
            star3.removeClass();
            star4.removeClass();
            star5.removeClass();
            star1.addClass("fas fa-star");
            star2.addClass("far fa-star");
            star3.addClass("far fa-star");
            star4.addClass("far fa-star");
            star5.addClass("far fa-star");
            selected = true;

            $('#puntuationOpinion').val("1");
        });

        star2.click(function () {
            star1.removeClass();
            star2.removeClass();
            star3.removeClass();
            star4.removeClass();
            star5.removeClass();
            star2.addClass("fas fa-star");
            star1.addClass("fas fa-star");
            star3.addClass("far fa-star");
            star4.addClass("far fa-star");
            star5.addClass("far fa-star");
            selected = true;

            $('#puntuationOpinion').val("2");
        });

        star3.click(function () {
            star1.removeClass();
            star2.removeClass();
            star3.removeClass();
            star4.removeClass();
            star5.removeClass();
            star3.addClass("fas fa-star");
            star2.addClass("fas fa-star");
            star1.addClass("fas fa-star");
            star4.addClass("far fa-star");
            star5.addClass("far fa-star");
            selected = true;

            $('#puntuationOpinion').val("3");
        });

        star4.click(function () {
            star1.removeClass();
            star2.removeClass();
            star3.removeClass();
            star4.removeClass();
            star5.removeClass();
            star4.addClass("fas fa-star");
            star2.addClass("fas fa-star");
            star3.addClass("fas fa-star");
            star1.addClass("fas fa-star");
            star5.addClass("far fa-star");
            selected = true;

            $('#puntuationOpinion').val("4");
        });

        star5.click(function () {
            star1.removeClass();
            star2.removeClass();
            star3.removeClass();
            star4.removeClass();
            star5.removeClass();
            star5.addClass("fas fa-star");
            star2.addClass("fas fa-star");
            star3.addClass("fas fa-star");
            star4.addClass("fas fa-star");
            star1.addClass("fas fa-star");
            selected = true;

            $('#puntuationOpinion').val("5");
        });

        star1.mouseenter(function () {
            star1.css('cursor', 'pointer');
            if(!selected) {
                star1.removeClass();
                star1.addClass("fas fa-star");
            }
        }).mouseleave(function () {
            if(!selected) {
                star1.removeClass();
                star1.addClass("far fa-star");
            }
        });

        star2.mouseenter(function () {
            star2.css('cursor', 'pointer');
            if(!selected) {
                star2.removeClass();
                star2.addClass("fas fa-star");
                star1.removeClass();
                star1.addClass("fas fa-star");
            }
        }).mouseleave(function () {
            if(!selected) {
                star1.removeClass();
                star1.addClass("far fa-star");
                star2.removeClass();
                star2.addClass("far fa-star");
            }
        });

        star3.mouseenter(function () {
            star3.css('cursor', 'pointer');
            if(!selected) {
                star3.removeClass();
                star3.addClass("fas fa-star");
                star1.removeClass();
                star1.addClass("fas fa-star");
                star2.removeClass();
                star2.addClass("fas fa-star");
            }
        }).mouseleave(function () {
            if(!selected) {
                star1.removeClass();
                star1.addClass("far fa-star");
                star2.removeClass();
                star2.addClass("far fa-star");
                star3.removeClass();
                star3.addClass("far fa-star");
            }
        });

        star4.mouseenter(function () {
            star4.css('cursor', 'pointer');
            if(!selected) {
                star4.removeClass();
                star4.addClass("fas fa-star");
                star1.removeClass();
                star1.addClass("fas fa-star");
                star2.removeClass();
                star2.addClass("fas fa-star");
                star3.removeClass();
                star3.addClass("fas fa-star");
            }
        }).mouseleave(function () {
            if(!selected) {
                star1.removeClass();
                star1.addClass("far fa-star");
                star2.removeClass();
                star2.addClass("far fa-star");
                star3.removeClass();
                star3.addClass("far fa-star");
                star4.removeClass();
                star4.addClass("far fa-star");
            }
        });

        star5.mouseenter(function () {
            star5.css('cursor', 'pointer');
            if(!selected) {
                star5.removeClass();
                star5.addClass("fas fa-star");
                star1.removeClass();
                star1.addClass("fas fa-star");
                star2.removeClass();
                star2.addClass("fas fa-star");
                star3.removeClass();
                star3.addClass("fas fa-star");
                star4.removeClass();
                star4.addClass("fas fa-star");
            }
        }).mouseleave(function () {
            if(!selected) {
                star1.removeClass();
                star1.addClass("far fa-star");
                star2.removeClass();
                star2.addClass("far fa-star");
                star3.removeClass();
                star3.addClass("far fa-star");
                star4.removeClass();
                star4.addClass("far fa-star");
                star5.removeClass();
                star5.addClass("far fa-star");
            }
        });

    </script>
@endsection
