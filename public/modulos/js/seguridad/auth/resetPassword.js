$(document).ready(function () {
    const codigo = window.location.pathname.split('/').pop(); // último segmento de la URL
    $('#codigoRecuperacion').val(codigo);

    $('#formResetPassword').on('submit', function (e) {
        e.preventDefault();

        const $form = $(this);
        const url = $form.attr('action');
        const data = $form.serialize();

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function (response) {
                mostrarAlerta('Contraseña restablecida correctamente.', 'success');
                setTimeout(function () {
                    window.location.href = response.url || '/login';
                }, 2000);  
            },
            error: function (xhr) {
                let mensaje = 'Ocurrió un error al restablecer la contraseña.';
                if (xhr.responseJSON?.errors?.contrasena) {
                    mensaje = xhr.responseJSON.errors.contrasena[0];
                } else if (xhr.responseJSON?.message) {
                    mensaje = xhr.responseJSON.message;
                }

                mostrarAlerta(mensaje);
            }
        });
    });

    function mostrarAlerta(mensaje, tipo = 'danger') {
        const $alert = $('#alertContainer');
        $alert.html(`<div class="alert alert-${tipo}">${mensaje}</div>`);
    }
});
