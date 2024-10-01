@include('cabecera/header-2')
<section class="configuracion">
   <h2>Hola, {{ Auth::user()->name }}</h2>

   <div class="container-fluid">
    <div class="row">
        <div class="col-4 config">
            <div class="d-flex flex-column">
                <div class="datos">
                    <a href="{{route('cliente.configuracion')}}">
                        <img src="{{asset('img/Account_circle.png')}}" alt="">
                        <p>Mis Datos</p>
                    </a>                    
                </div>
                <div class="password">
                    <a href="{{route('cliente.contrasena')}}">
                        <img src="{{asset('img/configuracion.png')}}" alt="">
                        <p>Cambiar Contraseña</p>
                    </a>                    
                </div>
            </div>
        </div>
        <div class="col-8 config-edit">
            <h3 >Mis Datos</h3>
            <hr class="hr-config">

            <form method="POST" action="{{ route('cliente.update.user') }}" class="form-pill">
                @csrf

                <div class="row align-items-center">
                    <div class="col-4 custom-col-4 ">
                    <label for="inputPassword6" class="col-form-label ">Nombres</label>
                    </div>
                    <div class="col-8">
                    <input type="texto" id="nombres" name="name" class="form-control" value="{{ $user['name'] }}">
                    </div>
                </div>
                {{-- <div class="row align-items-center mt-5">
                    <div class="col-4 custom-col-4 ">
                    <label for="inputPassword6" class="col-form-label ">Apellidos</label>
                    </div>
                    <div class="col-8">
                    <input type="texto" id="apellidos" class="form-control">
                    </div>
                </div> --}}
                <div class="row align-items-center mt-5">
                    <div class="col-4 custom-col-4 ">
                    <label for="inputPassword6" class="col-form-label ">Correo</label>
                    </div>
                    <div class="col-8">
                    <input type="email" id="correo" name="email" class="form-control" value="{{ $user['email'] }}">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-9 boton-update">
                        <button class="btn btn-primary">Actualizar Datos</button>                 
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
                    <img src="{{asset('img/Vector.png')}}" alt="">
                    <img src="{{asset('img/instagram-f 1.png')}}" alt="">
                    <img src="{{asset('img/youtube-round 1.png')}}" alt="">
                    <img src="{{asset('img/Subtract.png')}}" alt="">
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</footer>
@include('footer')