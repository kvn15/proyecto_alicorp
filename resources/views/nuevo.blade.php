@include('cabecera.header-3')

<section class="eventos position-relative">
  <div class="container">
    <div class="row">
      <div class="mt-e">
        <h2>Experiencias Únicas</h2>
        <p class="mt-5"><span>¡LLEGAMOS MÁS A TI!</span> Conoce los eventos y novedades de nuestras marcas.</p>
      </div>
      
    </div>
  </div>

  <div class="card-eventos position-absolute">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
          <div class="card">
            <div class="card-imagen">
              <img src="{{asset('img/Casino KPop-95.jpg')}}" class="card-img-top img-fluid" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">K-POP <br> DANCE</h5>  
              <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i>  01 de enero del 2024</p>
              <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> Lugar del evento</p>
              <div class="btn-evento text-center">
                <button class="vmas" onclick="window.location.href='{{ route('juegos') }}'">VER MÁS</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-imagen">
              <img src="{{asset('img/FotoEvento-Amaras.jpeg')}}" class="card-img-top img-fluid" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Amaras<br> en Univeridades</h5>  
              <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i>  01 de enero del 2024</p>
              <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> Lugar del evento</p>
              <div class="btn-evento text-center">
                <button class="" onclick="window.location.href='{{ route('juegos') }}'">VER MÁS</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-imagen">
              <img src="{{asset('img/FotoEvento-Dento.jpeg')}}" class="card-img-top img-fluid" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Estación<br> Del Buen Diente</h5>  
              <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i>  01 de enero del 2024</p>
              <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> Lugar del evento</p>
              <div class="btn-evento text-center">
                <button class="" onclick="window.location.href='{{ route('juegos') }}'">VER MÁS</button>
              </div>
            </div>
          </div>
        </div>
       
        <div class="col">
          <div class="card">
            <div class="card-imagen">
              <img src="{{asset('img/FotoEvento-Vittorio.jpg')}}" class="img-fluid" alt="...">
            </div>            
            <div class="card-body">             
              <h5 class="card-title">Historias <br> que dan lo mejor.</h5>  
              <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i>  01 de enero del 2024</p>
              <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> Lugar del evento</p>
              <div class="btn-evento text-center">
                <button class="" onclick="window.location.href='{{ route('juegos') }}'">VER MÁS</button>
              </div>
            </div>
          </div>
        </div>
    
      </div>
    </div>
    
  </div>
</section>

<div class="mb-j">

</div>
  
@include('footer')