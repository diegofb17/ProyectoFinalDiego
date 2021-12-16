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
                    <a href="{{route('deletePost',$data['post']['id_post'])}}">
                        <i style="color: #1C60AD;font-size: 1.2rem;margin-right: .5rem" class="fas fa-trash"></i>
                    </a>

                </div>
            </div>
        </div>

        <div class="stickerBody" style="margin-bottom: 6rem;margin-top: 3rem">
            <input type="text" id="nombreStickerEditar" name="nombreStickerEditar" value="{{$data['post']['title']}}">
            <textarea id="descripcionEditar" name="descripcionEditar">{{$data['post']['text']}}</textarea>
            <div class="imagenesSticker">
                @isset($data['images'])
                    @foreach($data['images'] as $image)
                        <img src="{{ asset('imagesStored/'.$image) }}">
                    @endforeach
                @endisset
            </div>
        </div>
        @csrf
        <input type="hidden" id="idPost" name="idPost" value="{{$data['post']['id_post']}}">
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.categorias').select2();
        });
    </script>
@endsection
