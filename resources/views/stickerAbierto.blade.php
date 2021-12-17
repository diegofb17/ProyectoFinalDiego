@extends('layout')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')
    <div class="firstPartSticker">
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
        <div class="stickerText">
            <h3>{{$data['post']['title']}}</h3>
            <p>{{$data['post']['text']}}</p>
        </div>
    </div>
    <div class="stickerBody">
        <div class="imagenesSticker">
            @foreach($data['images'] as $image)
                <img style="cursor: pointer" class="openModal" src="{{ asset('imagesStored/'.$image) }}">
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
                <span>{{is_float($data['mediaPost']) ? number_format($data['mediaPost'],1) : $data['mediaPost']}}/5 - <a href="{{route('opiniones',$id)}}"><span class="underline">{{$data['numOpiniones']}} Opiniones</span></a></span>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('imagesStored/'.$data['images'][0]) }}" alt="First slide">
                            </div>
                            @for($i=1;$i<sizeof($data['images']);$i++)
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('imagesStored/'.$data['images'][$i])}}" alt="Third slide">
                                </div>
                            @endfor
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('.openModal').click(function (e) {
            $("#exampleModal").modal("show");
        });

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
