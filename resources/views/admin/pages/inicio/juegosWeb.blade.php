@extends('admin.pages.inicio.layout')

@section('header_left')
  <span><b>Juegos Web</b></span>
@endsection

@section('inicio_dash')
    <div class="col-12 my-2">
        <h4 class="mb-4">Juegos Web</h4>
        <hr>
        <div class="w-100 mt-4 landing-page-inicio">
            <div class="d-flex justify-content-between">
                <div class="col-12 col-lg-4 ">
                    <div class="input-group mb-3 w-100">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                </div>
                <div class="col-12 col-lg-4 d-flex justify-content-end" style="gap: 0.7em">
                    <div class="filtro-select-btn">
                        <span>Estado: Activos</span>
                        <span class="cursor-pointer"><i class="bi bi-x-lg"></i></span>
                    </div>
                    <button class="btn btn-filtro" style="align-self: baseline;"><i class="bi bi-filter"></i> Filtros</button>
                </div>
            </div>
            <div class="row-landing">
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
                <div>
                    @component('admin.components.cardpromo')
                        @slot('img_promo')
                            backend/img/juego-1.jpg
                        @endslot
                        @slot('name_promo')
                            Rapa y gana con cacino
                        @endslot
                        @slot('fecha_promo')
                            12/08/2024
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection