$(document).ready(function () {
    
    $('#imagen').on('change', function (event) {
        const input = event.target;
    
        const previewContainer = $('#preview-container');
        const noImageText = $('#no-image-text');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                let imgTag = $('#preview-image');
                if (imgTag.length === 0) {
                    imgTag = $('<img>', {
                        id: 'preview-image',
                        class: 'img-thumbnail',
                        style: 'max-height: 200px;'
                    });
                    previewContainer.html(imgTag);
                }
                imgTag.attr('src', e.target.result);
                if (noImageText.length) noImageText.remove();
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    // AJAX para subir la imagen
    $('#formImageUpdate').on('submit', function (e) {
        e.preventDefault();

        const formulario = $(this);
        const btnEnviar = formulario.find("button[type='submit']");
        const originalButtonHtml = btnEnviar.html();
        const alertContainer = formulario.find('.alert-container');

        const formData = new FormData(this);

        btnEnviar.html('<div class="d-flex justify-content-center"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="ms-2">Actualizando...</span></div>').prop('disabled', true);

        $.ajax({
            url: formulario.attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                btnEnviar.prop('disabled', false).html(originalButtonHtml);

                if (data.success) {
                    alertContainer.html('<div class="alert alert-success">Imagen actualizada correctamente.</div>');
                } else {
                    mostrarErrores(alertContainer, data.message);
                }
            },
            error: function (jqXHR, textStatus) {
                btnEnviar.prop('disabled', false).html(originalButtonHtml);
                mostrarErrores(alertContainer, {
                    general: ['Ocurrió un error inesperado al subir la imagen.']
                });
            }
        });
    });

    function mostrarErrores(container, mensajes) {
        if (!container.length) return;

        let alertHtml = `<div class="alert alert-danger"><ul>`;
        for (let key in mensajes) {
            if (mensajes.hasOwnProperty(key)) {
                alertHtml += `<li>${mensajes[key].join(', ')}</li>`;
            }
        }
        alertHtml += `</ul></div>`;
        container.html(alertHtml);
    }
});
