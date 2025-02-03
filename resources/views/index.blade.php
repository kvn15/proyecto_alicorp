@include('cabecera/header')

<section class="carusel-home">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image-1 position-relative">
                    <img src="{{ asset('img/banner-home/background.png') }}" alt="" class="img-fluid fondo">
                    <img src="{{ asset('img/banner-home/MARGARITAS.png') }}" alt=""
                        class="img-fluid position-absolute margarita">
                    <img src="{{ asset('img/banner-home/TENTACIÓN.png') }}" alt=""
                        class="img-fluid position-absolute tentacion">
                    <img src="{{ asset('img/banner-home/CHOCOBUM.png') }}" alt=""
                        class="img-fluid position-absolute chocobum">
                    <img src="{{ asset('img/banner-home/GLACITAS.png') }}" alt=""
                        class="img-fluid position-absolute glacitas">
                    <img src="{{ asset('img/banner-home/Alexa.png') }}" alt=""
                        class="img-fluid position-absolute alexa">
                    <img src="{{ asset('img/banner-home/iPhone.png') }}" alt=""
                        class="img-fluid position-absolute iPhone">
                    <img src="{{ asset('img/banner-home/LOGO.png') }}" alt=""
                        class="img-fluid position-absolute logo">
                    <img src="{{ asset('img/banner-home/CopyBajada.png') }}" alt=""
                        class="img-fluid position-absolute CopyBajada">
                    <img src="{{ asset('img/banner-home/Watch.png') }}" alt=""
                        class="img-fluid position-absolute Watch">
                </div>
            </div>
            <div class="carousel-item ">
                <div class="image-2 position-relative">
                    <img src="{{ asset('img/banner-home/dvicttorio1.png') }}" alt="" class="img-fluid fondo">
                    <img src="{{ asset('img/banner-home/dvicttorio3.png') }}" alt=""
                        class="img-fluid position-absolute dvicttorio3">
                    <img src="{{ asset('img/banner-home/dvicttorio5.png') }}" alt="" class="img-fluid position-absolute dvicttorio5-i">
                    <img src="{{ asset('img/banner-home/dvicttorio4.png') }}" alt="" class="img-fluid position-absolute dvicttorio4">
                    <img src="{{ asset('img/banner-home/dvicttorio5.png') }}" alt="" class="img-fluid position-absolute dvicttorio5-d">
                    <img src="{{ asset('img/banner-home/dvicttorio6.png') }}" alt=""
                        class="img-fluid position-absolute dvicttorio6">
                    <img src="{{ asset('img/banner-home/billetes_04.png') }}" alt=""
                        class="img-fluid position-absolute billetes_04">
                    <img src="{{ asset('img/banner-home/billetes_07.png') }}" alt=""
                        class="img-fluid position-absolute billetes_07">
                    <img src="{{ asset('img/banner-home/billetes_08.png') }}" alt=""
                        class="img-fluid position-absolute billetes_08">
                    <img src="{{ asset('img/banner-home/billetes_09.png') }}" alt=""
                        class="img-fluid position-absolute billetes_09">
                    <img src="{{ asset('img/banner-home/billetes_13.png') }}" alt=""
                        class="img-fluid position-absolute billetes_13">
                    <img src="{{ asset('img/banner-home/billetes_20.png') }}" alt=""
                        class="img-fluid position-absolute billetes_20">
                    <img src="{{ asset('img/banner-home/billetes_22.png') }}" alt=""
                        class="img-fluid position-absolute billetes_22">
                    <img src="{{ asset('img/banner-home/dvicttorio2.png') }}" alt=""
                        class="img-fluid position-absolute dvicttorio2">

                    <img src="{{ asset('img/banner-home/dvicttorio4.png') }}" alt=""
                        class="img-fluid position-absolute dvicttorio4hd">
                    <img src="{{ asset('img/banner-home/dvicttorio5.png') }}" alt=""
                        class="img-fluid position-absolute dvicttorio5hd">
                    <img src="{{ asset('img/banner-home/dvicttorio4.png') }}" alt=""
                        class="img-fluid position-absolute dvicttorio4hi">
                    <img src="{{ asset('img/banner-home/dvicttorio5.png') }}" alt=""
                        class="img-fluid position-absolute dvicttorio5hi">

                </div>
            </div>
            <div class="carousel-item ">
                <div class="image-3">
                    <div class="grupo-amaras">
                        <img src="{{ asset('img/banner-home/amaras7.png')}}" alt="" class="amaras7 img-fluid">
                        <img src="{{ asset('img/banner-home/amaras4.png')}}" alt="" class="amaras4 img-fluid">                     
                        <img src="{{ asset('img/banner-home/amaras8.png')}}" alt="" class="amaras8 img-fluid">                        
                        <img src="{{ asset('img/banner-home/amaras6.png')}}" alt="" class="amaras6 img-fluid">
                        <img src="{{ asset('img/banner-home/amaras5.png')}}" alt="" class="amaras5 img-fluid">

                        <img src="{{ asset('img/banner-home/Amaras.png')}}" alt="" class="amaras img-fluid position-absolute">

                        <img src="{{ asset('img/banner-home/amaras2.png')}}" alt="" class="nube nube-1 img-fluid">                        
                        <img src="{{ asset('img/banner-home/amaras2.png')}}" alt="" class="nube nube-2 img-fluid">
                        <img src="{{ asset('img/banner-home/amaras2.png')}}" alt="" class="nube nube-3 img-fluid">

                        <img src="{{ asset('img/banner-home/amaras3.png')}}" alt="" class="avion img-fluid position-absolute">
                    </div>
                </div>
            </div>
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

