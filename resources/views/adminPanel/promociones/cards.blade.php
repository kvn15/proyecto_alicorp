@extends('adminPanel.template.layout')

@section('contenido')
    {{-- @php
    $sliders = App\Models\HomeInicio::all();    
    @endphp --}}

    <div class="page-content">
        <div class="container-fluid">
            <title>Agregar Cards</title>
            <script>
                function addItem() {
                    const container = document.getElementById('items-container');
                    const index = container.children.length;
                    const newItem = `
                        <div class="card card-warning card-outline mb-4">
                            <div class="item card-body">
                                <div class="row mb-3"> 
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Título</label>
                                    <div class="col-sm-10"> 
                                        <input type="text" class="form-control" name="items[${index}][text]" placeholder="Titulo" required>
                                    </div>
                                </div>
                                <div class="row mb-3"> 
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen Card</label>
                                    <div class="col-sm-10"> 
                                        <input type="file" class="form-control" name="items[${index}][image]" accept="image/*" required>
                                         </div>
                                </div>
                                <div class="row mb-3"> 
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Promoción</label>
                                    <div class="col-sm-5"> 
                                        <input type="date" class="form-control" name="items[${index}][event_date]"  required>
                                         </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="button" onclick="removeItem(this)">Eliminar</button>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', newItem);
                }
        
                function removeItem(button) {
                    button.parentElement.parentElement.remove();
                }
            </script>
        
            <h1 class="mt-2">Sección de Cards de Promociones</h1>
            <form action="{{ route('adminPanel.promociones.item.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">               
                @csrf
                <div id="items-container"></div>
                <button class="btn btn-primary" type="button" onclick="addItem()">Agregar Card</button>
                <button class="btn btn-primary" type="submit">Guardar</button>            
            </form>       
    
        </div>

      
        
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Cards Promocionales</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Imagen Card</th>
                                    <th>Título</th>
                                    <th>Fecha Evento</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @if($Allcards->isEmpty())
                                     <p>No hay Cards disponibles.</p>
                                @else
                                    @foreach ($Allcards as $item1)
                                    
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td> <img src="{{ asset('storage/' . $item1->image_path) }}"
                                                    style="width: 60px; height: 50px;"> </td>
                                            <td>{{$item1->text}}</td>
                                            <td>{{ Carbon\Carbon::parse($item1->event_date)->format('d-m-yy') }}</td>
                                            <td>
                                
                                                <button title="Edit Data" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item1->id }}" data-text="{{ $item1->text }}" data-event_date="{{ $item1->event_date }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <a href="{{ route('adminPanel.promociones.delete.card', $item1->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i> </a>

                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

    @if($Allcards->isEmpty())
                                     <h3>No hay Cards disponibles.</h3>
                                     @else
    <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('adminPanel.promociones.item.update', $item1->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">

                    <div class="mb-3">
                        <label for="editText" class="form-label">Texto</label>
                        <input type="text" class="form-control" id="editText" name="text" required>
                    </div>

                    <div class="mb-3">
                        <label for="editEventDate" class="form-label">Fecha del evento</label>
                        <input type="date" class="form-control" id="editEventDate" name="event_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="editImage" class="form-label">Imagen (opcional)</label>
                        <input type="file" class="form-control" id="editImage" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
<!-- Agregar este script al final del archivo Blade -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var text = button.getAttribute('data-text');
            var eventDate = button.getAttribute('data-event_date');

            // Asignar los valores al modal
            editModal.querySelector('#editId').value = id;
            editModal.querySelector('#editText').value = text;
            editModal.querySelector('#editEventDate').value = eventDate;
        });
    });
</script>

      
@endsection
