@include('cabecera/header')

<section class="promo1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 grupo-texto-promo">
                <h2 >PROMOCIONES</h2>
                <h3>¡Tu oportunidad <br> de ganar!</h3>
                <p>Echa un vistazo a las promociones que traemos <br>
                    para ti. ¡No esperes más, descúbrelas y sé parte <br> de ellas!</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center grupo-img-promo">
                <img src="{{ asset('img/promo1_p1.png')}}">
            </div>
        </div>
    </div>
</section>

{{-- <section class="promo2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 grupo-texto-promo2">
                <h2 >Gana un viaje al Interior con</h2>
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
                
            </div>
        </div>
    </div>
</section> --}}

<section class="promociones">
    {{-- <img src="{{asset('/img/promo1.png')}}" alt="" class="hero-image"> --}}
    <img src="{{asset('/img/promo2.png')}}" alt="" class="hero-image">
    <img src="{{asset('/img/promo3.png')}}" alt="" class="hero-image">
</section>
@include('footer')