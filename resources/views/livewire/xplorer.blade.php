<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="w-100 row">
        <div class="col-12 d-flex justify-content-between">
            <div class="input-group mb-3 w-100" style="max-width: 500px;">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" style="border-left: 0">
            </div>

            <button class="btn btn-outline-danger ms-2" style="align-self: flex-start" data-bs-toggle="modal" data-bs-target="#modalAgregar" wire:click="resetForm"><i class="fas fa-user-plus"></i> Agregar Xplorer</button>
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
                            <th>Edad <span wire:click="sortBy('edad')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
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
                            <td>{{ $value->edad  }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                @if ($value->status == 1)
                                 <span class="badge text-bg-success" style="background-color: #05CD991A !important;color: #05CD99 !important;font-weight: 700; font-size: 1.1em;">Activo</span>
                                @else
                                    <span class="badge text-bg-success" style="background-color: #cd05051a !important;color: rgb(205, 5, 22) !important;font-weight: 700; font-size: 1.1em;">Inactivo</span>
                                @endif
                            </td>
                            <td class="flex flex-row" style="gap: 0.5rem;">
                                <button class="btn btn-outline-info" wire:click="findUserById({{ $value->id }})" data-bs-toggle="modal" data-bs-target="#modalEditar">
                                    <i class="fas fa-user-edit"></i>
                                </button>
                                @if ($value->status == 0)
                                    <button class="btn btn-outline-success" wire:click="updateStatus({{ $value->id }})">
                                        <i class="fas fa-user-check"></i>
                                    </button>
                                @else
                                    <button class="btn btn-outline-danger" wire:click="updateStatus({{ $value->id }})">
                                        <i class="fas fa-user-times"></i>
                                    </button>
                                @endif
                                <button class="btn btn-outline-warning" wire:click="changePasword({{ $value->id }})" data-bs-toggle="modal" data-bs-target="#modalPass">
                                    <i class="fas fa-key"></i>
                                </button>
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

    {{-- Modal Agregar --}}
    <div wire:ignore.self class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalAgregar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <form wire:submit.prevent="store" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalAgregar">Agregar Xplorer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;" wire:click="resetForm"></button>
                </div>
                <div class="modal-body row">
                    @if (session()->has('message'))
                        <div class="col-12 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">Nombre es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" wire:model="apellido">
                        @error('apellido') <span class="text-danger">Nombre es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                        <select name="tipo_documento" id="tipo_documento" class="form-select w-100" wire:model="tipo_documento">
                            <option value="DNI" selected>DNI</option>
                            <option value="C.EXT" selected>C.EXT</option>
                            <option value="PASAPORTE" selected>PASAPORTE</option>
                        </select>
                        @error('tipo_documento') <span class="text-danger">Tipo de Documento es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="text" name="documento" id="documento" class="form-control" wire:model="documento">
                        @error('documento') <span class="text-danger">Documento es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" name="email" id="email" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">Correo es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" wire:model="password">
                        @error('password') <span class="text-danger">Contraseña es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" wire:model="telefono" min="18">
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control" wire:model="edad" min="18">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #2e2e2e; color: #fff; border: 0;" wire:click="resetForm">Cancelar</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #ED1B2F; color: #fff; border: 0;">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Agregar --}}
    <div wire:ignore.self class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="examplemodalEditar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <form wire:submit.prevent="update" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="examplemodalEditar">Editar Xplorer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;" wire:click="resetForm"></button>
                </div>
                <div class="modal-body row">
                    @if (session()->has('message'))
                        <div class="col-12 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">Nombre es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" wire:model="apellido">
                        @error('apellido') <span class="text-danger">Nombre es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                        <select name="tipo_documento" id="tipo_documento" class="form-select w-100" wire:model="tipo_documento">
                            <option value="DNI" selected>DNI</option>
                            <option value="C.EXT" selected>C.EXT</option>
                            <option value="PASAPORTE" selected>PASAPORTE</option>
                        </select>
                        @error('tipo_documento') <span class="text-danger">Tipo de Documento es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="text" name="documento" id="documento" class="form-control" wire:model="documento">
                        @error('documento') <span class="text-danger">Documento es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" name="email" id="email" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">Correo es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2 d-none">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" wire:model="password">
                        @error('password') <span class="text-danger">Contraseña es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" wire:model="telefono" min="18">
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control" wire:model="edad" min="18">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #2e2e2e; color: #fff; border: 0;" wire:click="resetForm">Cancelar</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #ED1B2F; color: #fff; border: 0;">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal password --}}
    <div wire:ignore.self class="modal fade" id="modalPass" tabindex="-1" aria-labelledby="examplemodalPass" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <form wire:submit.prevent="updatePasword" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="examplemodalPass">Cambiar Contraseña de: {{ $name }} {{ $apellido }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;" wire:click="resetForm"></button>
                </div>
                <div class="modal-body row">
                    @if (session()->has('message'))
                        <div class="col-12 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="col-12 mb-2">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" wire:model="password">
                        @error('name') <span class="text-danger">Contraseña es requerida.</span> @enderror
                    </div>
                    <div class="col-12 mb-2">
                        <label for="password" class="form-label">Repetir Contraseña</label>
                        <input type="password" name="password_recover" id="password_recover" class="form-control" wire:model="password_recover">
                        @error('name') <span class="text-danger">Repetir Contraseña es requerida.</span> @enderror
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
        window.addEventListener('swal:alert', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
            });
        });
    </script>
</div>
