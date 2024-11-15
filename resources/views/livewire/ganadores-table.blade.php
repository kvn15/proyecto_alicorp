<div>
    @if ($this->tipo_pro->project_type_id == 1)
    <div class="col-12 d-flex mb-2 justify-content-end">
        <button class="btn btn-outline-dark me-2" wire:click="downloadExcel">Descargar Formato</button>
        <label for="file" class="btn btn-outline-dark">Carga Masiva</label>
        <input type="file" wire:model="file" hidden id="file" accept=".xlsx, .xls">
        <button class="btn btn-outline-danger ms-2" style="align-self: flex-start" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
    </div>
    @endif
    
    <div class="col-12 d-flex justify-content-between">
        <div class="col-12 col-lg-4 d-flex justify-content-start position-relative" style="gap: 0.7em">
            <div class="filtro-select-btn d-none" id="premios_ctn">
                <span>Premio: <span id="premio_text"></span></span>
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
                        <label for="premios_filtro" class="form-label">Premios</label>
                        <select name="premios_filtro" id="premios_filtro" class="form-select" wire:model="premios_filtro">
                            <option value="">-- Seleccione --</option>
                            @foreach ($premiosList as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre_premio }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label for="fecha_ini" class="form-label">Fch. Premio Inicio</label>
                        <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" wire:model="fecha_ini">
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label for="fecha_fin" class="form-label">Fch. Premio Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" wire:model="fecha_fin">
                    </div>
        
                    <div class="col-12">
                        <button type="button" class="btn btn-alicorp w-100" wire:click="filter">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-5 d-flex" style="gap: 0.7rem">
            <div class="input-group mb-3 w-100">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" style="border-left: 0">
            </div>
            <a href="{{ route("export.ganadores", $projectId) }}" class="btn btn-filtro d-flex" style="align-self: baseline;"><i class="bi bi-download"></i> <span class="ms-2">Descargar</span></a>
        </div>
    </div>

    <div class="col-12">
        <div class="table-responsive table-alicorp">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id <span wire:click="sortBy('participants.id')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Fecha Registro <span wire:click="sortBy('participants.created_at')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Nombre <span wire:click="sortBy('users.name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Teléfono <span wire:click="sortBy('users.telefono')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Correo <span wire:click="sortBy('users.email')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Documento <span wire:click="sortBy('users.documento')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Participaciones <span wire:click="sortBy('asignancions.participaciones')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Premio</th>
                        <th>Fecha Premio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $participant as $value )
                    <tr>    
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>{{ isset($value->user->name) ? $value->user->name : $value->other_participant->nombres }}</td>
                        <td>{{ isset($value->user->telefono) ? $value->user->telefono : $value->other_participant->telefono }}</td>
                        <td>{{ isset($value->user->email) ? $value->user->email : $value->other_participant->correo }}</td>
                        <td>{{ isset($value->user->documento) ? $value->user->documento : $value->other_participant->nro_documento }}</td>
                        <td>{{ $value->participaciones }}</td>
                        <td class="badge-alicorp">
                            <span class="badge text-bg-success">
                                {{ $value->award_project->nombre_premio  }}
                            </span>
                        </td>
                        <td>
                            {{ $value->fecha_premio }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $participant->links() }}
        </div>
    </div>

    {{-- Modal Agregar --}}
    <div wire:ignore.self class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalAgregar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form wire:submit.prevent="store" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalAgregar">Agregar Ganador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;" wire:click="resetForm"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-12 mb-2">
                        <label for="fecha_ini" class="form-label">Participante</label>
                        <select name="ganador" id="ganador" class="form-select" wire:model="id_ganador">
                            <option>Seleccione</option>
                            @foreach ($ganadores as $item)
                                <option value="{{ $item->id }}">{{ $item->id }} - {{ isset($item->user->name) ? $item->user->name : $item->other_participant->nombres }} - {{ $item->codigo }}</option>
                            @endforeach
                        </select>
                        @error('id_ganador') <span class="text-danger">Debe escoger un participante</span> @enderror
                    </div>
                    <div class="col-12 mb-2">
                        <label for="fecha_ini" class="form-label">Premio</label>
                        <select name="ganador" id="ganador" class="form-select" wire:model="id_premio">
                            <option>Seleccione</option>
                            @foreach ($premiosList as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre_premio }}</option>
                            @endforeach
                        </select>
                        @error('id_premio') <span class="text-danger">Debe escoger un premio</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #2e2e2e; color: #fff; border: 0;" wire:click="resetForm">Cancelar</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #ED1B2F; color: #fff; border: 0;">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('premio', function (data) {
                if (data != "") {
                    const premios_ctn = document.getElementById("premios_ctn");
                    const premio_text = document.getElementById("premio_text");
                    console.log(data)
                    premios_ctn.classList.remove("d-none")
                    premios_ctn.classList.add("d-block")
                    premio_text.textContent = data
                }
            });
        });
    </script>
    <script>
        window.addEventListener('swal:alert', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
            });
        });
    </script>
</div>
