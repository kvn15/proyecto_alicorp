@include('cabecera/header')
@php
    $sliders = App\Models\AdminPanel\PromocionesPage::all();    
    $Allcards = App\Models\AdminPanel\PromocionesCard::all();
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
                <img src="{{asset('storage/'.$slide->promociones_slide)}}" class="d-block w-100 " alt="...">
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
            @foreach ($Allcards as $card)
                <div class="col-md-4 col-12 d-md-flex justify-content-center mb-5">
                    <div class="card" style="width: 35rem;">
                        <img src="{{asset('storage/'. $card->image_path)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{$card->text}}</p>
                            <p class="card-text2">{{ Carbon\Carbon::parse($card->event_date)->format('d/m/y') }}</p>
                        </div>
                    </div>
                </div>           
            @endforeach                      
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
