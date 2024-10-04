@extends('admin.pages.inicio.layout')

@section('header_left')
  <span>Landing Promocional > <b>{{ $landing->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
@if ($landing->status)
<button type="button" class="btn btn-inactivo">
    Activo
</button>
@else
<button type="button" class="btn btn-inactivo">
    Inactivo
</button>
@endif
@endsection

@section('inicio_dash')
<div class="row-show">
    <x-admin.menu-reg ruta="landing_promocional" />
    <div class="body-right">
        <h3>Ganadores</h3>

        <div class="row">
            <livewire:ganadores-table />
        </div>
    </div>
</div>
@endsection