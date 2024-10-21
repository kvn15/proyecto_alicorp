
@include('cabecera/header-2')

@php

    //$dominio = App\Models\Project::where('dominio', $hub)->where('status', 1)->where('game_id', 1)->first();   
    //$Allcards = App\Models\AdminPanel\PromocionesCard::all();
@endphp

<section class="juegos">
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
                    <a href="#">
                        <button class="button button--perfil-2">Haz match y gana</button>
                    </a>                    
                    <img src="{{asset('img/juego3.png')}}" alt="" >
                </div>
                
                <div>
                    <a href="{{route('juegoWeb.juego.view.raspagana/')}}">
                        <button class="button button--perfil-2">Raspa y Gana</button>
                    </a>                    
                    <img src="{{asset('img/juego2.png')}}" alt="" >
                </div>
                
                <div>
                    <a href="#">
                        <button class="button button--perfil-2">Ruleta Casino</button>
                    </a>                    
                    <img src="{{asset('img/juego1.png')}}" alt="" >
                </div>                
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</section>

