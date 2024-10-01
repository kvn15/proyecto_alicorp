@include('cabecera/header-2')
<section class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                @if (Auth::check())
                    <p class="bienvenido">Hola, {{ Auth::user()->name }}!</p>
                 @endif
            </div>
            <div class="col-4 d-flex flex-column align-content-center justify-content-center btn-config">
                <button class="button button--perfil"><i class="fa fa-cog" aria-hidden="true"></i>
                    <a href="{{route('cliente.configuracion')}}">Configuración</a></button>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row mt-4">
            <div class="col-8 d-md-flex justify-content-md-around justify-content-md-evenly">
                <button class="button button--perfil-2 d-flex align-items-center justify-content-md-around">
                    <div class="d-md-flex align-items-center">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <span class="mx-3">Mis Promos</span>
                    </div>                    
                    <span class="contador">2</span>
                </button>
                <button class="button button--perfil-2 d-flex align-items-center justify-content-md-around">
                    <div class="d-md-flex align-items-center">
                        <i class="fa fa-gamepad" aria-hidden="true"></i>
                        <span class="mx-3">Mis Juegos</span>
                    </div>                    
                    <span class="contador">2</span>
                </button>
                <button class="button button--perfil-2 d-flex align-items-center justify-content-md-around">
                    <div class="d-md-flex align-items-center w-50">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        <span class="mx-3 parti">Participaciones Ganadas</span>
                    </div>                    
                    <span class="contador">1</span>
                </button>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row mt-5 mx-4">
            <div class="col-12 d-md-flex justify-content-between margenT25">
                <div>
                    <h2 class="titulo-resultado">Últimos Resultados</h2>
                    <hr class="hr-result">
                </div>
                <div>
                    <h2 class="sub-titulo-resultado">ver más</h2>
                    <hr class="hr-mas">
                </div>                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4 mt-5 mb-5">
                    <div class="card-horizontal">
                        <div class="p-4">
                            <img src="{{asset('img/ch-1.png')}}" alt="Imagen" class="card-img">
                        </div>
                        
                        <div class="card-content">
                            <h3>¡Ganastes!</h3>
                            <p class="mt-3">A clases con inteligencia</p>
                            <p class="mb-4">15/08/2024</p>
                            <button class="card-btn">Ver ganadores</button>
                        </div>                       

                    </div>
                </div>
                <div class="col-4 mt-5 mb-5">
                    <div class="card-horizontal">
                        <div class="p-4">
                            <img src="{{asset('img/ch-2.png')}}" alt="Imagen" class="card-img">
                        </div>
                        <div class="card-content">
                            <h3 style="color: #979797">¡Ganastes!</h3>
                            <p class="mt-3">A clases con inteligencia</p>
                            <p class="mb-4">15/08/2024</p>
                            <button class="card-btn" style="background-color: #979797">Ver ganadores</button>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-5 mb-5">
                    <div class="card-horizontal">
                        <div class="p-4">
                            <img src="{{asset('img/ch-3.png')}}" alt="Imagen" class="card-img">
                        </div>
                        <div class="card-content">
                            <h3 style="color: #979797">¡Ganastes!</h3>
                            <p class="mt-3">A clases con inteligencia</p>
                            <p class="mb-4">15/08/2024</p>
                            <button class="card-btn" style="background-color: #979797">Ver ganadores</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mx-4">
            <div class="col-12 d-md-flex justify-content-between margenT25">
                <div>
                    <h2 class="titulo-resultado">Mis Participaciones</h2>
                    <hr class="hr-result">
                </div>
                <div>
                    <h2 class="sub-titulo-resultado">ver más</h2>
                    <hr class="hr-mas">
                </div>                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4 mt-5 mb-5">
                    <div class="card h-100 bor">
                        <img src="{{asset('img/ch-1.png')}}" class="paticipaciones card-img-top" alt="..." width="348" height="291">
                        <div class="card-body">
                          <h5 class="card-title">Promo</h5>
                          <p class="card-text">A clases con inteligencia.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Participación: 15/08/2024</small><br>
                            <small class="text-muted">Duración: 01/07/2024 al 31/07/2024</small>
                          </div>
                    </div>              
                </div>
                <div class="col-4 mt-5 mb-5">
                    <div class="card h-100 bor">
                        <img src="{{asset('img/parti-2.png')}}" class="paticipaciones card-img-top" alt="..." width="348" height="291">
                        <div class="card-body">
                          <h5 class="card-title">Juego</h5>
                          <p class="card-text">Raspa y gana con casino.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Participación: 15/08/2024</small><br>
                            <small class="text-muted">Duración: 01/07/2024 al 31/07/2024</small>
                          </div>
                    </div>              
                </div>
                <div class="col-4 mt-5 mb-5">
                    <div class="card h-100 bor">
                        <img src="{{asset('img/parti-3.png')}}" class="paticipaciones card-img-top" alt="..." width="348" height="291">
                        <div class="card-body">
                          <h5 class="card-title">Juego</h5>
                          <p class="card-text">Haz Match y gana a toda hora</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Participación: 15/08/2024</small><br>
                            <small class="text-muted">Duración: 01/07/2024 al 31/07/2024</small>
                          </div>
                    </div>              
                </div>
            </div>
        </div>  

        <div class="row mt-5 mx-4">
            <div class="col-12 d-md-flex justify-content-between margenT25">
                <div>
                    <h2 class="titulo-resultado">Promos</h2>
                    <h2 class="titulo-resultado">Recientes</h2>
                    <hr class="hr-result">
                </div>               
            </div>
            <div class="container mt-5">
                <div class="row promos">
                    <div class="col-1"></div>
                    <div class="col-10 ">
                        <img src="{{asset('img/Rectangle5.png')}}" alt="" class="me-4">
                        <img src="{{asset('img/Rectangle6.png')}}" alt="" class="me-4">
                        <img src="{{asset('img/Rectangle7.png')}}" alt="" class="me-4">
                        <img src="{{asset('img/Rectangle8.png')}}" alt="" class="me-4">
                        <img src="{{asset('img/Rectangle5.png')}}" alt="">
                    </div>
                    <div class="col-1"></div>
                </div>            
            </div>
        </div>

        <div class="row mt-5 mx-4 section-promo">
            <div class="col-12 d-md-flex justify-content-between margenT25">
                <div>
                    <h2 class="titulo-resultado">Juegos</h2>
                    <h2 class="titulo-resultado">Recientes</h2>
                    <hr class="hr-result">
                </div>               
            </div>
            <div class="container mt-5 juegoPromo">
                <div class="row promos">
                    <div class="col-1"></div>
                    <div class="col-10 ">
                        <img src="{{asset('img/Rectangle5.png')}}" alt="" class="me-4">
                        <img src="{{asset('img/Parti-3.png')}}" alt="" class="me-4">
                    </div>
                    <div class="col-1"></div>
                </div>            
            </div>
            <div class="img_back">
                <img src="{{asset('img/imagen_user_back2.png')}}" alt="">
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