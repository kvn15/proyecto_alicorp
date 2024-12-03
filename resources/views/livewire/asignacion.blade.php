<div class="w-100 row">
    <div class="col-12 d-flex justify-content-between">
        <div>
            <button class="btn btn-outline-dark" wire:click="downloadExcel">Descargar Formato</button>
            <label for="file" class="btn btn-outline-dark">Carga Masiva</label>
            <input type="file" wire:model="file" hidden id="file" accept=".xlsx, .xls">
            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</button>
        </div>
        <div class="d-flex justify-content-end">
            <div class="input-group input-group-tabla mb-3 w-100">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control form-table" placeholder="Buscar" style="border-left: 0">
            </div>
            <button class="btn btn-outline-danger ms-2" style="align-self: flex-start" data-bs-toggle="modal" data-bs-target="#modalAgregar" wire:click="allDatas">Agregar</button>
        </div>
    </div>

    <div class="col-12">
        <div class="table-responsive table-alicorp">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id <span wire:click="sortBy('asignacion_projects.id')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Fecha Inicio <span wire:click="sortBy('asignacion_projects.fecha_inicio')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Fecha Fin <span wire:click="sortBy('asignacion_projects.fecha_fin')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Punto de Venta <span wire:click="sortBy('sales_points.name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Xplorer <span wire:click="sortBy('xplorers.name')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Dni <span wire:click="sortBy('xplorers.documento')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Premios <span wire:click="sortBy('award_projects.nombre_premio')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                        <th>Qty Premios <span wire:click="sortBy('asignacion_projects.qty_premio')" style="cursor: pointer;" class="ms-3"><i class="bi bi-arrow-down-up"></i></span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $asignacion as $value )
                    <tr>    
                        <td><input class="form-check-input me-2" type="checkbox" value="1" wire:model="selected.{{ $value->id }}"> {{ $value->id }}</td>
                        <td>{{ $value->fecha_inicio }}</td>
                        <td>{{ $value->fecha_fin }}</td>
                        <td>{{ $value->sales_point->name }}</td>
                        <td>{{ $value->xplorer->name }}</td>
                        <td>{{ $value->xplorer->documento }}</td>
                        <td>{{ $value->award_project->nombre_premio }}</td>
                        <td>{{ $value->qty_premio }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $asignacion->links() }}
        </div>
    </div>

    {{-- Modal Agregar --}}
    <div wire:ignore.self class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalAgregar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form wire:submit.prevent="store" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalAgregar">Agregar Xplorer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;" wire:click="resetForm"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="fecha_ini" class="form-label">Fecha Inicio</label>
                        <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" wire:model="fecha_ini">
                        @error('fecha_ini') <span class="text-danger">Fecha de Inicio es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="fecha_fin" class="form-label">Fecha Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" wire:model="fecha_fin">
                        @error('fecha_fin') <span class="text-danger">Fecha de Fin es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="punto_venta" class="form-label">Punto de Venta</label>
                        <select name="punto_venta" id="punto_venta" class="form-select" wire:model="punto_venta">
                            <option>Seleccione</option>
                            @foreach ($sales_point as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('punto_venta') <span class="text-danger">Punto de Venta es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="xplorer" class="form-label">Xplorer</label>
                        <select name="xplorer" id="xplorer" class="form-select" wire:model="xplorer">
                            <option>Seleccione</option>
                            @foreach ($xplorers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('xplorer') <span class="text-danger">Xplorer es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="premio" class="form-label">Premio</label>
                        <select name="premio" id="premio" class="form-select" wire:model="premio">
                            <option>Seleccione</option>
                            @foreach ($premios as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre_premio }}</option>
                            @endforeach
                        </select>
                        @error('premio') <span class="text-danger">Premio es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="qty_premio" class="form-label">Qty Premio</label>
                        <input type="number" name="qty_premio" id="qty_premio" class="form-control" wire:model="qty_premio">
                        @error('qty_premio') <span class="text-danger">Cantidad de Premio es requerida.</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #2e2e2e; color: #fff; border: 0;" wire:click="resetForm">Cancelar</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #ED1B2F; color: #fff; border: 0;">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Editar --}}
    <div wire:ignore.self class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalEditar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form wire:submit.prevent="update" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalEditar">Editar Xplorer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;"></button>
                </div>
                <div class="modal-body row">
                    <input type="hidden" name="idAsignacion" wire:model="idAsignacion">
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="fecha_ini" class="form-label">Fecha Inicio</label>
                        <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" wire:model="fecha_ini">
                        @error('fecha_ini') <span class="text-danger">Fecha de Inicio es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="fecha_fin" class="form-label">Fecha Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" wire:model="fecha_fin">
                        @error('fecha_fin') <span class="text-danger">Fecha de Fin es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="punto_venta" class="form-label">Punto de Venta</label>
                        <select name="punto_venta" id="punto_venta" class="form-select" wire:model="punto_venta">
                            <option>Seleccione</option>
                            @foreach ($sales_point as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('punto_venta') <span class="text-danger">Punto de Venta es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="xplorer" class="form-label">Xplorer</label>
                        <select name="xplorer" id="xplorer" class="form-select" wire:model="xplorer">
                            <option>Seleccione</option>
                            @foreach ($xplorers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('xplorer') <span class="text-danger">Xplorer es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="premio" class="form-label">Premio</label>
                        <select name="premio" id="premio" class="form-select" wire:model="premio">
                            <option>Seleccione</option>
                            @foreach ($premios as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre_premio }}</option>
                            @endforeach
                        </select>
                        @error('premio') <span class="text-danger">Premio es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="qty_premio" class="form-label">Qty Premio</label>
                        <input type="number" name="qty_premio" id="qty_premio" class="form-control" wire:model="qty_premio">
                        @error('qty_premio') <span class="text-danger">Cantidad de Premio es requerida.</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #2e2e2e; color: #fff; border: 0;">Cancelar</button>
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
