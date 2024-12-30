@extends('cliente.dashboard')

@section('title', 'Juegos')

@section('content')
    <div class="titulo-main">
        <p>Estos son nuestros ùltimos juegos</p>
    </div>

    <section class="juegos">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100 position-relative">
                <img src="{{ asset('img/azul.jpg')}}" class="card-img-top img-fluid" alt="...">
                <div class="card-body position-absolute">
                  <h5 class="card-title">¡Casino te trae el raspa y gana!</h5>
                  <p class="card-text">Gana vale de comppras en H&H.</p>
                  <button class="btn btn-danger">JUEGA YA</button>
                </div>
                <div class="imagenes">
                  <img src="{{asset('img/imagen2.png')}}" alt="Imagen 1" class="image image1" >
                  <img src="{{asset('img/imagen1.png')}}" alt="Imagen 2" class="image image2">
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 position-relative">
                <img src="{{ asset('img/azul.jpg')}}" class="card-img-top img-fluid" alt="...">
                <div class="card-body position-absolute">
                  <h5 class="card-title">¡Casino te trae el raspa y gana!</h5>
                  <p class="card-text">Gana vale de comppras en H&H.</p>
                  <button class="btn btn-danger">JUEGA YA</button>
                </div>
                <div class="roulette">
                  <img src="{{asset('img/ruleta2.png')}}" alt="Imagen 1" class="ruleta" >
                </div>
              </div>
            </div>
          </div>
    </section>
@endsection