@extends('layout')

@section('content')
    @foreach($data['posts'] as $post)
        <a href="{{ route("stickerAbierto",$post->id_post) }}">
            <div class="sticker" style="background-image: url('imagesStored/{{$post->picture}}');background-size: cover;">
                <div>
                    <p>{{$post->title}}</p>
                </div>
                <div>
                    <h5>{{$post->name}}</h5>
                </div>
            </div>
        </a>
    @endforeach
@endsection
