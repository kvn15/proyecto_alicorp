<div>
    <div class="col-12 d-flex justify-content-between">
        <div class="col-12 col-lg-4 d-flex justify-content-start" style="gap: 0.7em">
            <div class="filtro-select-btn">
                <span>PDV: Bodega Lucky</span>
                <span class="cursor-pointer"><i class="bi bi-x-lg"></i></span>
            </div>
            <button class="btn btn-filtro" style="align-self: baseline;" class="ms-3"><i class="bi bi-filter"></i> Filtros</button>
        </div>
        <div class="col-12 col-lg-4 d-flex" style="gap: 0.7rem">
            <div class="input-group mb-3 w-100">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" style="border-left: 0">
            </div>
            <button class="btn btn-filtro d-flex" style="align-self: baseline;"><i class="bi bi-download"></i> <span class="ms-2">Descargar</span></button>
        </div>
    </div>

    <div class="col-12">
        <div class="table-responsive table-alicorp">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id <span wire:click="sortBy('asignancions.id')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Nombre <span wire:click="sortBy('users.name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Teléfono <span wire:click="sortBy('users.telefono')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Correo <span wire:click="sortBy('users.email')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Documento <span wire:click="sortBy('users.documento')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Participaciones <span wire:click="sortBy('asignancions.participaciones')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>T&C</th>
                        <th>Codígo <span wire:click="sortBy('asignancions.codigo')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Codígo</th>
                        <th>Fecha Registro <span wire:click="sortBy('asignancions.created_at')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $asignacion as $value )
                    <tr>    
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->user->name }}</td>
                        <td>{{ $value->user->telefono }}</td>
                        <td>{{ $value->user->email }}</td>
                        <td>{{ $value->user->documento }}</td>
                        <td>{{ $value->participaciones }}</td>
                        <td>{{ $value->terminos_condiciones }}</td>
                        <td>{{ $value->codigo }}</td>
                        <td>{{ $value->codigo_valido }}</td>
                        <td>{{ $value->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $asignacion->links() }}
        </div>
    </div>
</div>