@include('cabecera/header')

@php
    $sliders = App\Models\HomeInicio::all();    
    $promos = App\Models\HomePromociones::all();  
@endphp

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
        @foreach ($sliders as  $key=> $slide)            
            <div class="carousel-item {{$key == 0 ? 'active':''}}">
              <img src="{{asset('storage/'.$slide->home_slide)}}" class="d-block w-100 " alt="...">
            </div>
        @endforeach
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
                @foreach ($promos as $promo)
                <div class="owl-item"><img src="{{asset('storage/'.$promo->home_promos)}}" height="250px"></div>
                @endforeach
              </div>
              {{-- <div class="owl-nav position-relative botones">
                <div class="owl-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                <div class="owl-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>

      <div class="container position-relative logos-marcas mt-5">
        <div class="row justify-content-md-center align-items-md-center">
          <div class="col-md-1"></div>
          <div class="col-md-2 col-xs-12">
            <img src="img/marsella.png">
          </div>
          <div class="col-md-2 col-sm-6">
            <img src="img/bolivar.png" alt="">
          </div>
          <div class="col-md-2 col-sm-6 me-3">
            <img src="img/amaras.png" alt="">
          </div>
          <div class="col-md-2 col-sm-6 ms-5">
            <img src="img/dento.png" alt="">
          </div>
          <div class="col-md-2 col-sm-6">
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
  