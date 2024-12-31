<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/stylesp.css')}}">
    <title>Xplorer Alicorp</title>
</head>
<body>
    <div class="container formulario-login-ali">
        <div class="row">
            <div class="col-6">
                <div class="mt-5 my-5 PRUEBA">
                    <img src="{{asset('img/logo-formulario.png')}}" alt="" class="img-fluid logo" width="259" height="75">
                    <h1>Login</h1>
                    <p>Por favor ingresa tus datos para continuar.</p>
                    @if (session('mensaje'))
                    <div class="alert alert-danger">
                        {{ session('mensaje') }}
                    </div>
                    @endif
                   
                    <form method="POST" action="{{ route('xplorer.login') }}" class="login">
                        @csrf
                        <div class="d-flex flex-column mb-3">
                            <label for="email" class="mb-1">Email</label>
                            <input class="w-50 email-i" type="email" name="email" value="{{ old('email') }}" required>
                            <div class="position-relative email">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>                            
                        </div>

                        <div class="d-flex flex-column mb-3">
                            <label for="password" class="mb-1">Password</label>                          
                            <input type="password" id="password" name="password" required class="w-50 password-i">                           
                            
                            <div class="position-relative lock">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                            <div class="position-relative eye">
                                <button id="togglePassword">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>                                
                            </div>                            
                        </div>
                        <div class="mb-3 checkbox-container">
                            <input type="checkbox" name="remember" checked>
                            <span class="custom-checkbox"></span>
                            Recuardame
                        </div>
                        <div class="d-flex flex-column mt-5">
                            <button type="submit" class="btn btn-primary w-50">Ingresar</button>
                            <div class="text-center w-50 mt-3">
                                <a href="#" >Olvidaste tu contraseña?</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    <script>
        document.getElementById('togglePassword').addEventListener('click', function (e) {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
    
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
    

</body>
</html>
