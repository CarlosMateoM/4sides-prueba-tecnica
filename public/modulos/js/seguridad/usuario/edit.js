$(document).ready(function () {
    $('#formUpdateUser').on('submit', function (e) {
        e.preventDefault();
        let formulario = $(this);
        let btnEnviar = formulario.find("button[type='submit']");
        let originalButtonHtml = btnEnviar.html();
        let actionUrl = formulario.attr('action');

        btnEnviar.html('<div class="button-with-icon d-flex justify-content-center"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <p class="button-text">Actualizando...</p></div>');

        $.ajax({
            url: actionUrl,
            method: 'PUT',
            data: formulario.serialize(),
            beforeSend: function () {
                btnEnviar.prop('disabled', true);
                $('#alertContainer').html('');
            },
            success: function (data) {
                if (data.success) {
                    let successHtml = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    $('#alertContainer').html(successHtml);
                    formulario[0].reset();
                } else {
                    btnEnviar.prop('disabled', false).html(originalButtonHtml);
                    mostrarErrores(data.message);
                }
            },
            error: function (jqXHR) {
                btnEnviar.prop('disabled', false).html(originalButtonHtml);
                let errores = jqXHR.responseJSON?.errors || { error: ['Ha ocurrido un error inesperado.'] };
                mostrarErrores(errores);
            }
        });

        function mostrarErrores(errors) {
            let alertHtml = `
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Error" style="width: 1em; height: 1em;">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>`;
            for (let key in errors) {
                if (errors.hasOwnProperty(key)) {
                    alertHtml += `<div>${errors[key]}</div>`;
                }
            }
            alertHtml += '</div></div>';
            $('#alertContainer').html(alertHtml);
        }
    });
});
