@extends('admin.template.layout')

@section('header_left')
  <span>Configurar Administradores,  Xplorers y Usuarios</b></span>
@endsection


@section('contenido')
<div class="page-content">
    <div class="container-fluid">
        <nav class="mt-4">
            <div class="nav nav-tabs mb-3 nav-tab-alicorp" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-proyecto-tab" data-bs-toggle="tab" data-bs-target="#nav-proyecto" type="button" role="tab" aria-controls="nav-proyecto" aria-selected="true">Administradores</button>
                <button class="nav-link" id="nav-dominio-tab" data-bs-toggle="tab" data-bs-target="#nav-dominio" type="button" role="tab" aria-controls="nav-dominio" aria-selected="false">Xplorers</button>
                <button class="nav-link" id="nav-user-tab" data-bs-toggle="tab" data-bs-target="#nav-user" type="button" role="tab" aria-controls="nav-user" aria-selected="false">Usuarios</button>
            </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane active show" id="nav-proyecto" role="tabpanel" aria-labelledby="nav-proyecto-tab">
                <livewire:administrador />
            </div>
            <div class="tab-pane fade" id="nav-dominio" role="tabpanel" aria-labelledby="nav-dominio-tab">
                <livewire:xplorer />
            </div>
            <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                <livewire:usuario />
            </div>
        </div>
    </div>
</div>
@endsection
