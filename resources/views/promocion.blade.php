@include('cabecera/header')

<section class="promo1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 grupo-texto-promo">
                <h2 class="animated-text">PROMOCIONES</h2>
                <h3 class="animated-text">¡Tu oportunidad <br> de ganar!</h3>
                <p class="animated-text">Echa un vistazo a las promociones que traemos <br>
                    para ti. ¡No esperes más, descúbrelas y sé parte <br> de ellas!</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center grupo-img-promo">
                <img src="{{ asset('img/promo1_p1.png')}}">
            </div>
        </div>
    </div>
</section>

<section class="promo2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 grupo-texto-promo2 position-relative hidden" id="promo-text">
                <h2 >Gana un viaje al Interior con</h2>
                <img src="{{asset('img/seccion-prmo/Amaras.png')}}" alt="" class="position-absolute img-amaras">
                <h3>Amarás te lleva a los mejores destinos. ¡Solo tienes que jugar!</h3>            
            </div>
            <div class="col-md-6 grupo-img-promo2">
                <img src="{{ asset('img/seccion-prmo/imagen1.png')}}">
                <img src="{{ asset('img/seccion-prmo/avion.png')}}" class="avion-promo2">
                <div class="grupo-shampos">
                    <img src="{{ asset('img/seccion-prmo/shampo.webp')}}" class="shampo1">
                    <img src="{{ asset('img/seccion-prmo/shampo.webp')}}" class="shampo2">
                    <img src="{{ asset('img/seccion-prmo/shampo.webp')}}" class="shampo3">
                    <img src="{{ asset('img/seccion-prmo/shampo.webp')}}" class="shampo4">
                    <img src="{{ asset('img/seccion-prmo/shampo.webp')}}" class="shampo5">
                </div>
                <div class="codigo-barra d-flex align-items-center justify-content-around">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <p>Escanea para <br> participar</p>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </div>
                <div class="codigo-barra2 d-flex align-items-center justify-content-around">
                    <img src="{{ asset('img/seccion-prmo/QR.svg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="promo3" >
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex flex-column justify-content-around bloque1 ">
                <p class="titulo1">Participa con tus galletas favoritas</p>
                <h2>A clases con <br> intelligencia</h2>
                <p class="titulo2">Gana S/.35,000 y gadgets tecnológicos</p>
               
                <div class="codigo-barra d-flex align-items-center justify-content-around">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <p>Escanea para <br> participar</p>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </div>
                <div class="codigo-barra2 d-flex align-items-center justify-content-around">
                    <img src="{{ asset('img/seccion-prmo/QR.svg')}}" alt="" class="img-fluid">
                </div>              
                
            </div>
            
            <div class="col-md-8 position-relative bloque2-i">
                <img src="{{asset('img/seccion-prmo/robot galletas.png')}}" alt="" class="img-fluid position-absolute ig0">
                <img src="{{asset('img/seccion-prmo/InteligenciaAsset1.png')}}" alt="" class="img-fluid position-absolute ig1">
                <img src="{{asset('img/seccion-prmo/InteligenciaAsset2.png')}}" alt="" class="img-fluid position-absolute ig2">
                <img src="{{asset('img/seccion-prmo/InteligenciaAsset3.png')}}" alt="" class="img-fluid position-absolute ig3">
                {{-- <img src="{{asset('img/seccion-prmo/InteligenciaAsset4.png')}}" alt="" class="img-fluid position-absolute ig4"> --}}
                <img src="{{asset('img/seccion-prmo/InteligenciaAsset5.png')}}" alt="" class="img-fluid position-absolute ig5">
                <img src="{{asset('img/seccion-prmo/InteligenciaAsset6.png')}}" alt="" class="img-fluid position-absolute ig6">
                <img src="{{asset('img/seccion-prmo/InteligenciaAsset7.png')}}" alt="" class="img-fluid position-absolute ig7">
                <img src="{{asset('img/seccion-prmo/InteligenciaAsset8.png')}}" alt="" class="img-fluid position-absolute ig8">
                <img src="{{asset('img/seccion-prmo/InteligenciaAsset9.png')}}" alt="" class="img-fluid position-absolute ig9">
            </div>
        </div>
    </div>
</section>

@include('footer')