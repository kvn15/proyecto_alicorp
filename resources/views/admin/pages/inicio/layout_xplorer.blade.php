@extends('admin.template.layout_xplorer')

@section('header_left')
  <span>Hola, <b>{{ Auth::user()->name }}</b></span>
@endsection

@section('contenido')
  @yield('inicio_dash')
@endsection