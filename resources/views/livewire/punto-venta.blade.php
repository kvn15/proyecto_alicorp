<div>
    <style>
        /* Establecer el contenedor con un alto fijo y permitir el scroll */
        .table-container {
            max-height: 400px; /* Altura máxima para el contenedor */
            overflow-y: auto;  /* Habilitar el scroll vertical */
        }

        /* Fijar el encabezado de la tabla */
        thead.thead-venta {
            position: sticky;
            top: -0.1px;
            background-color: #f8f9fa;
            z-index: 1;
        }
    </style>

    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalGestionar" wire:click="resetForm">
        Gestionar Punto de Ventas
    </button>

    
    <div wire:ignore.self class="modal fade" id="modalGestionar" tabindex="-1" aria-labelledby="exampleModalGestionar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalGestionar">Gestionar Puntos de Venta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store" class="w-100 row">
                        <input type="hidden" name="idPuntoVenta" wire:model="idPuntoVenta">
                        <div class="col-8">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Punto de Venta" wire:model="puntoVenta">
                                <label for="floatingInput">Punto de Venta</label>
                                @error('puntoVenta') <span class="text-danger">Punto de Venta es requerida.</span> @enderror
                            </div>
                        </div>
                        <div class="col-4 d-flex align-items-center" style="gap: 0.5rem;">
                            <button type="submit" class="btn" style="background-color: #ED1B2F; color: #fff; font-size: 14px;"><i class="far fa-save"></i> Guardar</button>
                            <button type="button" class="btn" style="background-color: #2e2e2e; color: #fff; font-size: 14px;" wire:click="resetForm"><i class="fas fa-times"></i> Cancelar</button>
                        </div>
                    </form>
                    <p class="mb-1">Lista de Puntos de Ventas</p>
                    <hr>
                    <div class="w-100 table-responsive mt-3 table-container">
                        <table class="table table-sm table-bordered">
                            <thead class="thead-venta">
                                <tr>
                                    <th>Id</th>
                                    <th>Punto de Venta</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lPuntoVenta as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                                    <td class="d-flex" style="gap: 5px;">
                                        <button type="button" class="btn btn-outline-primary" wire:click="editar({{ $item }})"><i class="fas fa-pencil-alt"></i></button>
                                        @if ($item->status == 1)
                                        <button class="btn btn-outline-secondary" wire:click="changeEstado({{ $item }})"><i class="fas fa-store-slash"></i></button>
                                        @else
                                        <button class="btn btn-outline-warning" wire:click="changeEstado({{ $item }})"><i class="fas fa-store-alt"></i></button>
                                        @endif
                                        <button class="btn btn-outline-danger" wire:click="delete({{ $item }})"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #2e2e2e; color: #fff; border: 0;">Cerrar</button>
                </div>
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
