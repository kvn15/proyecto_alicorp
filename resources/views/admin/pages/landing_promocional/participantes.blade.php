@extends('admin.pages.inicio.layout')

@section('header_left')
  <span>{{ $landing->project_type->name }} > <b>{{ $landing->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
@if ($landing->status == 1)
<button type="button" class="btn btn-activo" id="btn_status">
    Activo
</button>
@endif
@if ($landing->status == 0)
<button type="button" class="btn btn-inactivo" id="btn_status">
    Inactivo
</button>
@endif
@if ($landing->status == 2)
<button type="button" class="btn btn-finalizado" id="btn_status">
    Finalizado
</button>
@endif
@endsection

@section('inicio_dash')
<div class="row-show">
    <x-admin.menu-reg ruta="{{$landing->project_type->ruta_name}}"  id="{{ $landing->id }}" />
    <div class="body-right">
        <h3>Participantes</h3>

        <div class="row">
            <livewire:paticipante-table :projectId="$landing->id"/>
        </div>
    </div>
</div>
@endsection