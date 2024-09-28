@extends('admin.pages.inicio.layout')

@section('inicio_dash')

    <div class="col-12 my-2">

        <h4>Últimos Proyectos</h4>

        <div class="w-100">
            <div class="card-w-full">
                <div class="info-container">
                    <img class="img-fluid" src="{{asset('backend/img/thumbnail.png')}}" alt="">
                    <div class="info-card">
                        <p class="title-card">Nuevo Proyecto Campaña Web</p>
                        <p>Landing Promocional</p>
                        <p><small>Ultima actualización: 12/08/2024 16:34</small></p>
                        <p><small>Fecha creación: 12/08/2024</small></p>
                    </div>
                </div>
                <div class="etapas-card">
                    <div class="item-etapa">
                        <span class="title-etapa"><b>Estado</b></span>
                        <div class="body-etapa">
                            <div class="bage-inactivo">
                                Inactivo
                            </div>
                        </div>
                    </div>
                    <div class="item-etapa">
                        <span class="title-etapa"><b>Fecha Inicio</b></span>
                        <div class="body-etapa">
                            <span>20/08/2024</span>
                        </div>
                    </div>
                    <div class="item-etapa">
                        <span class="title-etapa"><b>Fecha Fin</b></span>
                        <div class="body-etapa">
                            <span>-</span>
                        </div>
                    </div>
                    <div class="item-etapa">
                        <span class="title-etapa"><b>Participantes</b></span>
                        <div class="body-etapa">
                            <span>3500</span>
                        </div>
                    </div>
                </div>
                <div class="accion-card">
                    <div class="item-accion">
                        <span class="title-accion"><b>Acciones</b></span>
                        <div class="body-accion">
                            <button class="btn btn-outline-secondary">Configurar</button>
                            <button class="btn btn-outline-secondary">Personalizar</button>
                            <button class="btn btn-alicorp">Publicar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-w-full">
                <div class="info-container">
                    <img class="img-fluid" src="{{asset('backend/img/thumbnail.png')}}" alt="">
                    <div class="info-card">
                        <p class="title-card">Nuevo Proyecto Campaña Web</p>
                        <p>Landing Promocional</p>
                        <p><small>Ultima actualización: 12/08/2024 16:34</small></p>
                        <p><small>Fecha creación: 12/08/2024</small></p>
                    </div>
                </div>
                <div class="etapas-card">
                    <div class="item-etapa">
                        <span class="title-etapa"><b>Estado</b></span>
                        <div class="body-etapa">
                            <div class="bage-activo">
                                Activo
                            </div>
                        </div>
                    </div>
                    <div class="item-etapa">
                        <span class="title-etapa"><b>Fecha Inicio</b></span>
                        <div class="body-etapa">
                            <span>20/08/2024</span>
                        </div>
                    </div>
                    <div class="item-etapa">
                        <span class="title-etapa"><b>Fecha Fin</b></span>
                        <div class="body-etapa">
                            <span>-</span>
                        </div>
                    </div>
                    <div class="item-etapa">
                        <span class="title-etapa"><b>Participantes</b></span>
                        <div class="body-etapa">
                            <span>3500</span>
                        </div>
                    </div>
                </div>
                <div class="accion-card">
                    <div class="item-accion">
                        <span class="title-accion"><b>Acciones</b></span>
                        <div class="body-accion">
                            <button class="btn btn-outline-secondary">Configurar</button>
                            <button class="btn btn-outline-secondary">Personalizar</button>
                            <button class="btn btn-alicorp-dark">Inactivar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div>
            <div class="d-flex justify-content-between">
                <h4>Landing Promocional</h4>
                <a href="" class="ancor-mas">Ver más</a>
            </div>
            <hr>
            <div class="w-100 promo-landing">
                @component('admin.components.cardpromo')
                    @slot('img_promo')
                        backend/img/promo-1.jpg
                    @endslot
                    @slot('name_promo')
                        A clases con inteligencia
                    @endslot
                    @slot('fecha_promo')
                        12/08/2024
                    @endslot
                @endcomponent
            </div>
        </div>

        <br>
        <div>
            <div class="d-flex justify-content-between">
                <h4>Juego Web</h4>
                <a href="" class="ancor-mas">Ver más</a>
            </div>
            <hr>
            <div class="w-100 promo-landing">
                @component('admin.components.cardpromo')
                    @slot('img_promo')
                        backend/img/juego-1.jpg
                    @endslot
                    @slot('name_promo')
                        A clases con inteligencia
                    @endslot
                    @slot('fecha_promo')
                        12/08/2024
                    @endslot
                    @slot('status_promo')
                        {{ true }}
                    @endslot
                @endcomponent
            </div>
        </div>

        <br>
        <div>
            <div class="d-flex justify-content-between">
                <h4>Juego Campañas</h4>
                <a href="" class="ancor-mas">Ver más</a>
            </div>
            <hr>
            <div class="w-100 promo-landing">
                @component('admin.components.cardpromo')
                    @slot('img_promo')
                        backend/img/ruleta-1.png
                    @endslot
                    @slot('name_promo')
                        A clases con inteligencia
                    @endslot
                    @slot('fecha_promo')
                        12/08/2024
                    @endslot
                    @slot('status_promo')
                        {{ true }}
                    @endslot
                @endcomponent
            </div>
        </div>

    </div>

@endsection