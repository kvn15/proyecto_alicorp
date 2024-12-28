<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso de Aceptación de Términos y Condiciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            background-color: #ed1b2f;
            color: white;
            padding: 15px 0;
            border-radius: 8px 8px 0 0;
        }
        .content {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
            color: #777;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ed1b2f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #c41c2c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Notificación de Aceptación de Términos y Condiciones</h1>
        </div>
        
        <div class="content">
            <p>Estimado/a Administrador/a,</p>
            
            <p>Nos complace informarte que <b>{{ $nombre }} {{ $apellido }}</b> con Nro. de documento <b>{{ $documento }}</b> ha aceptado los Términos y Condiciones en <b>{{ $nameJuego }} - {{ $tipoJuego }}</b>. A continuación, se encuentran los detalles:</p>

            <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Telefono</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $telefono }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Correo</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $correo }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Fecha de Aceptación</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $fecha }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">N° de LOTE ingresado</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $codigo }}</td>
                </tr>
            </table>

            <p>Por favor, revisa estos detalles y asegúrate de que todo esté en orden.</p>
        </div>

        <div class="footer">
            <p>Este correo fue enviado automáticamente. No es necesario responder a este mensaje.</p>
        </div>
    </div>
</body>
</html>
