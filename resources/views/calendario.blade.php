@include('cabecera.header-2')
<section class="calendario">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 ">
                <div class="d-flex justify-content-end">
                    <div class="buscar-btn">
                        <input class="search-btn ">
                    </div>                    
                    <div class="ico-buscar">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <div class="ico-salir">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>                    
                </div>                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="carusel">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/fondo.png" class="d-block w-100 " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/carru1.jpg" class="d-block w-100 " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/mano.png" class="d-block w-100 " alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>        
    </div>
    
<div class="container">
    <div class="row">
        <div class="imagen-fondo">            
            <div class="container-fluid grupo-promociones mt-5 mb-5 ">
                <div class="row">
                    <div class="col-md-3 col-12 d-md-flex justify-content-center">
                        <div class="card calen-card" style="width: 35rem;">
                            <img src="{{asset('img/promo_1.png')}}" class="card-img-top imagen-oscura" alt="...">
                            <div class="card-body">
                                <p class="card-text">¡Ganate S/.1000 con Aval!</p>
                                <div class="calendario-fecha">
                                    <p class="card-text2">SEP</p>
                                    <p class="card-text2">30</p>
                                </div>                                
                            </div>
                            <div class="botn-calendario mb-4">
                                <button class="btn-card-cal">Supermercados</button>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-3 col-12 d-md-flex justify-content-center">
                        <div class="card calen-card" style="width: 35rem;">
                            <img src="{{asset('img/promo_1.png')}}" class="card-img-top imagen-oscura" alt="...">
                            <div class="card-body">
                                <p class="card-text">¡Ganate S/.1000 con Aval!</p>
                                <div class="calendario-fecha">
                                    <p class="card-text2">SEP</p>
                                    <p class="card-text2">30</p>
                                </div>                                
                            </div>
                            <div class="botn-calendario mb-4">
                                <button class="btn-card-cal">Supermercados</button>
                            </div>                            
                        </div>
                    </div>

                    <div class="col-md-3 col-12 d-md-flex justify-content-center">
                        <div class="card calen-card" style="width: 35rem;">
                            <img src="{{asset('img/promo_1.png')}}" class="card-img-top imagen-oscura" alt="...">
                            <div class="card-body">
                                <p class="card-text">¡Ganate S/.1000 con Aval!</p>
                                <div class="calendario-fecha">
                                    <p class="card-text2">SEP</p>
                                    <p class="card-text2">30</p>
                                </div>                                
                            </div>
                            <div class="botn-calendario mb-4">
                                <button class="btn-card-cal">Supermercados</button>
                            </div>                            
                        </div>
                    </div>

                    <div class="col-md-3 col-12 d-md-flex justify-content-center">
                        <div class="card calen-card" style="width: 35rem;">
                            <img src="{{asset('img/promo_1.png')}}" class="card-img-top imagen-oscura" alt="...">
                            <div class="card-body">
                                <p class="card-text">¡Ganate S/.1000 con Aval!</p>
                                <div class="calendario-fecha">
                                    <p class="card-text2">SEP</p>
                                    <p class="card-text2">30</p>
                                </div>                                
                            </div>
                            <div class="botn-calendario mb-4">
                                <button class="btn-card-cal">Supermercados</button>
                            </div>                            
                        </div>
                    </div>
                    
                </div>
                <div class="row mt-5 ">
                    <div class="col-md-3 col-12 d-md-flex justify-content-center">
                        <div class="card calen-card" style="width: 35rem;">
                            <img src="{{asset('img/promo_1.png')}}" class="card-img-top imagen-oscura" alt="...">
                            <div class="card-body">
                                <p class="card-text">¡Ganate S/.1000 con Aval!</p>
                                <div class="calendario-fecha">
                                    <p class="card-text2">SEP</p>
                                    <p class="card-text2">30</p>
                                </div>                                
                            </div>
                            <div class="botn-calendario mb-4">
                                <button class="btn-card-cal">Supermercados</button>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-3 col-12 d-md-flex justify-content-center">
                        <div class="card calen-card" style="width: 35rem;">
                            <img src="{{asset('img/promo_1.png')}}" class="card-img-top imagen-oscura" alt="...">
                            <div class="card-body">
                                <p class="card-text">¡Ganate S/.1000 con Aval!</p>
                                <div class="calendario-fecha">
                                    <p class="card-text2">SEP</p>
                                    <p class="card-text2">30</p>
                                </div>                                
                            </div>
                            <div class="botn-calendario mb-4">
                                <button class="btn-card-cal">Supermercados</button>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-3 col-12 d-md-flex justify-content-center">
                        <div class="card calen-card" style="width: 35rem;">
                            <img src="{{asset('img/promo_1.png')}}" class="card-img-top imagen-oscura" alt="...">
                            <div class="card-body">
                                <p class="card-text">¡Ganate S/.1000 con Aval!</p>
                                <div class="calendario-fecha">
                                    <p class="card-text2">SEP</p>
                                    <p class="card-text2">30</p>
                                </div>                                
                            </div>
                            <div class="botn-calendario mb-4">
                                <button class="btn-card-cal">Supermercados</button>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-3 col-12 d-md-flex justify-content-center">
                        <div class="card calen-card" style="width: 35rem;">
                            <img src="{{asset('img/promo_1.png')}}" class="card-img-top imagen-oscura" alt="...">
                            <div class="card-body">
                                <p class="card-text">¡Ganate S/.1000 con Aval!</p>
                                <div class="calendario-fecha">
                                    <p class="card-text2">SEP</p>
                                    <p class="card-text2">30</p>
                                </div>                                
                            </div>
                            <div class="botn-calendario mb-4">
                                <button class="btn-card-cal">Supermercados</button>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</div>
    
</section>
