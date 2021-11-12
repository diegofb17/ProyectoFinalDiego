@extends('layout')

@section('content')
    <div class="editarPerfil">
        <div>
            <a href="{{url()->previous()}}">
                <i class="fas fa-arrow-left"></i>
            </a>
            <span>Editar perfil</span>
        </div>
        <div>
            <i class="camarita fas fa-image"></i>
            <img src="images/foto_usuario.jfif">
            <p>Cambiar foto</p>
        </div>
        <div>
            <div>
                <span>Nombre</span>
                <div>
                    <input type="text" maxlength="20" value="nombre" class="nombreUserEditarPerfil" id="nombreUserEditarPerfil">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div>
                <span>Apellidos</span>
                <div>
                    <input type="text" maxlength="50" value="apellido" class="apellidoUserEditarPerfil" id="apellidoUserEditarPerfil">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div>
                <span>Nombre de usuario</span>
                <div>
                    <input type="text" maxlength="20" value="usuario" class="usuarioUserEditarPerfil" id="usuarioUserEditarPerfil">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <hr/>
            <div>
                <span>Instagram</span>
                <div>
                    <input type="text" maxlength="20" value="instagram" class="instagramUserEditarPerfil" id="instagramUserEditarPerfil">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
