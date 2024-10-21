@extends('adminPanel.template.layout')

@section('contenido')
    {{-- @php
    $sliders = App\Models\HomeInicio::all();    
    @endphp --}}

    <div class="page-content">
        <div class="container-fluid">
            <div class="row proyecto mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Inicio Sección Slide Page </h4>
                                <form method="post" action="{{ route('adminPanel.promociones.store.slider') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-5"></div>

                                    <div class="row mb-3">
                                        <label for="images">Selecciona las imágenes:</label>
                                        <input type="file" name="images[]" multiple>
                                    </div>
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                    <!-- end row -->
                                    <button type="submit">Subir Imágenes</button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Editar los Sliders</h4>


                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Slider</th>
                                            <th>Opción</th>

                                    </thead>


                                    <tbody>
                                        @php($i = 1)
                                        @foreach ($AllSlideP as $item)
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> <img src="{{ asset('storage/' . $item->promociones_slide) }}"
                                                        style="width: 60px; height: 50px;"> </td>

                                                <td>
                                                    {{-- <a href="{{ route('adminPanel.edit.slide', $item->id) }}" class="btn btn-info sm"
                                                        title="Edit Data"> <i class="fas fa-edit"></i> </a> --}}

                                                    <a href="{{ route('adminPanel.promociones.delete.slide', $item->id) }}"
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
