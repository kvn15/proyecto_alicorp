<div class="w-100 mt-4 landing-page-inicio">
    <div class="d-flex justify-content-between">
        <div class="col-12 col-lg-4 ">
            <div class="input-group mb-3 w-100">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" />
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
        @foreach ($projects as $project)
        <div>
            @component('admin.components.cardpromo')
                @slot('img_promo')
                    @if (isset($project->ruta_img))
                        {{asset('backend/img/promo-1.jpg')}}
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
            @endcomponent
        </div>
        @endforeach
    </div>
</div>