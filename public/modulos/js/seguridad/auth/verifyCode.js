$(document).ready(function () {
    $('#formVerifyCode').on('submit', function (e) {
        e.preventDefault();

        const $form = $(this);
        const url = $form.attr('action');
        const formData = $form.serialize();

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            success: function (response) {
                // Redirige a la vista para cambiar la contraseña
                window.location.href = response.url || '/password/reset';
            },
            error: function (xhr) {
                let mensaje = 'Ocurrió un error inesperado.';
                if (xhr.responseJSON?.errors?.codigo) {
                    mensaje = xhr.responseJSON.errors.codigo[0];
                } else if (xhr.responseJSON?.message) {
                    mensaje = xhr.responseJSON.message;
                }

                mostrarAlerta(mensaje);
            }
        });
    });

    function mostrarAlerta(mensaje, tipo = 'danger') {
        const $alertContainer = $('#alertContainer');
        if ($alertContainer.length) {
            $alertContainer
                .removeClass()
                .addClass(`alert alert-${tipo} mt-3`)
                .text(mensaje);
        } else {
            $('#formVerifyCode').prepend(
                `<div id="alertContainer" class="alert alert-${tipo} mt-3">${mensaje}</div>`
            );
        }
    }
});
