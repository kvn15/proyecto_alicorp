@include('cabecera/header')

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
            <div class="col-md-6 img-juego-c position-relative">
                <img src="{{ asset('img/juegos/GamerHoover.png') }}" alt="" class="img-fluid position-absolute juego1">
                <img src="{{ asset('img/juegos/3. Coin.png') }}" alt="" class="img-fluid position-absolute juego2">
                <img src="{{ asset('img/juegos/3D Icon Gaming 02.png') }}" alt="" class="img-fluid position-absolute juego3">
                <img src="{{ asset('img/juegos/3D Icon Gaming 08.png') }}" alt="" class="img-fluid position-absolute juego4">
                <img src="{{ asset('img/juegos/3D Icon Gaming 03.png') }}" alt="" class="img-fluid position-absolute juego5">
                <img src="{{ asset('img/juegos/3D Icon Gaming 09.png') }}" alt="" class="img-fluid position-absolute juego6">
                <img src="{{ asset('img/juegos/3. Coin.png') }}" alt="" class="img-fluid position-absolute juego7">
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</section>
<section class="juegos">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card sec-juegos me-4 card-1">
                    <div class="img-transicion">
                        <img src="{{ asset('img/galleta.png') }}" alt="" class="galletex">
                        <img src="{{ asset('img/indice.png') }}" alt="" class="back position-absolute">
                    </div>
                    <div class="card-content">
                        <h1 class="card-title">¡Casino te trae <br> el Raspa y Gana!</h1>
                        <p class="card-subtitle">Este es un subtítulo descriptivo.</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" onclick="window.location.href='{{ route('casino') }}'">JUEGA YA</button>
                    </div>
                </div>
                <div class="card sec-juegos me-4 card-2">
                    <div class="img-transicion">
                        <img src="{{ asset('img/carta.png') }}" alt="" class="carta">
                        <img src="{{ asset('img/carta.png') }}" alt="" class="carta2">
                        <img src="{{ asset('img/carta.png') }}" alt="" class="carta3">
                    </div>
                    <div class="card-content">
                        <h1 class="card-title">Encuentra tu <br> Pasta ideal <br> con Don Vittorio </h1>
                        <p class="card-subtitle">Gana premios para lucirte <br> en la cocina</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" onclick="window.location.href='{{ route('casino') }}'">JUEGA YA</button>
                    </div>
                </div>
                <div class="card sec-juegos me-4 card-3">
                    <div class="img-transicion">
                        <img src="{{ asset('img/ruleta3.png') }}" alt="" class="ruleta">
                    </div>
                    <div class="card-content">
                        <h1 class="card-title">Gira tu melena <br> con Amaras</h1>
                        <p class="card-subtitle">Gana premios para que <br> sigas cuidadno de ti.</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" onclick="window.location.href='{{ route('casino') }}'">JUEGA YA</button>
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
                        <button class="btn btn-danger" onclick="window.location.href='{{ route('casino') }}'">JUEGA YA</button>
                    </div>
                </div>
            </div>           
        </div>
    </div>

</section>

@include('footer')