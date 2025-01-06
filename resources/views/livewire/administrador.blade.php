<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="w-100 row">
        <div class="col-12 d-flex justify-content-between">
            <div class="input-group mb-3 w-100" style="max-width: 500px;">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" style="border-left: 0">
            </div>

            <button class="btn btn-outline-danger ms-2" style="align-self: flex-start" data-bs-toggle="modal" data-bs-target="#modalAgregarT" wire:click="resetForm"><i class="fas fa-user-plus"></i> Agregar Administrador</button>
        </div>
        <div class="col-12">
            <div class="table-responsive table-alicorp">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id <span wire:click="sortBy('id')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Nombres <span wire:click="sortBy('name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Correo <span wire:click="sortBy('email')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Fecha Registro <span wire:click="sortBy('created_at')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                            <th>Status</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $admin as $value )
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email  }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                @if ($value->status == 1)
                                 <span class="badge text-bg-success" style="background-color: #05CD991A !important;color: #05CD99 !important;font-weight: 700; font-size: 1.1em;">Activo</span>
                                @else
                                    <span class="badge text-bg-success" style="background-color: #cd05051a !important;color: rgb(205, 5, 22) !important;font-weight: 700; font-size: 1.1em;">Inactivo</span>
                                @endif
                            </td>
                            <td class="flex flex-row" style="gap: 0.5rem;">
                                <button class="btn btn-outline-info" wire:click="findAdminById({{ $value->id }})" data-bs-toggle="modal" data-bs-target="#modalEditarT">
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
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $admin->links() }}
            </div>
        </div>
    </div>

    {{-- Modal Agregar --}}
    <div wire:ignore.self class="modal fade" id="modalAgregarT" tabindex="-1" aria-labelledby="exampleModalAgregar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <form wire:submit.prevent="store" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalAgregar">Agregar Administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;" wire:click="resetForm"></button>
                </div>
                <div class="modal-body row">
                    @if (session()->has('message'))
                        <div class="col-12 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="name" class="form-label">Nombres</label>
                        <input type="text" name="name" id="name" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">Nombres es requerido.</span> @enderror
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
                        <label for="password_recover" class="form-label">Repetir Contraseña</label>
                        <input type="password" name="password_recover" id="password_recover" class="form-control" wire:model="password_recover">
                        @error('password_recover') <span class="text-danger">Repetir Contraseña es requerida.</span> @enderror
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
    <div wire:ignore.self class="modal fade" id="modalEditarT" tabindex="-1" aria-labelledby="examplemodalEditar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <form wire:submit.prevent="update" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="examplemodalEditar">Editar Administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;" wire:click="resetForm"></button>
                </div>
                <div class="modal-body row">
                    @if (session()->has('message'))
                        <div class="col-12 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="name" class="form-label">Nombres</label>
                        <input type="text" name="name" id="name" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">Nombres es requerido.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" name="email" id="email" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">Correo es requerida.</span> @enderror
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
