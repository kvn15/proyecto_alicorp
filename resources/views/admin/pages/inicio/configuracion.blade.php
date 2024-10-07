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
                        <a href="{{ route('dashboard.editar.perfil') }}" class="btn btn-info btn-rounded waves-effect waves-light mt-4" > Edit Perfil</a>

                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
