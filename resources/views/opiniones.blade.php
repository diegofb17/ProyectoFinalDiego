@extends('layout')

@section('content')

    <div class="contenedor">
        <div class="goBack">
            <a href="{{url()->previous()}}">
                <i class="fas fa-arrow-left"></i>
            </a>
            <span>Opiniones</span>
        </div>
        <div class="opiniones">
            <i class="fas fa-star"></i>
            <p>{{$data['mediaPost']}}/5 - {{$data['numOpiniones']}} opiniones</p>
        </div>

        <hr/>
        <div class="opinions2">
            @foreach($data['opinion'] as $opinion)
                <div class="user">
                    <div class="userInfo">
                        <span>{{$opinion->name}}</span>
                        <div>
                            <a href="{{ route('perfiles', $opinion->id) }}">
                                @if($opinion->profile_image != null)
                                    <img src="{{asset('imagesStored/'.$opinion->profile_image)}}">
                                @else
                                    <img src="{{asset('imagesStored/usuarioDefecto.png')}}">
                                @endif
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="textOpinion">
                        @switch($opinion->punctuation)
                            @case('1')
                                <p>Muy mal</p>
                            @break
                            @case('2')
                                <p>Mal</p>
                            @break
                            @case('3')
                                <p>Regular</p>
                            @break
                            @case('4')
                                <p>Bien</p>
                            @break
                            @case('5')
                                <p>Muy bien</p>
                            @break
                        @endswitch
                        <p>{{$opinion->text}}</p>
                        <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $opinion->created_at)->format('d-m-Y')}}</p>

                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>

@endsection
