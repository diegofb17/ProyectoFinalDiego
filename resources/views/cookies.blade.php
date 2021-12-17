@extends('layout')

@section('content')

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
