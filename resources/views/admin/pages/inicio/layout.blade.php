@extends('admin.template.layout')

@section('header_left')
  <span>Hola, <b>{{ Auth::user()->name }}</b></span>
@endsection

@section('header_right')
<button type="button" class="btn btn-alicorp" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modal-nuevo">
    <i class="bi bi-plus-circle"></i> Crear Proyecto
</button>
@endsection

@section('contenido')
  @yield('inicio_dash')
@endsection