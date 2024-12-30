@extends('cliente.dashboard')

@section('title', 'Ganados')

@section('content')
    <div class="titulo-main">
        <p>Tus premios ganados</p>
    </div>

    <section class="ganados">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="{{ asset('img/parti-3.png')}}" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                  <h5 class="card-title">¡Ganastes 1000 soles!</h5>
                  <p class="card-text">Reclama tu premio antes del 01 de enero para hacerlo valido.</p>
                </div>
                <div class="card-footer text-center">
                  <button class="btn btn-danger">VER MÁS</button>
                </div>
              </div>
            </div>
            <div class="col">
                <div class="card h-100">
                  <img src="{{ asset('img/parti-3.png')}}" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">¡Ganastes 1000 soles!</h5>
                    <p class="card-text">Reclama tu premio antes del 01 de enero para hacerlo valido.</p>
                  </div>
                  <div class="card-footer text-center">
                    <button class="btn btn-danger">VER MÁS</button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="{{ asset('img/parti-3.png')}}" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">¡Ganastes 1000 soles!</h5>
                    <p class="card-text">Reclama tu premio antes del 01 de enero para hacerlo valido.</p>
                  </div>
                  <div class="card-footer text-center">
                    <button class="btn btn-danger">VER MÁS</button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="{{ asset('img/parti-3.png')}}" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">¡Ganastes 1000 soles!</h5>
                    <p class="card-text">Reclama tu premio antes del 01 de enero para hacerlo valido.</p>
                  </div>
                  <div class="card-footer text-center">
                    <button class="btn btn-danger">VER MÁS</button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="{{ asset('img/parti-3.png')}}" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">¡Ganastes 1000 soles!</h5>
                    <p class="card-text">Reclama tu premio antes del 01 de enero para hacerlo valido.</p>
                  </div>
                  <div class="card-footer text-center">
                    <button class="btn btn-danger">VER MÁS</button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="{{ asset('img/parti-3.png')}}" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">¡Ganastes 1000 soles!</h5>
                    <p class="card-text">Reclama tu premio antes del 01 de enero para hacerlo valido.</p>
                  </div>
                  <div class="card-footer text-center">
                    <button class="btn btn-danger">VER MÁS</button>
                  </div>
                </div>
              </div>
          </div>
    </section>
@endsection