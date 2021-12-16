@extends('layout')

@section('content')
    <div class="configuracion">
        <div>
            <p>Ajustes y privacidad</p>
        </div>
        <div class="bloqueConfiguracion">
            <p>CUENTA</p>
            <div>
                <i class="far fa-user"></i>
                <a href="{{route('administrarCuenta')}}">
                    <span>Administrar cuenta</span>
                </a>
            </div>
            <div class="compartirPerfil">
                <i class="far fa-share-square"></i>
                {{--Pop up en la pantalla indicando que se ha copiado el enlace--}}
                <div data-role="main">
                    <a href="#myPopup" data-rel="popup">
                        <span id="clickToCopy" style="cursor: pointer">Compartir perfil</span>
                    </a>
                </div>
                {{--input hidden con el enlace a copiar--}}
                <input id="compartirPerfil" type="hidden" value="Copiando">
            </div>
        </div>
        <hr/>
        <div class="bloqueConfiguracion">
            <p>INICIAR SESIÓN</p>
            <div>
                <i class="fas fa-exchange-alt"></i>
                <span>Cambiar de cuenta</span>
            </div>
            <div>
                <i class="fas fa-sign-out-alt"></i>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <span>Cerrar sesión</span>
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#clickToCopy').click(function () {
                document.getElementById('compartirPerfil').value = 'http://rincono.herokuapp.com/perfiles/'+{{auth()->user()->id}};
                // Crea un campo de texto "oculto"
                var aux = document.createElement("input");

                // Asigna el contenido del elemento especificado al valor del campo
                aux.setAttribute("value", document.getElementById('compartirPerfil').value);

                // Añade el campo a la página
                document.body.appendChild(aux);

                // Selecciona el contenido del campo
                aux.select();

                // Copia el texto seleccionado
                document.execCommand("copy");

                // Elimina el campo de la página
                document.body.removeChild(aux);

                Swal.fire({
                    title: '¡Perfil copiado!',
                    text: 'Comparte el perfil con tus amigos',
                    icon: 'success',
                    confirmButtonText: 'Vamos!'
                })
            });
        });
    </script>
@endsection
