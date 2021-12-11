@extends('layout')

@section('content')
    <div class="anadirSticker">
        <form action="{{route('storeSticker')}}" method="post" enctype="multipart/form-data">
            <div>
                <a href="{{url()->previous()}}"><i class="fas fa-times"></i></a>
                <span>Añade un sitio</span>
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </div>

            <div class="formInputs">
                @if(isset($errors) && count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        Hay uno o más campos vacíos*
                    </div>
                @endif

                <div class="bloqueFormInputs">
                    <div><i class="fas fa-file-signature"></i></div>
                    <div>
                        <span>Nombre*</span>
                        <input type="text" id="nombreSticker" name="nombreSticker" placeholder="Nombre del sitio">
                    </div>
                </div>
                <div class="bloqueFormInputs">
                    <div><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <span>Dirección*</span>
                        <input type="text" id="direccionSticker" name="direccionSticker" placeholder="Direccion del sitio">
                        {{--Aqui va el mapa para la direccion--}}
                    </div>
                </div>
                <div class="bloqueFormInputs">
                    <div><i class="fas fa-shapes"></i></div>
                    <div>
                        <span>Descripcion*</span>
                        <textarea id="descripcionSticker" name="descripcionSticker" placeholder="Breve descripción del sitio" maxlength="500" minlength="20"></textarea>
                    </div>
                </div>
                <div class="bloqueFormInputs">
                    <div><i class="fas fa-file-alt"></i></div>
                    <div>
                        <span id="categoriaSelect">Categoría*</span>
                        {{--Aqui va un select2--}}
                        <select class="categorias" name="categoriaSticker">
                            @foreach($data['categorias'] as $key => $categoria)
                            <option value="{{$key}}">{{$categoria}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="bloqueFormInputs">
                    <div><i class="fas fa-images"></i></div>
                    <div class="inputFileContainer">
                        <div class="custom-input-file">
                            <input accept="image/*"  id="imagenes" type="file" name="imagenes[]" class="imagenes input-file" multiple="multiple">
                            <i class="fas fa-download"></i><br/>Choose a file
                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.categorias').select2();
        });
    </script>
@endsection
