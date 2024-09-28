@extends('admin.template.layout')

@section('header_left')
  <span>Hola, <b>{{ Auth::user()->name }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
  <button type="button" class="btn-proyecto btn-proyectos-left active">Todo los Proyectos</button>
  <button type="button" class="btn-proyecto btn-proyectos-right">Mis Proyectos</button>
</div>
@endsection

@section('header_right')
<button type="button" class="btn btn-alicorp">
    <i class="bi bi-plus-circle"></i> Crear Proyecto
</button>
@endsection

@section('contenido')
  @yield('inicio_dash')
@endsection
