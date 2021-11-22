@extends('layout')

@section('content')
    <div class="anadirSticker">
        <form action="{{route('storeSticker')}}"  method="post" enctype="multipart/form-data">
            <div>
                <a href="{{url()->previous()}}"><i class="fas fa-times"></i></a>
                <span>Añade un sitio</span>
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </div>
            <div class="formInputs">
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
                        <textarea id="descripcionSticker" name="descripcionSticker" placeholder="Breve descripción del sitio"></textarea>
                    </div>
                </div>
                <div class="bloqueFormInputs">
                    <div><i class="fas fa-file-alt"></i></div>
                    <div>
                        <span>Categoría*</span>
                        <input type="text" id="categoriaSticker" name="categoriaSticker" placeholder="Categoria">
                        {{--Aqui va un select2--}}
                    </div>
                </div>
                <div class="bloqueFormInputs">
                    <div><i class="fas fa-images"></i></div>
                    <div class="inputFileContainer">
                        {{--Aqui va un drag and drop--}}
                        <div class="custom-input-file">
                            {{--<input type="file" id="imagenes" class="imagenes input-file" multiple="multiple">--}}
                            <input accept="image/*"  id="imagenes" type="file" name="imagenes" class="imagenes input-file" multiple="multiple">
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
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
            maxFilesize: 2 // Tamaño máximo en MB
        };
    </script>
@endsection
