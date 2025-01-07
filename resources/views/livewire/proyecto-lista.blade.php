<div class="w-100 mt-4 landing-page-inicio">
    <div class="d-flex justify-content-between">
        <div class="col-12 col-lg-4 ">
            <div class="input-group mb-3 w-100">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" />
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex justify-content-end position-relative" style="gap: 0.7em">
            {{-- <div class="filtro-select-btn">
                <span>Estado: Activos</span>
                <span class="cursor-pointer"><i class="bi bi-x-lg"></i></span>
            </div> --}}
            <label for="checkFilter" class="btn btn-filtro" style="align-self: baseline;" id="btnFiltro">
                <i class="bi bi-filter"></i> Filtros
            </label>
            <input hidden type="checkbox" id="checkFilter">
            <div class="collapse-filtro">
                <h5 class="mb-4">Filtros</h5>

                <form class="row">
                    <div class="col-12">
                        <span class="mb-1 d-block">Estado</span>
                        <div class="d-flex justify-content-between">
                            <div class="icheck-primary d-inline">
                                <input wire:model="activo" type="checkbox" id="checkActivo" checked>
                                <label for="checkActivo">
                                    Activo
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input wire:model="inactivo" type="checkbox" id="checkInactivo">
                                <label for="checkInactivo">
                                    Inactivo
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input wire:model="finalizado" type="checkbox" id="checkFinalizado">
                                <label for="checkFinalizado">
                                    Finalizado
                                </label>
                            </div>
                        </div>
                        <hr class="my-3">
                    </div>
                    <div class="col-12">
                        <div>
                            <label for="creadoPor" class="form-label">Creado Por</label>
                            <select wire:model="usuarioCreo" name="creadoPor" id="creadoPor" class="form-select">
                                <option value="0">Todos</option>
                                <option value="1">Kevin blas</option>
                                <option value="2">Paul</option>
                            </select>
                        </div>
                        <hr class="my-3">
                    </div>

                    <div class="col-12">
                        <span class="mb-1 d-block">Fecha</span>
                    </div>

                    <div class="col-12 col-md-6">
                        <div>
                            <label for="fechaDesde" class="form-label"><b>Desde</b></label>
                            <input wire:model="fechaDesde" type="date" name="fechaDesde" id="fechaDesde" class="form-control">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div>
                            <label for="fechaHasta" class="form-label"><b>Hasta</b></label>
                            <input wire:model="fechaHasta" type="date" name="fechaHasta" id="fechaHasta" class="form-control">
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <button type="button" class="btn btn-alicorp w-100" wire:click="filter">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row-landing">
        @foreach ($projects as $project)
        <div>
            @if ($this->xplorer == false)
                @component('admin.components.cardpromo')
                    @slot('img_promo')
                        @if (isset($project->ruta_img) && !empty($project->ruta_img))
                            {{'/storage/'.$project->ruta_img}}
                        @else
                            {{asset('backend/img/thumbnail.png')}}
                        @endif
                    @endslot
                    @slot('name_promo')
                        {{ $project->nombre_promocion }}
                    @endslot
                    @slot('fecha_promo')
                        {{ $project->fecha_ini_proyecto }}
                    @endslot
                    @slot('status_promo')
                        {{ $project->status }}
                    @endslot
                    @slot('ruta_name')
                        {{ route($project->project_type->ruta_name.'.show.overview', $project->id ) }}
                    @endslot
                @endcomponent
            @else
                @php
                    $rutaJuegoCampana = "";
                    switch ($project->game_id) {
                        case 1: //Raspa y gana
                            $rutaJuegoCampana = route("juegoCampana.juego.view.registro.raspagana", $project->dominio);
                            break;
                        case 2: //Ruleta
                            $rutaJuegoCampana = route("juegoCampana.juego.view.registro.ruleta", $project->dominio);
                            break;
                        case 3: //Memoria
                            $rutaJuegoCampana = route("juegoCampana.juego.view.registro", $project->dominio);
                            break;
                        default:
                            break;
                    }
                @endphp
                <a href="{{ $rutaJuegoCampana }}" class="card-promo" target="_blank">
                    @php
                        $img_promo = "";
                        if (isset($project->ruta_img) && !empty($project->ruta_img)) {
                            $img_promo = '/storage/'.$project->ruta_img;
                        } else {
                            $img_promo = asset('backend/img/thumbnail.png');
                        }

                    @endphp
                    <div class="card-promo-header">
                        <div class="img-promo" style="background-image: url({{$img_promo}})"></div>
                    </div>
                    <div class="card-body">
                        <p class="m-0"><b>{{ $project->nombre_promocion }}</b></p>
                        <p class="m-0">Fecha: {{ $project->fecha_ini_proyecto  }}</p>
                    </div>

                    @if ($project->status == '1')
                    <div class="bage-activo">
                        Activo
                    </div>
                    @endif
                    @if ($project->status == '0')
                    <div class="bage-inactivo">
                        Inactivo
                    </div>
                    @endif
                    @if ($project->status == '2')
                    <div class="bage-finalizado">
                        Finalizado
                    </div>
                    @endif

                </a>
            @endif
        </div>
        @endforeach
    </div>
</div>
