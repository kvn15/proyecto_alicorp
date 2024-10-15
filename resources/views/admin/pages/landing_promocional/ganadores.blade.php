@extends('admin.pages.inicio.layout')

@section('header_left')
  <span>{{ $landing->project_type->name }} > <b>{{ $landing->nombre_promocion }}</b></span>
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
    <x-admin.menu-reg ruta="{{$landing->project_type->ruta_name}}"  id="{{ $landing->id }}" />
    <div class="body-right">
        <h3>Ganadores</h3>

        <div class="row">
            <livewire:ganadores-table  :projectId="$landing->id"/>
        </div>
    </div>
</div>
@endsection