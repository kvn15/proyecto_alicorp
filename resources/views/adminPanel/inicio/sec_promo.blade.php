@extends('adminPanel.template.layout')

@section('contenido')
    {{-- @php
    $sliders = App\Models\HomeInicio::all();    
    @endphp --}}

    <div class="page-content">

        <div class="container-fluid mt-5">
            <h1>Configuracion Inicio Sección 2</h1>
            <div class="row proyecto ">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Promociones de Redes Sociales </h4>
                                <form method="post" action="{{ route('adminPanel.inicio.store.promo') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-5"></div>

                                    <div class="row mb-3">
                                        <label for="promos">Selecciona las imágenes de las Promociones:</label>
                                        <input type="file" name="promos[]" multiple>
                                    </div>
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                    @endforeach

                                    <button type="submit">Subir Promociones</button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Editar las Promociones</h4>


                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Promoción</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php($i = 1)
                                        @foreach ($AllPromo as $item1)
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> <img src="{{ asset('storage/' . $item1->home_promos) }}"
                                                        style="width: 60px; height: 50px;"> </td>

                                                <td>
                                                    <a href="{{ route('adminPanel.inicio.delete.promo', $item1->id) }}"
                                                        class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                            class="fas fa-trash-alt"></i> </a>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#promos').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showpromos').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