<main class="">

    <section class="exp" style="background-color: red; height:100vh">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Experiencias Únicas</h2>
                    <h3><span style="color: black">!LLEGAMOS MÁS A TI!</span> Conoce los eventos y novedades de nuestras marcas.</h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4 cards-grupo">
                <x-card id=1 image1="img/ali/evento-casino-kpop1.png" image2="img/ali/evento-casino-kpop2.png"
                    image3="img/ali/casino.jpg" image4="img/ali/evento-casino-kpopKeyVisual.png"
                    image5="img/ali/MusicNote1.png" image6="img/ali/MusicNote2.png" title="K-POP DANCE"
                    modalImage="img/hero1.png" eventDate="18 de Enero" eventLocation="Coliseo Aldo Chumnimune"
                    modalTitle="Casino K-pop Dance"
                    modalDescription="Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance" />

                <x-card id=2 image1="img/dento/dento-girlNormal.png" image2="img/dento/dento-girlHoover.png"
                    image3="img/dento/Dento.png" image4="img/dento.png"
                    image5="img/dento/evento-dentro-LomoSaltado.png" image6="img/dento/evento-dentro-Chaufa.png"
                    title="Estacion del <br> Buen Diente" modalImage="img/hero1.png" eventDate="18 de Enero"
                    eventLocation="Coliseo Aldo Chumnimune" modalTitle="Casino K-pop Dance"
                    modalDescription="Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance"
                    class="card2" />

                <x-card id=3 image1="img/amaras/amarasUniverisdadNormal.png"
                    image2="img/amaras/amaras-universidadHoover.png" image3="img/amaras/evento-amaras-flores.png"
                    image4="img/amaras/Amaras.png" image5="img/amaras/amaras-garrita.png"
                    image6="img/amaras/amaras-vasoUnidad.png" title="Amaras en <br> Universidades"
                    modalImage="img/hero1.png" eventDate="18 de Enero" eventLocation="Coliseo Aldo Chumnimune"
                    modalTitle="Casino K-pop Dance"
                    modalDescription="Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance"
                    class="card3" />

                <x-card id=4 image1="img/victorio/visual totem triangular.png"
                    image2="img/victorio/visual totem triangular.png" image3="img/victorio/Pasta-CodoRayado.png"
                    image4="img/victorio/LogoVittorio.png" image5="img/victorio/Pasta-Spaguetti.png"
                    image6="img/victorio/Pasta-Spaguetti.png" title="Historias que <br> dan lo mejor"
                    modalImage="img/hero1.png" eventDate="18 de Enero" eventLocation="Coliseo Aldo Chumnimune"
                    modalTitle="Casino K-pop Dance"
                    modalDescription="Disfruta del mundo del K-pop y demuestra tus mejores pasos en el #CasinoKpopDance"
                    class="card4" />

            </div>
        </div>
    </section>

    {{-- @endif --}}
</main>

<section class="videos mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-end">
                <P class="trendy">LO MÁS TRENDY</P>
            </div>
            <div class="col-md-6">
                <p class="trendy-p">!Mantente al día con las últimas tendencias <br> de tus marcas favoritas¡</p>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="carousel-v">
            <button class="carousel-button left">◀</button>
            <div class="carousel-videos">
                <div class="carousel-video">
                    <video src="{{ asset('img/videos/video_1.mp4') }}" controls></video>
                </div>
                <div class="carousel-video">
                    <video src="{{ asset('img/videos/video_2.mp4') }}" controls></video>
                </div>
                <div class="carousel-video main">
                    <video src="{{ asset('img/videos/video_3.mp4') }}" controls></video>
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
