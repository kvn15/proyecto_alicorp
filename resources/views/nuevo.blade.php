@include('cabecera.header-3')

<section class="carusel-nuevo ">
    <div class="row d-flex justify-content-center position-relative g-carusel">
        <div class="col-md-12 carusel-tamano">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner ">
                  <div class="carousel-item active">
                    <img src="img/nuevo1.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/nuevo2.png" class="d-block w-100" alt="...">
                  </div>                  
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                  <span class="atras"><i class="fa fa-circle fa-5x" aria-hidden="true"></i></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                  <span class="siguiente"><i class="fa fa-circle fa-5x" aria-hidden="true"></i></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </div>
    
  </section>
  
@include('footer')