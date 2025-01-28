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
    {{-- <img src="{{asset('/img/hero1.png')}}" alt="" class="hero-image"> --}}
    <div class="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="{{asset('/img/hero1.png')}}" alt="Slide 1">
          </div>
          <div class="carousel-item">
              <img src="{{asset('/img/descarga.png')}}" alt="Slide 2">
          </div>
          <div class="carousel-item">
              <img src="{{asset('/img/donvictoriio_hero.png')}}" alt="Slide 3">
          </div>
      </div>
      <button class="prev">Anterior</button>
    <button class="next">Siguiente</button>
  </div>
  
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
          <x-card
          id=1
          image1="img/ali/evento-casino-kpop1.png"
          image2="img/ali/evento-casino-kpop2.png"
          image3="img/ali/casino.jpg"
          image4="img/ali/evento-casino-kpopKeyVisual.png"
          image5="img/ali/MusicNote1.png"
          image6="img/ali/MusicNote2.png"
          title="K-POP DANCE"
          modalImage="img/hero1.png"
          eventDate="18 de Enero"
          eventLocation="Coliseo Aldo Chumnimune"
          modalTitle="Casino K-pop Dance"
          modalDescription="Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance"
        />
         
          <x-card
            id=2
            image1="img/dento/dento-girlNormal.png"
            image2="img/dento/dento-girlHoover.png"
            image3="img/dento/Dento.png"
            image4="img/dento.png"
            image5="img/dento/evento-dentro-LomoSaltado.png"
            image6="img/dento/evento-dentro-Chaufa.png"
            title="Estacion del <br> Buen Diente"
            modalImage="img/hero1.png"
            eventDate="18 de Enero"
            eventLocation="Coliseo Aldo Chumnimune"
            modalTitle="Casino K-pop Dance"
            modalDescription="Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance"
            class="card2"
          />

          <x-card
            id=3
            image1="img/amaras/amarasUniverisdadNormal.png"  
            image2="img/amaras/amaras-universidadHoover.png"
            image3="img/amaras/evento-amaras-flores.png"
            image4="img/amaras/Amaras.png"
            image5="img/amaras/amaras-garrita.png"
            image6="img/amaras/amaras-vasoUnidad.png"
            title="Amaras en <br> Universidades"
            modalImage="img/hero1.png"
            eventDate="18 de Enero"
            eventLocation="Coliseo Aldo Chumnimune"
            modalTitle="Casino K-pop Dance"
            modalDescription="Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance"
            class="card3"
          />

          <x-card
          id=4
          image1="img/victorio/visual totem triangular.png"  
          image2="img/victorio/visual totem triangular.png"
          image3="img/victorio/Pasta-CodoRayado.png"
          image4="img/victorio/LogoVittorio.png"
          image5="img/victorio/Pasta-Spaguetti.png"
          image6="img/victorio/Pasta-Spaguetti.png"
          title="Amaras en <br> Universidades"
          modalImage="img/hero1.png"
          eventDate="18 de Enero"
          eventLocation="Coliseo Aldo Chumnimune"
          modalTitle="Casino K-pop Dance"
          modalDescription="Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance"
          class="card4"
        />
       
        </div>
      </div>
    </section>
    {{-- <section class="carru-videos" style="height: 100vh">
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
    </section> --}}
    @endif
  </main>

  <section class="videos mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex justify-content-end"><P class="trendy">LO MÁS TRENDY</P></div>
        <div class="col-md-6"><p class="trendy-p">!Mantente al día con las últimas tendencias <br> de tus marcas favoritas¡</p></div>
      </div>
    </div>
    
    <div class="row d-flex justify-content-center">
      <div class="carousel-v">
        <button class="carousel-button left">◀</button>
        <div class="carousel-videos">
          <div class="carousel-video">
            <video src="{{ asset('img/videos/video_1.mp4')}}" controls></video>
          </div>
          <div class="carousel-video">
            <video src="{{ asset('img/videos/video_2.mp4')}}" controls></video>
          </div>
          <div class="carousel-video main">
            <video src="{{ asset('img/videos/video_3.mp4')}}" controls></video>
          </div>
        </div>
        <button class="carousel-button right">▶</button>
      </div>
    </div>
    
  </section>

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