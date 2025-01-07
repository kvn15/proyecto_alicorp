<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/stylesp.css')}}">
    <title>Admin Alicorp - Recuperar Contraseña</title>
</head>
<body>
    <div class="container formulario-login-ali">
        <div class="row">
            <div class="col-6">
                <div class="mt-5 my-5 PRUEBA">
                    <img src="{{asset('img/logo-formulario.png')}}" alt="" class="img-fluid logo" width="259" height="75">
                    <h1>Recuperar Contraseña</h1>
                    <p>Por favor ingresa tus datos para continuar.</p>

                    <!-- Mostrar error de email si existe -->
                    @if (session('mensajeError'))
                    <div class="alert alert-danger">
                        {{ session('mensajeError') }}
                    </div>
                    @endif
                    @if (session('mensajeSuccess'))
                    <div class="alert alert-success">
                        {{ session('mensajeSuccess') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('xplorer.recoverStore') }}" class="login">
                        @csrf
                        <div class="d-flex flex-column mb-2">
                            <label for="email" class="mb-1">Email</label>
                            <input class="w-50 email-i form-control" type="email" name="email" value="{{ old('email') }}" required>
                            <div class="position-relative email" style="top: -30px;">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="d-flex flex-column mt-3">
                            <button type="submit" class="btn btn-primary w-50">Recuperar Contraseña</button>
                            <div class="text-center w-50 mt-3">
                                <a href="{{ route('xplorer.login') }}" class="d-block">Regresar al Login</a>
                            </div>
                        </div>

                    </form>

                    <div class="row mt-5 w-50 derechos">
                        <div class="col-8">
                            <p>Grupo Lucky 2024™ . Todos los derechos reservados</p>
                        </div>
                        <div class="col-4">
                            <p>Necesitas ayuda?</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <img src="{{asset('img/xplorer_login.png')}}" alt="" class="img-fluid">
            </div>
        </div>

    </div>

</body>
</html>
