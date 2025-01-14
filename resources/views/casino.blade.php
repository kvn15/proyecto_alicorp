@include('cabecera/header-2')

<section class="juegoCasino">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex flex-column align-items-center justify-center mt-6">
                <img src="../img/galleta_backing.png" width="350px" alt="">
                <button class="btn btn-danger casino btn-open">Ingrese tu código</button>

                    <!-- Modal -->
                    <div class="modal" id="customModal">
                        <div class="modal-content position-relative">
                            <img src="../img/Casino_2023.png" alt="" class=" letra-casino img-fluid position-absolute">
                            <p class="position-absolute">Ingresa el código de <br> tu empaque</p>
                            <div class="text-center">
                                <input type="text" class="underline-input">
                            </div>
                            
                            <p class="position-absolute sub-titulo">Revisa dentro de empaque el código y participa por increíbles premios</p>

                            <button class="btn-close"><i class="fa fa-times" aria-hidden="true"></i></button>

                            <div class="botonera d-flex flex-column">
                                
                                <button class="btn-participar">¡PARTICIPAR!</button>
                                <button class="btn-regresar">REGRESA</button>
                            </div>
                            
                        </div>
                    </div>
                <button class="btn casino_back" onclick="window.location.href='{{ route('juegos') }}'">Regresar</button>
            </div>
        </div>
    </div>
</section>

@include('footer')