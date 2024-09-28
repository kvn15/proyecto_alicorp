
@include('cabecera/header-2')

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
                    <button class="button button--perfil-2">Haz match y gana</button>
                    <img src="{{asset('img/juego3.png')}}" alt="" >
                </div>
                
                <div>
                    <button class="button button--perfil-2">Raspa y Gang</button>
                    <img src="{{asset('img/juego2.png')}}" alt="" >
                </div>
                
                <div>
                    <button class="button button--perfil-2">Ruleta Casino</button>
                    <img src="{{asset('img/juego1.png')}}" alt="" >
                </div>                
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</section>

