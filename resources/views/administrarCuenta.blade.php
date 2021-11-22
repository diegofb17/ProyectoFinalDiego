@extends('layout')

@section('content')
    <div class="administrarCuenta">
        <div>
            <a href="{{url()->previous()}}">
                <i class="fas fa-arrow-left"></i>
            </a>
            <span>Administrar cuenta</span>
        </div>
        <div>
            <div>
                <p>Datos de la cuenta</p>
                <div>
                    <span>Numero de telefono</span>
                    <input type="text" id="telefonoUsuario" value="666 66 66 66">
                </div>

                <input type="text" id="correoUsuario" placeholder="Correo electrónico">
                <span id="changePass" style="cursor: pointer">Contraseña</span>
                <hr>
            </div>
            <div>
                <p>Control de la cuenta</p>
                <a href="#"><span>Eliminar cuenta</span></a>
            </div>
            </div>
    </div>
@endsection

@section('js')
    <script>
        $('#changePass').click(function () {
            Swal.fire({
                title: 'Cambia la contraseña',
                html: `<input type="text" id="oldPassword" class="swal2-input" placeholder="Contraseña">
                        <input type="password" id="newPassword" class="swal2-input" placeholder="Repita la contraseña">`,
                confirmButtonText: 'Cambiar',
                focusConfirm: false,
                preConfirm: () => {
                    const oldPassword = Swal.getPopup().querySelector('#oldPassword').value
                    const newPassword = Swal.getPopup().querySelector('#newPassword').value

                    /*Hay que comprobar que la contraseña antigua sea la antigua de verdad
                    y que la contraseña nueva sea distinta*/
                    if (!oldPassword || !newPassword) {
                        Swal.showValidationMessage(`Error en los datos introducidos`)
                    }else{
                        /*Updatear en base de datos aqui*/
                       var contrasenia="Contraseña cambiada correctamente";
                    }
                    return {oldPassword: oldPassword, newPassword: newPassword, contrasenia:contrasenia}
                }
            }).then((result) => {

                Swal.fire({icon: 'success',
                    text:`${result.value.contrasenia}`.trim()
                })

            })
        });
    </script>
@endsection
