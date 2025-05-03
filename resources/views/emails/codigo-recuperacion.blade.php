<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código de recuperación</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 40px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" style="background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td>
                            <h2 style="color:rgb(12, 28, 73); text-align: center;">Recuperación de contraseña</h2>
                            <p>Hola,</p>
                            <p>Tu código de recuperación es:</p>
                            <p style="font-size: 24px; font-weight: bold; color: #111827; text-align: center; margin: 20px 0;">
                                {{ $codigo }}
                            </p>
                            <p>Ingresa este código en el formulario para restablecer tu contraseña.</p>
                            <p style="color: #6b7280;font-size:small">Si no solicitaste esta recuperación, puedes ignorar este correo.</p>
                            <br>
                            <p>Atentamente,<br>El equipo de soporte</p>
                        </td>
                    </tr>
                </table>
                <p style="color: #9ca3af; font-size: 12px; text-align: center; margin-top: 20px;">
                    &copy; {{ date('Y') }} . Todos los derechos reservados.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
