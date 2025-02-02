<section class="footer-alicorp">

    <div class="container" @if(request()->is('nuevo') || request()->is('juegos')) style="display: none;" @endif>
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h3>Nuestras marcas</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 logo-alicorp">
                <div class="carousel-container">
                    <div class="carousel-wrapper">
                        <div class="carousel">
                            <img src="{{asset('img/logos/Amaras.png')}}" alt="Logo 1">
                            <img src="{{asset('img/logos/BlancaFlor.png')}}" alt="Logo 2">
                            <img src="{{asset('img/logos/Casino.png')}}" alt="Logo 3">
                            <img src="{{asset('img/logos/Dento.png')}}" alt="Logo 4">
                            <img src="{{asset('img/logos/Primor.png')}}" alt="Logo 5">
                            <img src="{{asset('img/logos/Vittorio.png')}}" alt="Logo 6">
                        </div>
                
                        <!-- Segunda copia de los logos para el bucle infinito -->
                        <div class="carousel">
                            <img src="{{asset('img/logos/Amaras.png')}}" alt="Logo 1">
                            <img src="{{asset('img/logos/BlancaFlor.png')}}" alt="Logo 2">
                            <img src="{{asset('img/logos/Casino.png')}}" alt="Logo 3">
                            <img src="{{asset('img/logos/Dento.png')}}" alt="Logo 4">
                            <img src="{{asset('img/logos/Primor.png')}}" alt="Logo 5">
                            <img src="{{asset('img/logos/Vittorio.png')}}" alt="Logo 6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div @if(request()->is('nuevo') || request()->is('juegos')) style="margin-top: 500px;" @endif>

    </div>

    <div class="container-fluid seccion2-pie" style="background-color: #FB0000">
        <div class="row">
            <div class="col-3 text-center d-flex flex-column justify-content-center mt-5">
                <h4>Redes Sociales</h4>
                <div class="redes-sociales justify-content-between mt-2">
                    <i class="fa fa-facebook me-3" aria-hidden="true"></i>
                    <i class="fa fa-linkedin me-3" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-3 text-center d-flex flex-column justify-content-center">
                <div style="text-align: left;">
                    <h4>Terminos y condiciones</h4>
                </div>
                
            </div>
            <div class="col-3 text-center service_client">
                <div style="text-align: left;">
                    <h4>Servicio al Cliente</h4>
                </div>
                
                <div class="" style="text-align: left;">
                <p>De Lunes a Viernes</p>
                <p>8:00 am a 6:00 pm</p>
                <p>Sabado 9:00 am a 2:00 pm</p>
                <p>Lima +511 708 9300</p>
                </div>

            </div>
            <div class="col-3 text-center d-flex flex-column justify-content-center contact">
                <div style="text-align: left;">
                    <h4>Contáctanos</h4>
                </div>
               
               <div class="" style="text-align: left;">
                <p>Oficina Miraflores: Av. 28 de Julio 1150</p>
                <p>Central Telefónica: +511 315 0800</p>
                <p>Email: consultas@alicorp.com</p>
               </div>
               
            </div>            
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <hr class="separador-pie">
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <p class="anio">&copy;2024 Xplora</p>
                </div>
            </div>
        </div>
    </div>

</section>


<script src="{{asset('js/jQuery.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/java.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/script.js')}}"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
   
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
   
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
   
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break; 
    }
    @endif 
</script>

</body>

</html>