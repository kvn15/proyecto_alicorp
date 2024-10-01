@include('cabecera/header-2')
<section class="configuracion">
    <h2>Hola, {{ Auth::user()->name }}</h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4 config">
                <div class="d-flex flex-column">
                    <div class="datos">
                        <a href="{{ route('cliente.configuracion') }}">
                            <img src="{{ asset('img/Account_circle.png') }}" alt="">
                            <p>Mis Datos</p>
                        </a>
                    </div>
                    <div class="password">
                        <a href="{{ route('cliente.contrasena') }}">
                            <img src="{{ asset('img/configuracion.png') }}" alt="">
                            <p>Cambiar Contraseña</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-8 config-edit">
                <h3>Cambiar Contraseña</h3>
                <hr class="hr-config">

                <form method="POST" action="{{ route('cliente.password.update') }}">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-4 custom-col-4 ">
                            <label for="inputPassword6" class="col-form-label ">Contraseña Actual</label>
                        </div>
                        <div class="col-8">
                            <input type="password" name="oldpassword" class="form-control" id="current_password"
                                placeholder="Current Password">
                            @error('oldpassword')
                                <span class="text-danger">{{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center mt-5">
                        <div class="col-4 custom-col-4 ">
                            <label for="inputPassword6" class="col-form-label ">Nueva Contraseña</label>
                        </div>
                        <div class="col-8">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="New Password">
                            @error('password')
                                <span class="text-danger">{{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center mt-5">
                        <div class="col-4 custom-col-4 ">
                            <label for="inputPassword6" class="col-form-label ">Repetir Contraseña</label>
                        </div>
                        <div class="col-8">
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-9 boton-update">
                            <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<footer class="pie_dashboard">
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-1"></div>
            <div class="col-10 d-md-flex justify-content-evenly align-items-center">

                <p>Síguenos en nuestras redes sociales :</p>

                <div class="col-4 d-flex justify-content-evenly">
                    <img src="{{ asset('img/Vector.png') }}" alt="">
                    <img src="{{ asset('img/instagram-f 1.png') }}" alt="">
                    <img src="{{ asset('img/youtube-round 1.png') }}" alt="">
                    <img src="{{ asset('img/Subtract.png') }}" alt="">
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</footer>
@include('footer')
