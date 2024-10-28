<div>
    <div class="col-12 d-flex justify-content-between">
        <div class="col-12 col-lg-5 d-flex justify-content-start position-relative" style="gap: 0.7em">
            <div class="filtro-select-btn d-none" id="terminos_div">
                <span>T&C: <span class="termino">Acepto</span></span>
                <span class="cursor-pointer" wire:click="removeTermino"><i class="bi bi-x-lg"></i></span>
            </div>
            <div class="filtro-select-btn d-none" id="codigo_div">
                <span>Código: <span class="codigo">Correcto</span></span>
                <span class="cursor-pointer" wire:click="removeCorrecto"><i class="bi bi-x-lg"></i></span>
            </div>
            
            <label for="checkFilter" class="btn btn-filtro" style="align-self: baseline;" id="btnFiltro">
                <i class="bi bi-filter"></i> Filtros
            </label>
            <input hidden type="checkbox" id="checkFilter">
            <div class="collapse-filtro">
                <h5 class="mb-4">Filtros</h5>
                <form class="row" style="max-width: 550px;">
                    <div class="col-12 col-md-6 mb-2">
                        <label for="tyc_filtro" class="form-label">T&C</label>
                        <select name="tyc_filtro" id="tyc_filtro" class="form-select" wire:model="tyc_filtro">
                            <option value="">-- Seleccione --</option>
                            <option value="1">Acepto</option>
                            <option value="0">No Acepto</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label for="codigo_filtro" class="form-label">Código</label>
                        <select name="codigo_filtro" id="codigo_filtro" class="form-select" wire:model="codigo_filtro">
                            <option value="">-- Seleccione --</option>
                            <option value="1">Correcto</option>
                            <option value="0">Incorrecto</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label for="fecha_ini" class="form-label">Fecha Inicio</label>
                        <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" wire:model="fecha_ini">
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label for="fecha_fin" class="form-label">Fecha Fin</label>
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
            <a href="{{ route("export.participante", $projectId) }}" class="btn btn-filtro d-flex" style="align-self: baseline;"><i class="bi bi-download"></i> <span class="ms-2">Descargar</span></a>
        </div>
    </div>

    <div class="col-12">
        <div class="table-responsive table-alicorp">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id <span wire:click="sortBy('participants.id')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Nombre <span wire:click="sortBy('users.name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Teléfono <span wire:click="sortBy('users.telefono')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Correo <span wire:click="sortBy('users.email')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Documento <span wire:click="sortBy('users.documento')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Participaciones <span wire:click="sortBy('asignancions.participaciones')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>T&C</th>
                        <th>Codígo <span wire:click="sortBy('participants.codigo')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Codígo</th>
                        <th>Fecha Registro <span wire:click="sortBy('participants.created_at')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $participant as $value )
                    <tr>    
                        <td>{{ $value->id }}</td>
                        <td>{{ isset($value->user->name) ? $value->user->name : $value->other_participant->nombres }}</td>
                        <td>{{ isset($value->user->telefono) ? $value->user->telefono : $value->other_participant->telefono }}</td>
                        <td>{{ isset($value->user->email) ? $value->user->email : $value->other_participant->correo }}</td>
                        <td>{{ isset($value->user->documento) ? $value->user->documento : $value->other_participant->nro_documento }}</td>
                        <td>{{ $value->participaciones }}</td>
                        <td class="badge-alicorp">
                            @if ($value->terminos_condiciones == 1)
                                <span class="badge text-bg-success">
                                    Acepto
                                </span>
                            @else
                            <span class="badge text-bg-secondary">
                                No Acepto
                            </span>
                            @endif
                        </td>
                        <td>{{ $value->codigo }}</td>
                        <td class="badge-alicorp">
                            @if ($value->codigo_valido == 1)
                                <span class="badge text-bg-success">
                                    Correcto
                                </span>
                            @else
                            <span class="badge text-bg-secondary">
                                Incorrecto
                            </span>
                            @endif
                        </td>
                        <td>{{ $value->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $participant->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('terminosCondiciones', function () {
                const terminos = document.getElementById("tyc_filtro").value;
                const terminos_div = document.getElementById("terminos_div");
                const termino = document.querySelector(".termino");
                if (terminos && (terminos == "0" || terminos == "1")) {
                    terminos_div.classList.remove("d-none")
                    terminos_div.classList.add("d-block")
                    const valor = terminos == "0" ? "No Acepto" : "Acepto";
                    termino.textContent = valor
                }
            });
            Livewire.on('codigos', function () {
                const codigo_filtro = document.getElementById("codigo_filtro").value;
                const codigo_div = document.getElementById("codigo_div");
                const codigo = document.querySelector(".codigo");
                if (codigo_filtro && (codigo_filtro == "0" || codigo_filtro == "1")) {
                    codigo_div.classList.remove("d-none")
                    codigo_div.classList.add("d-block")
                    const valor = codigo_filtro == "0" ? "Incorrecto" : "Correcto";
                    console.log(valor)
                    codigo.textContent = valor
                }
            });
        });
    </script>
</div>
