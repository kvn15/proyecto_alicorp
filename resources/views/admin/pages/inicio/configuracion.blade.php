@extends('admin.pages.inicio.layout')

@section('header_left')
    <span><b>Configuración</b></span>
@endsection

@section('inicio_dash')

    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-6">
                <div class="card mt-5"><br><br>
                    <center>
                        <img class="rounded-circle" style="height: 7.5rem; width: 7.5rem;"
                            src="{{ !empty($adminData->profile_image) ? url('img/upload/admin_images/' . $adminData->profile_image) : url('img/upload/no_image.jpg') }}"
                            alt="Imagen PErfil">
                    </center>

                    <div class="card-body">
                        <h4 class="card-title ">Nombres : {{ $adminData->name }} </h4>
                        <hr>
                        <h4 class="card-title mt-4">Correo Electrónico : {{ $adminData->email }} </h4>
                        <hr>
                        <a href="{{ route('dashboard.editar.perfil') }}"
                            class="btn btn-info btn-rounded waves-effect waves-light mt-4"> Edit Perfil</a>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="card-title">Cambiar clave</h4><br><br>


                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show"> {{ $error }} </p>
                            @endforeach
                        @endif

{{-- {{ route('update.password') }} --}}
                        <form method="post" action="{{ route('dashboard.password.perfil')}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Clave</label>
                                <div class="col-sm-10">
                                    <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nueva Clave</label>
                                <div class="col-sm-10">
                                    <input name="newpassword" class="form-control" type="password" id="newpassword">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirmar Clave</label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" class="form-control" type="password"
                                        id="confirm_password">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                        </form>



                    </div>
                </div>


            </div>


        </div>
    @endsection
