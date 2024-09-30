@extends('admin.pages.inicio.layout')

@section('header_left')
  <span>Landing Promocional > <b>Nueva Proyecto Landing</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
<button type="button" class="btn btn-inactivo">
    Inactivo
</button>
@endsection


@section('inicio_dash')

    <div class="row-show">
        <div class="menu-left">
            <div class="title-menu">
                <span>Menú</span>
            </div>
            <section class="body-menu">
                <ul class="lista-menu">
                    <li class="item-menu">
                        <a href="" class="link-menu active">
                            Overview
                        </a>
                    </li>
                    <li class="item-menu">
                        <a href="" class="link-menu">
                            Indicadores
                        </a>
                    </li>
                    <li class="item-menu">
                        <a href="" class="link-menu">
                            Participantes
                        </a>
                    </li>
                    <li class="item-menu">
                        <a href="" class="link-menu">
                            Ganadores
                        </a>
                    </li>
                    <li class="item-menu">
                        <a href="" class="link-menu">
                            Configuración
                        </a>
                    </li>
                </ul>
            </section>
        </div>
        <div class="body-right">
            <h3>Overview</h3>

            <div class="row">
                <div class="col-12">
                    <div class="card-w-full">
                        <div class="info-container">
                            <a href="{{ route('landing_promocional.show', 1) }}"><img class="img-fluid" src="{{asset('backend/img/thumbnail.png')}}" alt=""></a>
                            <div class="info-card">
                                <p class="title-card"><a href="{{ route('landing_promocional.show', 1) }}">Nuevo Proyecto Campaña Web</a></p>
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
                                    <button class="btn btn-outline-secondary">Personalizar</button>
                                    <button class="btn btn-alicorp">Publicar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="border-card card-right">

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="border-card card-right">
                        <h5 class="mb-4">Ultimos participantes</h5>

                        <div class="w-100 d-flex flex-column" style="gap: 0.4rem">
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">No Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">No Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">No Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">No Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Gano</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 d-flex justify-content-end mt-4">
                            <a href="" class="ver_mas">
                                Ver más <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="border-card card-right">

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="border-card card-right">
                        <h5 class="mb-4">Ultimos ganadores</h5>

                        <div class="w-100 d-flex flex-column" style="gap: 0.4rem">
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                    <small>Hoy 25/08/2024</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Articulo 1</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                    <small>Hoy 25/08/2024</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">Articulo 1</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                    <small>Hoy 25/08/2024</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Articulo 1</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                    <small>Hoy 25/08/2024</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Articulo 1</span>
                                </div>
                            </div>
                           
                        </div>

                        <div class="w-100 d-flex justify-content-end mt-4">
                            <a href="" class="ver_mas">
                                Ver más <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection