<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        /* Definimos los estilos para los clientes de correo */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            color: #ed1b2f;
            font-size: 24px;
            margin: 0;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
        }
        .button {
            display: block;
            max-width: 250px;
            padding: 12px 30px;
            background-color: #ed1b2f;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin: 0 auto;
            margin-top: 20px;
            text-align: center;
        }
        .button:hover {
            background-color: #bd1526;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 30px;
        }
        .footer a {
            color: #ed1b2f;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Encabezado -->
        <div class="header">
            <h1>¡Tu Nueva Contraseña!</h1>
        </div>

        <!-- Cuerpo del correo -->
        <p>Hola, Xplorer <b>{{ $name }}</b></p>
        <p>Hemos recibido una solicitud para restablecer tu contraseña. A continuación, te enviamos la nueva contraseña para acceder a tu cuenta:</p>

        <p><strong>Tu nueva contraseña:</strong></p>
        <p style="font-weight: bold; font-size: 18px; color: #333;">{{ $password }}</p>

        <p>Por favor, ingresa esta contraseña en la página de inicio de sesión. Si no solicitaste un cambio de contraseña, te recomendamos que cambies tu contraseña nuevamente desde la configuración de tu cuenta.</p>

        <a href="{{ route('xplorer.login') }}" class="button">Ir a la página de inicio de sesión</a>

        <!-- Pie de página -->
        <div class="footer">
            <p>&copy; 2025 {{ config('app.name') }}. Todos los derechos reservados.</p>
        </div>
    </div>

</body>
</html>m
