<div class="w-100 row">
    <div class="col-12 d-flex justify-content-between">
        <div>
            <button class="btn btn-outline-dark" wire:click="downloadExcel">Descargar Formato</button>
            <label for="file" class="btn btn-outline-dark">Carga Masiva</label>
            <input type="file" wire:model="file" hidden id="file" accept=".xlsx, .xls">
            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalEditarB">Editar</button>
        </div>
        <div class="d-flex justify-content-end">
            <div class="input-group input-group-tabla mb-3 w-100">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                <input wire:model.debounce.300ms="search" type="text" class="form-control form-table" placeholder="Buscar" style="border-left: 0">
            </div>
            <button class="btn btn-outline-danger ms-2" style="align-self: flex-start" data-bs-toggle="modal" data-bs-target="#modalAgregarA" wire:click="allDataResetForm">Agregar</button>
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
                        <td>{{ $value->xplorer->name }} {{ $value->xplorer->apellido }}</td>
                        <td>{{ $value->xplorer->documento }}</td>
                        <td>
                            @if (isset($value->award_project->nombre_premio))
                                <span class="badge text-bg-success" style="background-color: #05CD991A !important;color: #05CD99 !important;font-weight: 700;">{{ $value->award_project->nombre_premio }}</span>
                            @else
                                @foreach ($value->premio_pdvs as $item)
                                    <span class="badge text-bg-success" style="background-color: #05CD991A !important;color: #05CD99 !important;font-weight: 700;">{{ $item->award_project->nombre_premio }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if (isset($value->qty_premio))
                                {{ $value->qty_premio }}
                            @else
                                @php
                                    $sum = 0;
                                @endphp
                                @foreach ($value->premio_pdvs as $item)
                                    @php
                                        $sum += (int) $item->qty_premio;
                                    @endphp
                                @endforeach
                                {{ $sum }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $asignacion->links() }}
        </div>
    </div>

    {{-- Modal Agregar --}}
    <div wire:ignore.self class="modal fade" id="modalAgregarA" tabindex="-1" aria-labelledby="exampleModalAgregar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <form wire:submit.prevent="store" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalAgregar">Asignar Xplorer</h1>
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
                    <div class="col-12 col-lg-6 mb-2"  wire:ignore>
                        <label for="xplorerSelect" class="form-label">Xplorer</label>
                        {{-- <select name="xplorer" id="xplorer" class="form-select" wire:model="xplorer">
                            <option>Seleccione</option>
                            @foreach ($xplorers as $item)
                                <option value="{{ $item->id }}" {{ $item->status == 1 ? '' : 'disabled' }}>{{ $item->name }}</option>
                            @endforeach
                        </select> --}}
                        <select class="form-select form-input-alicorp" id="xplorerSelect"  name="xplorerSelect" data-placeholder="Escojer Xplorers" multiple>
                            @foreach ($xplorers as $item)
                                <option value="{{ $item->id }}" {{ $item->status == 1 ? '' : 'disabled' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        {{-- @error('xplorer') <span class="text-danger">Xplorer es requerida.</span> @enderror --}}
                    </div>
                    <hr>
                    <div class="col-12 col-lg-3 my-2">
                        <label for="premio" class="form-label">Premio</label>
                        <select name="premio" id="premio" class="form-select" wire:model="premio">
                            <option>Seleccione</option>
                            @foreach ($premios as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre_premio }}</option>
                            @endforeach
                        </select>
                        @error('premio') <span class="text-danger">Premio es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-3 my-2">
                        <label for="qty_premio" class="form-label">Qty Premio</label>
                        <input type="number" name="qty_premio" id="qty_premio" class="form-control" wire:model="qty_premio" min="1" value="1">
                        @error('qty_premio') <span class="text-danger">Cantidad de Premio es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-3 my-2">
                        <label for="probabilidad" class="form-label">Probabilidad</label>
                        {{-- <select name="prob_no_premio" id="prob_no_premio" class="form-select w-100" wire:model="probabilidad">
                            <option value="0" selected>0</option>
                            <option value="10" selected>10</option>
                            <option value="15" selected>15</option>
                            <option value="20" selected>20</option>
                            <option value="25" selected>25</option>
                            <option value="30" selected>30</option>
                            <option value="35" selected>35</option>
                            <option value="40" selected>40</option>
                            <option value="45" selected>45</option>
                            <option value="50" selected>50</option>
                            <option value="55" selected>55</option>
                            <option value="60" selected>60</option>
                            <option value="65" selected>65</option>
                            <option value="70" selected>70</option>
                            <option value="75" selected>75</option>
                            <option value="80" selected>80</option>
                            <option value="85" selected>85</option>
                            <option value="90" selected>90</option>
                            <option value="95" selected>95</option>
                            <option value="100" selected>100</option>
                        </select> --}}
                        <input type="number" name="probabilidad" id="probabilidad" wire:model="probabilidad" min="0" max="100" class="form-control">
                        @error('probabilidad') <span class="text-danger">Probabilidad es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-2 my-2 d-flex justify-content-center align-items-end">
                        <button type="button" class="btn btn-primary" style="background-color: #ED1B2F; color: #fff; border: 0;"
                        wire:click="addTablePremio"
                        >Agregar</button>
                    </div>

                    <div class="col-12 mt-2">
                        <table class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>Premio</th>
                                    <th>Cantidad</th>
                                    <th>Probabilidad</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lPremios as $item)
                                <tr>
                                    <td>
                                        {{ $item["premioName"] }}
                                    </td>
                                    <td>
                                        {{ $item["cantidad"] }}
                                    </td>
                                    <td>
                                        {{ $item["probabilidad"] }}
                                    </td>
                                    <td>
                                        {{-- <button type="button" class="btn btn-primary" style="background-color: #0f76fc; color: #fff; border: 0;"
                                            wire:click="getPremioById({{ $item['premioId'] }})"
                                        >
                                            Editar
                                        </button> --}}
                                        <button type="button" class="btn btn-primary" style="background-color: #ED1B2F; color: #fff; border: 0;"
                                            wire:click="deletePremio({{ $item['premioId'] }})"
                                        >
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    <div wire:ignore.self class="modal fade" id="modalEditarB" tabindex="-1" aria-labelledby="exampleModalEditar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form wire:submit.prevent="update" class="modal-content">
                <div class="modal-header" style="background-color: #ED1B2F; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalEditar">Editar Asignación Xplorer</h1>
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
                    <div class="col-12 col-lg-3 my-2">
                        <label for="premio" class="form-label">Premio</label>
                        <select name="premio" id="premio" class="form-select" wire:model="premio" {{ $this->textBtnAdd == "Editar" ? 'disabled' : '' }}>
                            <option>Seleccione</option>
                            @foreach ($premios as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre_premio }}</option>
                            @endforeach
                        </select>
                        @error('premio') <span class="text-danger">Premio es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-3 my-2">
                        <label for="qty_premio" class="form-label">Qty Premio</label>
                        <input type="number" name="qty_premio" id="qty_premio" class="form-control" wire:model="qty_premio" min="1" value="1">
                        @error('qty_premio') <span class="text-danger">Cantidad de Premio es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-3 my-2">
                        <label for="probabilidad" class="form-label">Probabilidad</label>
                        {{-- <select name="prob_no_premio" id="prob_no_premio" class="form-select w-100" wire:model="probabilidad">
                            <option value="0" selected>0</option>
                            <option value="10" selected>10</option>
                            <option value="15" selected>15</option>
                            <option value="20" selected>20</option>
                            <option value="25" selected>25</option>
                            <option value="30" selected>30</option>
                            <option value="35" selected>35</option>
                            <option value="40" selected>40</option>
                            <option value="45" selected>45</option>
                            <option value="50" selected>50</option>
                            <option value="55" selected>55</option>
                            <option value="60" selected>60</option>
                            <option value="65" selected>65</option>
                            <option value="70" selected>70</option>
                            <option value="75" selected>75</option>
                            <option value="80" selected>80</option>
                            <option value="85" selected>85</option>
                            <option value="90" selected>90</option>
                            <option value="95" selected>95</option>
                            <option value="100" selected>100</option>
                        </select> --}}
                        <input type="number" name="probabilidad" id="probabilidad" wire:model="probabilidad" min="0" max="100" class="form-control">
                        @error('probabilidad') <span class="text-danger">Probabilidad es requerida.</span> @enderror
                    </div>
                    <div class="col-12 col-lg-3 my-2 d-flex justify-content-center align-items-end">
                        <button type="button" class="btn btn-primary me-1" style="background-color: #ED1B2F; color: #fff; border: 0;"
                        wire:click="addTablePremio"
                        >
                        {{ $textBtnAdd }}
                    </button>
                        <button type="button" class="btn btn-primary" style="background-color: #2e2e2e; color: #fff; border: 0;" wire:click="cancelar()"
                        >Cancelar</button>
                    </div>

                    <div class="col-12 mt-2">
                        <table class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>Premio</th>
                                    <th>Cantidad</th>
                                    <th>Probabilidad</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lPremios as $item)
                                <tr>
                                    <td>
                                        {{ $item["premioName"] }}
                                    </td>
                                    <td>
                                        {{ $item["cantidad"] }}
                                    </td>
                                    <td>
                                        {{ $item["probabilidad"] }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" style="background-color: #0f76fc; color: #fff; border: 0;"
                                            wire:click="getListaById({{ $item['premioId'] }})"
                                        >
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-primary" style="background-color: #ED1B2F; color: #fff; border: 0;"
                                            wire:click="deletePremio({{ $item['premioId'] }})"
                                        >
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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


    @section('script_jquery')
        <script>


            $( '#xplorerSelect' ).select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: false,
                dropdownParent: $( '#xplorerSelect' ).parent(),
            } );

            $('#xplorerSelect').on('change', function () {
                var data = $(this).val(); // Obtener los valores seleccionados
                @this.set('lXplorers', data);
            });
            window.addEventListener('xplorerFin', event => {
                $('#xplorerSelect').val(null).trigger('change');
            });

        </script>
    @endsection
</div>
