<div>
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
        <div class="col-12 col-lg-4 d-flex" style="gap: 0.7rem">
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
                        <td>{{ $value->user->name }}</td>
                        <td>{{ $value->user->telefono }}</td>
                        <td>{{ $value->user->email }}</td>
                        <td>{{ $value->user->documento }}</td>
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
</div>
