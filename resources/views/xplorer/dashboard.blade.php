@extends('admin.pages.inicio.layout_xplorer')

@section('header_left')
  <span>  Hola, <b>{{ Auth::user()->name }}</b></span>
@endsection

@section('inicio_dash')
<div class="container-fluid m-auto" style="width: 95%">
    <div class="row pt-4">
        <div class="col-12 my-2">
            <h4 class="mb-4">Juego Campaña</h4>
            <hr>
            <livewire:proyecto-lista :tipoProyecto="3" :bMisProyectos="true" :xplorer="true" />
        </div>
    </div>
</div>

@endsection