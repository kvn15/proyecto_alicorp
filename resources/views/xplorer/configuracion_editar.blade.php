@extends('admin.pages.inicio.layout_xplorer')

@section('header_left')
    <span><b>Editar Perfil</b></span>
@endsection

@section('inicio_dash')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content mt-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <form method="post" action="{{ route('xplorer.grabar.perfil') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nombres</label>
                                    <div class="col-sm-10">
                                        <input name="name" class="form-control" type="text"
                                            value="{{ $editData->name }}" id="example-text-input">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Apellido</label>
                                    <div class="col-sm-10">
                                        <input name="apellido" class="form-control" type="text"
                                            value="{{ $editData->apellido }}" id="example-text-input">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tipo Documento</label>
                                    <div class="col-sm-10">
                                        <select name="tipo_documento" id="tipo_documento" class="form-select">
                                            <option value="DNI" {{ $editData->tipo_documento == 'DNI' ? 'selected' : '' }}>DNI</option>
                                            <option value="C.EXT" {{ $editData->tipo_documento == 'C.EXT' ? 'selected' : '' }}>C.EXT</option>
                                            <option value="PASAPORTE" {{ $editData->tipo_documento == 'PASAPORTE' ? 'selected' : '' }}>PASAPORTE</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Documento</label>
                                    <div class="col-sm-10">
                                        <input name="documento" class="form-control" type="text"
                                            value="{{ $editData->documento }}" id="example-text-input">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Telefono</label>
                                    <div class="col-sm-10">
                                        <input name="telefono" class="form-control" type="text"
                                            value="{{ $editData->telefono }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Correo Electrónico</label>
                                    <div class="col-sm-10">
                                        <input name="email" class="form-control" type="text"
                                            value="{{ $editData->email }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                                    <div class="col-sm-10">
                                        <input name="profile_image" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ !empty($editData->profile_image) ? url('img/upload/admin_images/' . $editData->profile_image) : url('img/upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar">
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
