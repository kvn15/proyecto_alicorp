@extends('admin.pages.inicio.layout')

@section('header_left')
  <span>Landing Promocional > <b>Nueva Proyecto Landing</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
<button type="button" class="btn btn-inactivo">
    Inactivo
</button>
@endsection

@section('inicio_dash')
<div class="row-show">
    <x-admin.menu-reg ruta="landing_promocional" />
    <div class="body-right">
        <h3>Asignaciones</h3>

        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <div class="col-12 col-lg-4 d-flex justify-content-start" style="gap: 0.7em">
                    <div class="filtro-select-btn">
                        <span>PDV: Bodega Lucky</span>
                        <span class="cursor-pointer"><i class="bi bi-x-lg"></i></span>
                    </div>
                    <button class="btn btn-filtro" style="align-self: baseline;"><i class="bi bi-filter"></i> Filtros</button>
                </div>
                <div class="col-12 col-lg-4 d-flex" style="gap: 0.7rem">
                    <div class="input-group mb-3 w-100">
                        <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-right: 0"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Buscar" style="border-left: 0">
                    </div>
                    <button class="btn btn-filtro d-flex" style="align-self: baseline;"><i class="bi bi-download"></i> <span class="ms-2">Descargar</span></button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection