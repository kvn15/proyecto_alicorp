@extends('admin.pages.inicio.layout')

@section('inicio_dash')

    <div class="container-fluid m-auto" style="width: 95%">
        <div class="row pt-4">
            <div class="col-12 my-2">
    
                <h4>Últimos Proyectos</h4>
    
                <div class="w-100">
                    @foreach ($inicio['projects'] as $project)
                    <div class="card-w-full">
                        <div class="info-container">
                            <a href="{{ route('landing_promocional.show.overview', $project->id ) }}"><img class="img-fluid" src="{{asset('backend/img/thumbnail.png')}}" alt=""></a>
                            <div class="info-card">
                                <p class="title-card"><a href="{{ route('landing_promocional.show.overview', $project->id) }}">{{ $project->nombre_promocion }}</a></p>
                                <p>{{ $project->project_type->name }}</p>
                                <p><small>Ultima actualización: {{ $project->updated_at }}</small></p>
                                <p><small>Fecha creación: {{ $project->created_at }}</small></p>
                            </div>
                        </div>
                        <div class="etapas-card">
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Estado</b></span>
                                <div class="body-etapa">
                                    @if ($project->status)
                                    <div class="bage-activo">
                                        Activo
                                    </div>
                                    @else
                                    <div class="bage-inactivo">
                                        Inactivo
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Fecha Inicio</b></span>
                                <div class="body-etapa">
                                    <span>{{ $project->fecha_ini_proyecto }}</span>
                                </div>
                            </div>
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Fecha Fin</b></span>
                                <div class="body-etapa">
                                    <span>{{ $project->fecha_fin_proyecto }}</span>
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
                    @endforeach
                </div>
    
                <br>
                <div>
                    <div class="d-flex justify-content-between">
                        <h4>Landing Promocional</h4>
                        <a href="{{ route('landing_promocional.index') }}" class="ancor-mas">Ver más</a>
                    </div>
                    <hr>
                    <div class="w-100 promo-landing">
                        @foreach ($inicio["landing"] as $landing)
                        @component('admin.components.cardpromo')
                            @slot('img_promo')
                                @if (isset($landing->ruta_img))
                                    {{asset('backend/img/promo-1.jpg')}}
                                @else
                                    {{asset('backend/img/thumbnail.png')}}
                                @endif
                            @endslot
                            @slot('name_promo')
                                {{ $landing->nombre_promocion }}
                            @endslot
                            @slot('fecha_promo')
                                {{ $landing->fecha_ini_proyecto }}
                            @endslot
                            @slot('status_promo')
                                {{ $landing->status }}
                            @endslot
                        @endcomponent
                        @endforeach
                    </div>
                </div>
    
                <br>
                <div>
                    <div class="d-flex justify-content-between">
                        <h4>Juego Web</h4>
                        <a href="{{ route('admin.dashboard.juegosWeb') }}" class="ancor-mas">Ver más</a>
                    </div>
                    <hr>
                    <div class="w-100 promo-landing">
                        @foreach ($inicio["web"] as $web)
                        @component('admin.components.cardpromo')
                            @slot('img_promo')
                                @if (isset($web->ruta_img))
                                    {{asset('backend/img/promo-1.jpg')}}
                                @else
                                    {{asset('backend/img/thumbnail.png')}}
                                @endif
                            @endslot
                            @slot('name_promo')
                                {{ $web->nombre_promocion }}
                            @endslot
                            @slot('fecha_promo')
                                {{ $web->fecha_ini_proyecto }}
                            @endslot
                            @slot('status_promo')
                                {{ $web->status }}
                            @endslot
                        @endcomponent
                        @endforeach
                    </div>
                </div>
    
                <br>
                <div>
                    <div class="d-flex justify-content-between">
                        <h4>Juego Campañas</h4>
                        <a href="{{ route('admin.dashboard.juegosCamp') }}" class="ancor-mas">Ver más</a>
                    </div>
                    <hr>
                    <div class="w-100 promo-landing">
                        @foreach ($inicio["campana"] as $campana)
                        @component('admin.components.cardpromo')
                            @slot('img_promo')
                                @if (isset($campana->ruta_img))
                                    {{asset('backend/img/promo-1.jpg')}}
                                @else
                                    {{asset('backend/img/thumbnail.png')}}
                                @endif
                            @endslot
                            @slot('name_promo')
                                {{ $campana->nombre_promocion }}
                            @endslot
                            @slot('fecha_promo')
                                {{ $campana->fecha_ini_proyecto }}
                            @endslot
                            @slot('status_promo')
                                {{ $campana->status }}
                            @endslot
                        @endcomponent
                        @endforeach
                    </div>
                </div>
    
            </div>
        </div>
    </div>

    <livewire:modal-project :pageActual="Route::currentRouteName()" />
@endsection