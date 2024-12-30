@include('cabecera/header-2')

<section class="perfil2">
    <div class="container">
        <div class="row">
            <form method="POST" action="{{ route('login') }}" class="formulario d-flex flex-column">
                @csrf
                <div class="col-md-12">
                    <div class="contact-title">
                        <h2>Bienvenido de regreso </h2>
                        <h3>Ingresa a tu cuenta</h3>
                    </div>
                </div>

                <div class="col-md-12 grupo-inicio">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-3 input-group">                     
                        <input class="linea_input" type="email" id="email" name="email" required autofocus placeholder="Correo Electrónico">                        
                    </div>

                    <div class="mb-4 input-group">
                        <input class="linea_input" type="password" name="password" id="password" required
                                autocomplete="current-password" placeholder="Password">
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                        </div>
    
                        <div class="mb-3">
                            <button class="btn btn-light forget_pass">Olvide mi contraseña</button>
                        </div>
                    </div>

                    
                    <div class="d-flex align-items-center justify-content-around btn_login">
                        <div class="mt-3">
                            <button class="ing btn btn-light ">Ingresar</button>
                        </div>
                        
                        <div class="mt-3">
                            <button class=" reg btn btn-light">
                                <a href="{{ route('register') }}">Registrate</a>
                            </button>
                        </div>
                    </div>
                 

                    <div class="d-flex flex-column mt-5 justify-content-between align-item-center redes_login">
                        <div>
                            <h3 class="">También puedes ingresar con:</h3>
                        </div>
                        <div class="sesion d-flex justify-content-around mt-5">
                            <img src="img/logotipo-de-apple.png" alt="">
                            <img src="img/buscar.png" alt="">
                            <img src="img/facebook.png" alt="">
                            
                        </div>
                    </div>
                    
                    
                </div>
        </div>
    </div>
</section>


@include('footer')
