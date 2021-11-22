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
        <h3>{{$data['post'][0]['title']}}</h3>
        <p>{{$data['post'][0]['text']}}</p>
        <div class="imagenesSticker">
            <img src={{asset("images/arcos_felipe.jpg")}}>
            <img src={{asset("images/arcos_felipe.jpg")}}>
            <img src={{asset("images/arcos_felipe.jpg")}}>
            <img src={{asset("images/arcos_felipe.jpg")}}>
        </div>

        <div class="userProfile">
            <p>Subido por {{$data['post'][0]['name_user']}}</p>
            <a href="{{route('perfiles')}}"><img src="images/foto_usuario.jfif"></a>
        </div>

        <div class="opinions">
            <div>
                <i class="fas fa-star"></i>
                {{--En este span va la media de las valoraciones--}}
                <span>{{$data['mediaPost']}}/5 - <a href="{{route('opiniones',$id)}}"><span class="underline">{{$data['numOpiniones']}} Opiniones</span></a></span>
            </div>
            <div>
                <span>Valora este sitio</span>
                <div class="stars">
                    <i class="far fa-star" id="star1"></i><i class="far fa-star" id="star2"></i><i class="far fa-star" id="star3"></i><i class="far fa-star" id="star4"></i><i class="far fa-star" id="star5"></i>
                </div>
            </div>
            <p id="errorOpiniones" style="color: red;font-weight: bold"></p>
            <textarea placeholder="Opinion del lugar" rows="5" maxlength="200" name="text_opinion" id="text_opinion"></textarea>

            <form action="{{route('storeOpinion')}}" method="post">
                @csrf
                <button type="submit" id="enviarOpinion">Enviar opinion</button>
                <input type="hidden" id="puntuationOpinion" name="puntuationOpinion">
                <input type="hidden" id="textOpinion" name="textOpinion">
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
