@extends('admin.pages.inicio.layout')

@section('header_left')
  <span><b>Juego Campaña</b></span>
@endsection

@section('header_center')
<div class="d-flex">
  <a href="{{ route('admin.dashboard.juegosWeb') }}" class="btn-proyecto btn-proyectos-left {{ request()->routeIs('admin.dashboard.juegosWeb') ? 'active' : '' }}">Todo los Proyectos</a>
  <a href="{{ route('admin.dashboard.juegosWeb.mio') }}" class="btn-proyecto btn-proyectos-right {{ request()->routeIs('admin.dashboard.juegosWeb.mio') ? 'active' : '' }}">Mis Proyectos</a>
</div>
@endsection

@section('inicio_dash')
<div class="container-fluid m-auto" style="width: 95%">
    <div class="row pt-4">
        <div class="col-12 my-2">
            <h4 class="mb-4">Juego Campaña</h4>
            <hr>
            <livewire:proyecto-lista :tipoProyecto="3" />
        </div>
    </div>
</div>
@endsection