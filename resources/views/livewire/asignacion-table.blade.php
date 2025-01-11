<div>
    <div class="col-12 d-flex justify-content-between">
        <div class="col-12 col-lg-4 d-flex justify-content-start position-relative" style="gap: 0.7em">
            <div class="filtro-select-btn d-none" id="premios_ctn">
                <span>Punto de Venta: <span id="premio_text"></span></span>
                <span class="cursor-pointer" wire:click="removePremio"><i class="bi bi-x-lg"></i></span>
            </div>

            <label for="checkFilter" class="btn btn-filtro" style="align-self: baseline;" id="btnFiltro">
                <i class="bi bi-filter"></i> Filtros
            </label>
            <input hidden type="checkbox" id="checkFilter">
            <div class="collapse-filtro">
                <h5 class="mb-4">Filtros</h5>
                <form class="row" style="max-width: 550px;">
                    <div class="col-12 mb-2">
                        <label for="punto_venta" class="form-label">Premios</label>
                        <select name="punto_venta" id="punto_venta" class="form-select" wire:model="punto_venta">
                            <option value="">-- Seleccione --</option>
                            @foreach ($puntoVentaList as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label for="fecha_ini" class="form-label">Fch. Inicio</label>
                        <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" wire:model="fecha_ini">
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label for="fecha_fin" class="form-label">Fch. Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" wire:model="fecha_fin">
                    </div>

                    <div class="col-12">
                        <button type="button" class="btn btn-alicorp w-100" wire:click="filter">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex" style="gap: 0.7rem">
            <div class="input-group mb-3 w-100">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" style="border-left: 0">
            </div>
            <a href="{{ route("export.asignacion", $projectId) }}" class="btn btn-filtro d-flex" style="align-self: baseline;"><i class="bi bi-download"></i> <span class="ms-2">Descargar</span></a>
        </div>
    </div>

    <div class="col-12">
        <div class="table-responsive table-alicorp">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id <span wire:click="sortBy('asignacion_projects.id')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Fecha Registro <span wire:click="sortBy('asignacion_projects.created_at')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Nombre Xplorer <span wire:click="sortBy('xplorers.name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Documento <span wire:click="sortBy('xplorers.documento')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Punto de Venta <span wire:click="sortBy('sales_points.name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Fecha Inicio <span wire:click="sortBy('asignacion_projects.fecha_inicio')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Fecha Fin <span wire:click="sortBy('asignacion_projects.fecha_fin')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Nro. Premios</th>
                        <th>Premios <span wire:click="sortBy('award_projects.nombre_premio')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $asignacion as $value )
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>{{ $value->xplorer->name }}</td>
                        <td>{{ $value->xplorer->documento }}</td>
                        <td>{{ $value->sales_point->name }}</td>
                        <td>{{ $value->fecha_inicio }}</td>
                        <td>{{ $value->fecha_fin }}</td>
                        <td>{{ count($value->premio_pdvs) }}</td>
                        <td>
                            @foreach ($value->premio_pdvs as $item)
                                <span class="badge text-bg-success" style="background-color: #05CD991A !important;color: #05CD99 !important;font-weight: 700;">{{ $item->award_project->nombre_premio }}</span>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $asignacion->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('punto', function (data) {
                if (data != "") {
                    const premios_ctn = document.getElementById("premios_ctn");
                    const premio_text = document.getElementById("premio_text");
                    premios_ctn.classList.remove("d-none")
                    premios_ctn.classList.add("d-block")
                    premio_text.textContent = data
                }
            });
        });
    </script>
</div>
