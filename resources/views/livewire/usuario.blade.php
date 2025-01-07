<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="w-100 row">
        <div class="col-12 d-flex justify-content-between">
            <div class="input-group mb-3 w-100" style="max-width: 500px;">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" style="border-left: 0">
            </div>
        </div>
        <div class="col-12">
            <div class="table-responsive table-alicorp">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id <span wire:click="sortBy('id')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Nombre y Apellido <span wire:click="sortBy('name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Tipo Documento <span wire:click="sortBy('tipo_documento')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Documento <span wire:click="sortBy('documento')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Correo <span wire:click="sortBy('email')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Teléfono <span wire:click="sortBy('telefono')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Fecha Registro <span wire:click="sortBy('created_at')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Status</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $xplorer as $value )
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }} {{ $value->apellido }}</td>
                            <td>{{ $value->tipo_documento ?? 'DNI' }}</td>
                            <td>{{ $value->documento }}</td>
                            <td>{{ $value->email  }}</td>
                            <td>{{ $value->telefono  }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                @if ($value->status == 1)
                                 <span class="badge text-bg-success" style="background-color: #05CD991A !important;color: #05CD99 !important;font-weight: 700; font-size: 1.1em;">Activo</span>
                                @else
                                    <span class="badge text-bg-success" style="background-color: #cd05051a !important;color: rgb(205, 5, 22) !important;font-weight: 700; font-size: 1.1em;">Inactivo</span>
                                @endif
                            </td>
                            <td class="flex flex-row" style="gap: 0.5rem;">
                                @if ($value->status == 0)
                                    <button class="btn btn-outline-success" wire:click="updateStatus({{ $value->id }})">
                                        <i class="fas fa-user-check"></i>
                                    </button>
                                @else
                                    <button class="btn btn-outline-danger" wire:click="updateStatus({{ $value->id }})">
                                        <i class="fas fa-user-times"></i>
                                    </button>
                                @endif
                                {{-- <button class="btn btn-outline-danger" wire:click="delete({{ $value->id }})">
                                    <i class="fas fa-trash-alt"></i>
                                </button> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $xplorer->links() }}
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('swal:alert', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
            });
        });
    </script>
</div>
