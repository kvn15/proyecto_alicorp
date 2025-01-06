@include('cabecera/header')

@php
    $sliders = App\Models\HomeInicio::all();    
    $promos = App\Models\HomePromociones::all();  
@endphp

@if (empty(Auth::user()->name))    
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
@else
  <section class="heroe-logueado">
    <img src="{{asset('/img/hero1.png')}}" alt="" class="hero-image">
  </section>
@endif
  

  <main class="">
    {{-- <div class="container-fluid">
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

    </div> --}}
    {{-- <section class="promociones">
      <img src="{{asset('/img/promo1.png')}}" alt="" class="hero-image">
    </section> --}}
    
    @if (empty(Auth::user()->name))    
    <section class="promociones">
      <img src="{{asset('/img/promo1.png')}}" alt="" class="hero-image">
    </section>
    @else
    <section class="promociones">
      <img src="{{asset('/img/promo1.png')}}" alt="" class="hero-image">
    </section>

    <section class="exp" style="background-color: red; height:100vh">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Experiencias Únicas</h2>
            <h3><span>!LLEGAMOS MÁS A TI!</span> Conoce los eventos y novedades de nuestras marcas.</h3>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 cards-grupo">
          <div class="col">
            <div class="card">
              <img src="{{asset('img/parti-3.png')}}" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title">K-POP <br> DANCE</BR></h5>
                <button class="btn-open">VER MÁS</button>
                <!-- Modal -->
                <div class="modal" id="customModal">
                  <div class="modal-content">
                    <img src="{{ asset('img/hero1.png')}}" alt="">
                    <div class="d-flex justify-content-around mt-5">
                      <p><i class="fa fa-calendar me-2" aria-hidden="true"></i>18 de Enero</p>
                      <p><i class="fa fa-map-marker me-2" aria-hidden="true"></i>Coliseo Aldo Chumnimune</p>
                    </div>
                    <h2 class="mt-0">Casino K-pop Dance</h2>
                    <p>Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance</p>
                    <button class="btn-close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <div class="mt-4">
                      <button class="btn btn-danger vm">VER MÁS</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="{{asset('img/parti-3.png')}}" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title">K-POP <br> DANCE</BR></h5>
                <button class="btn-open">VER MÁS</button>
                <!-- Modal -->
                <div class="modal" id="customModal">
                  <div class="modal-content">
                    <img src="{{ asset('img/hero1.png')}}" alt="">
                    <div class="d-flex justify-content-around mt-5">
                      <p><i class="fa fa-calendar me-2" aria-hidden="true"></i>18 de Enero</p>
                      <p><i class="fa fa-map-marker me-2" aria-hidden="true"></i>Coliseo Aldo Chumnimune</p>
                    </div>
                    <h2 class="mt-0">Casino K-pop Dance</h2>
                    <p>Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance</p>
                    <button class="btn-close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <div class="mt-4">
                      <button class="btn btn-danger vm">VER MÁS</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="{{asset('img/parti-3.png')}}" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title">K-POP <br> DANCE</BR></h5>
                <button class="btn-open">VER MÁS</button>
                <!-- Modal -->
                <div class="modal" id="customModal">
                  <div class="modal-content">
                    <img src="{{ asset('img/hero1.png')}}" alt="">
                    <div class="d-flex justify-content-around mt-5">
                      <p><i class="fa fa-calendar me-2" aria-hidden="true"></i>18 de Enero</p>
                      <p><i class="fa fa-map-marker me-2" aria-hidden="true"></i>Coliseo Aldo Chumnimune</p>
                    </div>
                    <h2 class="mt-0">Casino K-pop Dance</h2>
                    <p>Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance</p>
                    <button class="btn-close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <div class="mt-4">
                      <button class="btn btn-danger vm">VER MÁS</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="{{asset('img/parti-3.png')}}" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title">K-POP <br> DANCE</BR></h5>
                <button class="btn-open">VER MÁS</button>
                <!-- Modal -->
                <div class="modal" id="customModal">
                  <div class="modal-content">
                    <img src="{{ asset('img/hero1.png')}}" alt="">
                    <div class="d-flex justify-content-around mt-5">
                      <p><i class="fa fa-calendar me-2" aria-hidden="true"></i>18 de Enero</p>
                      <p><i class="fa fa-map-marker me-2" aria-hidden="true"></i>Coliseo Aldo Chumnimune</p>
                    </div>
                    <h2 class="mt-0">Casino K-pop Dance</h2>
                    <p>Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance</p>
                    <button class="btn-close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <div class="mt-4">
                      <button class="btn btn-danger vm">VER MÁS</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="carru-videos" style="height: 100vh">
      <h2>prueba</h2>
      <div class="carousel">
        <button class="arrow left">&lt;</button>
        <div class="carousel-track">
          <!-- Videos duplicados para el efecto infinito -->
          <div class="carousel-item">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" muted></video>
          </div>
          <div class="carousel-item">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" muted></video>
          </div>
          <div class="carousel-item center">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" muted></video>
          </div>
          <div class="carousel-item">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" muted></video>
          </div>
          <div class="carousel-item">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" muted></video>
          </div>
        </div>
        <button class="arrow right">&gt;</button>
    </section>
    @endif
  </main>

  @include('footer')
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('projecto'))
            Swal.fire({
                icon: 'success',
                title: "{{ session('projecto') }}"
            });
        @endif
    });
</script>