@extends('layout')

@section('content')
    <div class="editarPerfil">
        <form id="editarPerfilSubmit" action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
            <div>
                <a href="{{route('perfiles',$data['id'])}}">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <span>Editar perfil</span>
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </div>
            <div>
                <i class="camarita fas fa-image"></i>
                @if($data['profile_image']!=null)
                    <img src="{{asset('imagesStored/'.$data['profile_image'])}}">
                @else
                    <img src="{{asset('imagesStored/usuarioDefecto.png')}}">
                @endif
                <label for="imagenPerfil" class="imagenPerfil">Cambiar foto</label>
                <input style="visibility: hidden" accept="image/*" id="imagenPerfil" type="file" name="imagenPerfil" class="imagenes input-file">
            </div>
            <div>
                <div>
                    <span>Nombre</span>
                    <div>
                        <input style="color: #1C60AD" name="newNameUser" type="text" maxlength="20" value="{{isset($data['name']) ? $data['name'] : 'Nombre'}}" class="nombreUserEditarPerfil" id="nombreUserEditarPerfil">
                        <i id="submitForm" style="cursor:pointer" class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span>Apellidos</span>
                    <div>
                        <input style="color: #1C60AD" name="newLastNameUser" type="text" maxlength="50" value="{{isset($data['last_name']) ? $data['last_name'] : 'Apellido'}}" class="apellidoUserEditarPerfil" id="apellidoUserEditarPerfil">
                        <i id="submitForm" style="cursor:pointer" class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span>Nombre de usuario</span>
                    <div>
                        <input style="color: #1C60AD" name="newUser" type="text" maxlength="20" value="{{isset($data['user_aka']) ? $data['user_aka'] : 'Usuario'}}" class="usuarioUserEditarPerfil" id="usuarioUserEditarPerfil">
                        <i id="submitForm" style="cursor:pointer" class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <hr/>
                <div>
                    <span>Instagram</span>
                    <div>
                        <input style="color: #1C60AD" name="newInstagramName" type="text" maxlength="20" value="{{isset($data['instagram_user']) ? $data['instagram_user'] : 'Instagram'}}" class="instagramUserEditarPerfil" id="instagramUserEditarPerfil">
                        <i id="submitForm" style="cursor:pointer" class="fas fa-chevron-right"></i>
                    </div>
                </div>
                @if(isset($errors) && count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        Imagen no permitida/Campos vacíos*
                    </div>
                @endif
                @if(isset($modificado) && $modificado)
                    <div class="alert alert-success" role="alert">
                        Datos modificados correctamente!
                    </div>
                @endif
            </div>
            @csrf
        </form>
    </div>
@endsection

@section('js')
    <script>
        $('#submitForm').click(function() {
            $("#editarPerfilSubmit").submit();
        });
    </script>
@endsection
