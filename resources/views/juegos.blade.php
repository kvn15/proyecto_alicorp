
@include('cabecera/header-2')

@php

    //$dominio = App\Models\Project::where('dominio', $hub)->where('status', 1)->where('game_id', 1)->first();   
    //$Allcards = App\Models\AdminPanel\PromocionesCard::all();
@endphp

{{-- <section class="juegos">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">            
                <div class="bloque-1">
                    <h2 class="titulo-juego">Juegos</h2>
                    <hr class="hr-juego">
                </div>
            </div>
        </div>
        <div class="row separador-juegos">
            <div class="col-1"></div>
            <div class="col-10 juego-card">
                <div>
                    <a href="http://proyecto_alicorp.test/juegoWeb/game_memoria/{{$memoria->dominio}}">
                        <button class="button button--perfil-2">Haz match y gana</button>
                    </a>                    
                    <img src="{{asset('img/juego3.png')}}" alt="" >
                </div>
                
                <div>                   
                    <a href="http://proyecto_alicorp.test/juegoWeb/game_raspa_gana/{{$raspa->dominio}}">
                        <button class="button button--perfil-2">Raspa y Gana</button>
                    </a>                                                         
                    <img src="{{asset('img/juego2.png')}}" alt="" >
                </div>
                
                <div>
                    <a href="http://proyecto_alicorp.test/juegoWeb/ruleta/{{$ruleta->dominio}}">
                        <button class="button button--perfil-2">Ruleta Casino</button>
                    </a>                    
                    <img src="{{asset('img/juego1.png')}}" alt="" >
                </div>                
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</section> --}}

<section class="juego">
<div class="container">
    <div class="row">
        <div class="col-md-6 titulo-2">
            <h2>Momentos divertidos</h2>
            <h3>Despierta <br> La diversión!</h3>
            <p>Juéganos con tus marcas favoritas y gana <br> premios Increíbles.</p>
        </div>
        <div class="col-md-6 img-juego-c">
            <img src="{{asset('img/juegos-img.png')}}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row">
        
    </div>
</div>
</section>
<section class="juegos">
    <div class="container">
        <div class="row">
            <div class="card sec-juegos me-4">
                <div class="img-transicion">
                    <img src="{{ asset('img/galleta.png') }}" alt="" class="galletex">
                    <img src="{{ asset('img/indice.png') }}" alt="" class="back position-absolute">
                </div>
                <div class="card-content">
                  <h1 class="card-title">¡Casino te trae <br> el Raspa y Gana!</h1>
                  <p class="card-subtitle">Este es un subtítulo descriptivo.</p>
                </div>
                <div class="card-footer">
                  <button class="btn btn-danger">JUEGA YA</button>
                </div>
            </div>
            <div class="card sec-juegos me-4">
                <div class="img-transicion">
                    <img src="{{ asset('img/galleta.png') }}" alt="" class="galletex">
                    <img src="{{ asset('img/indice.png') }}" alt="" class="back position-absolute">
                </div>
                <div class="card-content">
                  <h1 class="card-title">¡Casino te trae <br> el Raspa y Gana!</h1>
                  <p class="card-subtitle">Este es un subtítulo descriptivo.</p>
                </div>
                <div class="card-footer">
                  <button class="btn btn-danger">JUEGA YA</button>
                </div>
            </div>
            <div class="card sec-juegos me-4 card-3">
                <div class="img-transicion">
                    <img src="{{ asset('img/ruleta2.png') }}" alt="" class="ruleta">
                </div>
                <div class="card-content">
                  <h1 class="card-title">Gira tu melena <br> con Amaras</h1>
                  <p class="card-subtitle">Gana premios para que <br> sigas cuidadno de ti.</p>
                </div>
                <div class="card-footer">
                  <button class="btn btn-danger">JUEGA YA</button>
                </div>
            </div>
            <div class="card sec-juegos me-4">
                <div class="img-transicion">
                    <img src="{{ asset('img/galleta.png') }}" alt="" class="galletex">
                    <img src="{{ asset('img/indice.png') }}" alt="" class="back position-absolute">
                </div>
                <div class="card-content">
                  <h1 class="card-title">¡Casino te trae <br> el Raspa y Gana!</h1>
                  <p class="card-subtitle">Este es un subtítulo descriptivo.</p>
                </div>
                <div class="card-footer">
                  <button class="btn btn-danger">JUEGA YA</button>
                </div>
            </div>  
        </div>
    </div>
   
</section>