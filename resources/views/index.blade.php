@include('cabecera/header')

{{-- {{Auth::check() }}
{{Auth::user()->role}} --}}
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
  <main class="bloque2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 position-relative gap-5">
          <div class="promociones">
            <p class="p1">Promos en</p>
            <p class="p2">redes sociales</p>
            <hr>
          </div>
        </div>
        <div class="col-lg-12 separador">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 justify-content-center">
          <div class="owl-carousel owl-theme owl-loaded">
            <div class="owl-stage-outer">
              <div class="owl-stage">
                <div class="owl-item"><img src="img/IMG_0683.PNG" height="250px"></div>
                <div class="owl-item"><img src="img/IMG_0684.PNG" height="250px" alt=""></div>
                <div class="owl-item"><img src="img/IMG_0683.PNG" height="250px"></div>
                <div class="owl-item"><img src="img/IMG_0684.PNG" height="250px" alt=""></div>
                <div class="owl-item"><img src="img/IMG_0683.PNG" height="250px"></div>
                <div class="owl-item"><img src="img/IMG_0684.PNG" height="250px" alt=""></div>
                <div class="owl-item"><img src="img/IMG_0684.PNG" height="250px" alt=""></div>
              </div>
              <div class="owl-nav position-relative botones">
                <div class="owl-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                <div class="owl-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container position-relative logos-marcas">
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

    </div>
  </main>

  @include('footer')
  