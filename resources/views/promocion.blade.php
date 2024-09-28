@include('cabecera/header')

<section class="carusel">
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
</section>

<section class="promociones imagen-fondo">
    
    <div class="container">
        <div class="row">
            <div class="col-12 titulo-promo">
                <h2>Promos</h2>
                <h2>Actuales</h2>
                <hr class="hr-promo">
            </div>
        </div>
    </div>    
        
    <div class="container-fluid grupo-promociones mt-5 ">
        <div class="row">
            <div class="col-md-4 col-12 d-md-flex justify-content-center">
                <div class="card" style="width: 35rem;">
                    <img src="{{asset('img/promo_1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">¡Gana un viaje!</p>
                        <p class="card-text2">01/03/2024</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 d-md-flex justify-content-center">
                <div class="card" style="width: 35rem;">
                    <img src="{{asset('img/promo_2.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">¡Gana un viaje!</p>
                        <p class="card-text2">01/03/2024</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 d-md-flex justify-content-center">
                <div class="card" style="width: 35rem;">
                    <img src="{{asset('img/promo_1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">¡Gana un viaje!</p>
                        <p class="card-text2">01/03/2024</p>
                    </div>
                </div>
            </div>           
        </div>
        <div class="row mt-5 ">
            <div class="col-md-4 col-12 d-md-flex justify-content-center">
                <div class="card" style="width: 35rem;">
                    <img src="{{asset('img/promo_3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">¡Gana un viaje!</p>
                        <p class="card-text2">01/03/2024</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 d-md-flex justify-content-center">
                <div class="card" style="width: 35rem;">
                    <img src="{{asset('img/promo_4.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">¡Gana un viaje!</p>
                        <p class="card-text2">01/03/2024</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 d-md-flex justify-content-center">
                <div class="card" style="width: 35rem;">
                    <img src="{{asset('img/promo_3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">¡Gana un viaje!</p>
                        <p class="card-text2">01/03/2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container position-relative logos-marcas ">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-1"></div>
          <div class="col-md-2">
            <img src="img/marsella.png">
          </div>
          <div class="col-md-2">
            <img src="img/bolivar.png" alt="">
          </div>
          <div class="col-md-2 me-3">
            <img src="img/amaras.png" alt="">
          </div>
          <div class="col-md-2 ms-5">
            <img src="img/dento.png" alt="">
          </div>
          <div class="col-md-2">
            <img src="img/donvittorio.png" alt="">
          </div>
          <div class="col-md-1"></div>
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <img src="img/sombras.png" alt="" class="sombras">
          </div>
        </div>
      </div>
      <div class="imagen-fondo"></div>
  
</section>
