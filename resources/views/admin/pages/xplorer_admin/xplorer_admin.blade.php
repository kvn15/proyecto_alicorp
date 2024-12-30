@extends('admin.template.layout')

@section('header_left')
  <span>Configurar Administrado y Xplorer</b></span>
@endsection

@section('header_center')
<div class="d-flex">
  <button type="button" class="btn-proyecto btn-proyectos-left active">Todo los Proyectos</button>
  <button type="button" class="btn-proyecto btn-proyectos-right">Mis Proyectos</button>
</div>
@endsection

@section('contenido')
<div class="page-content">
    <div class="container-fluid">
        <nav class="mt-4">
            <div class="nav nav-tabs mb-3 nav-tab-alicorp" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-dominio-tab" data-bs-toggle="tab" data-bs-target="#nav-dominio" type="button" role="tab" aria-controls="nav-dominio" aria-selected="false">Xplorers</button>
                {{-- <button class="nav-link " id="nav-proyecto-tab" data-bs-toggle="tab" data-bs-target="#nav-proyecto" type="button" role="tab" aria-controls="nav-proyecto" aria-selected="true">Administradores</button> --}}
            </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade " id="nav-proyecto" role="tabpanel" aria-labelledby="nav-proyecto-tab">
                <livewire:administrador />
            </div>
            <div class="tab-pane active show" id="nav-dominio" role="tabpanel" aria-labelledby="nav-dominio-tab">
                <livewire:xplorer />
            </div>
        </div>
    </div>
</div>
@endsection
