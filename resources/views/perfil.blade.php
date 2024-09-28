@include('cabecera/header-2')

<section class="perfil2">
    <div class="container">
        <div class="row">
            <form method="POST" action="{{ route('login') }}" class="formulario d-flex ">
                @csrf
                <div class="col-md-6">
                    <div class="contact-title">
                        <h2>Hola, </h2>
                        <h3>Bienvenid@</h3>                        
                    </div>                    
                </div>  
                 
                <div class="col-md-6 grupo-inicio">
                    
                    <h2 class="mb-5">Iniciar Sesión</h2>
                        <form  >
                            
                            <div class="mb-3 row align-items-center">
                                <label for="email" class="col-sm-5 nombres">Correo Electrónico</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="password" class="col-sm-5 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password">
                                </div>
                            </div>
                        
                            <div class="mt-5">
                                <button class="btn btn-light">Ingresar</button>
                            </div>
                        

                    <div class="d-flex mt-5 justify-content-between align-item-center">
                        <div>
                            <h3>Ingrese sesion con:  </h3>
                        </div>                        
                        <div class="sesion">
                            <img src="img/buscar.png" alt="">
                            <img src="img/gmail.png" alt="">
                            <img src="img/facebook.png" alt="">
                            <img src="img/logotipo-de-apple.png" alt="">
                        </div>
                    </div>
                    <hr class="mt-3">

                    <div class="reg-perfil mt-4">
                        <p>¿No tienes una cuenta?</p>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-light" >
                            <a href="{{ route('register') }}">Registrate</a>
                        </button>
                    </div>
                    
                    
                </div>
            </form>
            <div class="position-absolute hola-perfil">
                <img src="img/hola.png" alt="" height="450px">
            </div>
        </div>
    </div>
  </section>


  @include('footer')