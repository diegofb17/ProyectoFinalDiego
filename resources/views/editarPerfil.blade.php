@extends('layout')

@section('content')
    <div class="editarPerfil">
        <form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
            <div>
                <a href="{{route('perfiles')}}">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <span>Editar perfil</span>
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </div>
            <div>
                <i class="camarita fas fa-image"></i>
                <img src="{{asset('imagesStored/'.$data['profile_image'])}}">
                <label for="imagenPerfil" class="imagenPerfil">Cambiar foto</label>
                <input style="visibility: hidden" accept="image/*" id="imagenPerfil" type="file" name="imagenPerfil" class="imagenes input-file">
            </div>
            <div>
                <div>
                    <span>Nombre</span>
                    <div>
                        <input name="newNameUser" type="text" maxlength="20" value="{{isset($data['name']) ? $data['name'] : 'Nombre'}}" class="nombreUserEditarPerfil" id="nombreUserEditarPerfil">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span>Apellidos</span>
                    <div>
                        <input name="newLastNameUser" type="text" maxlength="50" value="{{isset($data['last_name']) ? $data['last_name'] : 'Apellido'}}" class="apellidoUserEditarPerfil" id="apellidoUserEditarPerfil">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span>Nombre de usuario</span>
                    <div>
                        <input name="newUser" type="text" maxlength="20" value="{{isset($data['user_aka']) ? $data['user_aka'] : 'Usuario'}}" class="usuarioUserEditarPerfil" id="usuarioUserEditarPerfil">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <hr/>
                <div>
                    <span>Instagram</span>
                    <div>
                        <input name="newInstagramName" type="text" maxlength="20" value="{{isset($data['instagram_user']) ? $data['instagram_user'] : 'Instagram'}}" class="instagramUserEditarPerfil" id="instagramUserEditarPerfil">
                        <i class="fas fa-chevron-right"></i>
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
