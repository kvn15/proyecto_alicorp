@extends('admin.pages.inicio.layout')

@section('header_left')
  <span>{{ $project->project_type->name }} > <b>{{ $project->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
@if ($project->status)
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
<style>
.btn-delete-img, .btn-delete-img2 {
    position: absolute;
    top: -10px;
    right: -10px;
    border: 0;
    background-color: #E62020;
    color: #fff;
    width: 25px;
    height: 25px;
    border-radius: 50%;
}
</style>
<div class="row-show">
    <x-admin.menu-reg ruta="{{$project->project_type->ruta_name}}" id="{{ $project->id }}" />
    <div class="body-right">
        <h3>Configuración</h3>


        <div>
            <nav>
                <div class="nav nav-tabs mb-3 nav-tab-alicorp" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-proyecto-tab" data-bs-toggle="tab" data-bs-target="#nav-proyecto" type="button" role="tab" aria-controls="nav-proyecto" aria-selected="true">Proyecto</button>
                    <button class="nav-link" id="nav-dominio-tab" data-bs-toggle="tab" data-bs-target="#nav-dominio" type="button" role="tab" aria-controls="nav-dominio" aria-selected="false">Dominio</button>
                    <button class="nav-link" id="nav-vigencia-tab" data-bs-toggle="tab" data-bs-target="#nav-vigencia" type="button" role="tab" aria-controls="nav-vigencia" aria-selected="false">Vigencia</button>
                    <button class="nav-link" id="nav-estilos-tab" data-bs-toggle="tab" data-bs-target="#nav-estilos" type="button" role="tab" aria-controls="nav-estilos" aria-selected="false">Estilos</button>
                    <button class="nav-link" id="nav-premios-tab" data-bs-toggle="tab" data-bs-target="#nav-premios" type="button" role="tab" aria-controls="nav-premios" aria-selected="false">Premios</button>
                    @if ($project->project_type->id == 3)
                    <button class="nav-link" id="nav-condicion-tab" data-bs-toggle="tab" data-bs-target="#nav-condicion" type="button" role="tab" aria-controls="nav-condicion" aria-selected="false">Condicionales</button>
                    <button class="nav-link" id="nav-asignacion-tab" data-bs-toggle="tab" data-bs-target="#nav-asignacion" type="button" role="tab" aria-controls="nav-asignacion" aria-selected="false">Asignaciones PDV</button>
                    @endif
                    <button class="nav-link" id="nav-estado-tab" data-bs-toggle="tab" data-bs-target="#nav-estado" type="button" role="tab" aria-controls="nav-estado" aria-selected="false">Estado</button>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <input type="hidden" name="id" id="id" value="{{ $project->id }}">
                {{-- Proyecto --}}
                <div class="tab-pane fade active show" id="nav-proyecto" role="tabpanel" aria-labelledby="nav-proyecto-tab">
                    <form method="POST" class="row" id="form-info-pro" action="{{ route('project.config.proyecto', $project->id) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Información del Proyecto</h5>
                                <small>Actualiza la información del proyecto</small>
                            </div>
                            <div class="d-flex" style="gap: 0.7rem">
                                {{-- <button type="button" class="btn btn-outline-secondary" style="align-self: center" id="cancelar_proyecto">Cancelar</button> --}}
                                <button type="submit" class="btn btn-alicorp" style="align-self: center" id="btn-info-pro">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="tipo_promocion"><small><b>Tipo de Promoción</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="text" name="tipo_promocion" id="tipo_promocion" class="form-control w-100" value="{{ $project->project_type->name }}" disabled>
                            </div>
                        </div>
                        @if (isset($project->game_id) && !empty($project->game_id))
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="game"><small><b>Juego</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="text" name="game" id="game" class="form-control w-100" value="{{ $project->game->name }}" disabled>
                            </div>
                        </div>
                        @endif
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="id_promo"><small><b>ID de Promoción</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="text" name="id_promo" id="id_promo" class="form-control w-100" value="{{ $project->id }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="fecha_reg"><small><b>Fecha de creación</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="text" name="fecha_reg" id="fecha_reg" class="form-control w-100" value="{{ $project->created_at }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="name_promo"><small><b>Nombre del promoción</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="text" name="name_promo" id="name_promo" class="form-control w-100" value="{{ $project->nombre_promocion }}">
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="desc_promo"><small><b>Descripción del promoción</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="text" name="desc_promo" id="desc_promo" class="form-control w-100" value="{{ $project->desc_promocion }}">
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="marcas"><small><b>Marcas</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                {{-- <input type="text" name="tipo_promocion" id="tipo_promocion" class="form-control w-100"> --}}
                                <div class="w-100">
                                    <select class="form-select" id="small-bootstrap-class-multiple-field" data-placeholder="Escoja las marcas" multiple>
                                        <option>Marca 1</option>
                                        <option>Marca 2</option>
                                        <option>Marca 3</option>
                                        <option>Marca 4</option>
                                        <option>Marca 5</option>
                                        <option>Marca 6</option>
                                        <option>Marca 8</option>
                                        <option>Marca 7</option>
                                        <option>Marca 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @php
                            $imgLogoProyectoRuta = isset($project->ruta_img) && !empty($project->ruta_img) ? $project->ruta_img : '';
                            $imgLogoProyecto = isset($project->ruta_img) && !empty($project->ruta_img) ? '/storage/'.$project->ruta_img : asset('backend/img/thumbnail.png');
                        @endphp
                        <div class="col-12 row border-bottom pb-3 mb-4 py-3">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="desc_promo"><small><b>Cargar Logo Proyecto</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="file" name="logo_proyecto" id="logo_proyecto" hidden>
                                <label for="logo_proyecto" style="cursor: pointer;" class="position-relative">
                                    <button type="button" class="btn-delete-img2">X</button>
                                    <div id="upload_logo_none" class="{{ !isset($imgLogoProyectoRuta) || empty($imgLogoProyectoRuta) ? 'd-flex' : 'd-none' }} flex-column justify-content-center align-items-center border rounded p-2" style="width: 200px;height: 225px;">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6 style="color: #027A48;">Click para Actualizar</h6>
                                        <p style="font-size: 12px;">PNG, JPG (max. 200 x 225 px)</p>
                                    </div>
                                    <img 
                                        src="{{ $imgLogoProyecto }}" 
                                        alt="logo proyecto"
                                        class="img-thumbnail {{ !isset($imgLogoProyectoRuta) || empty($imgLogoProyectoRuta) ? 'd-none' : 'd-block' }}" 
                                        id="img_logo_proyecto" 
                                        style="max-width: 225px; max-height: 225px">
                                </label>
                                <input type="hidden" name="valor_img_logo" id="valor_img_logo" value="{{ $imgLogoProyectoRuta }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-dominio" role="tabpanel" aria-labelledby="nav-dominio-tab">
                    <form method="POST" class="row" id="form-dominio" action="{{ route('project.config.dominio', $project->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Dominio</h5>
                                <small>Actualiza la información del dominio</small>
                            </div>
                            <div class="d-flex" style="gap: 0.7rem">
                                {{-- <button type="button" class="btn btn-outline-secondary" style="align-self: center" id="cancelar_dominio">Cancelar</button> --}}
                                <button type="submit" class="btn btn-alicorp" style="align-self: center">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="dominio"><small><b>URL Dominio</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-7">
                                <div class="input-group w-100">
                                    <span class="input-group-text" id="basic-addon3" style="color: #667085;">http://.../</span>
                                    <input type="text" class="form-control" id="dominio" name="dominio" value="{{ $project->dominio }}">
                                  </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-vigencia" role="tabpanel" aria-labelledby="nav-vigencia-tab">
                    
                    <form method="POST" action="{{ route('project.config.vigencia', $project->id) }}" class="row" id="form-vigencia">
                        @csrf
                        @method('PUT')
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Vigencia</h5>
                                <small>Actualiza la información de la duración del proyecto</small>
                            </div>
                            <div class="d-flex" style="gap: 0.7rem">
                                {{-- <button type="button" class="btn btn-outline-secondary" style="align-self: center"  id="cancelar_vigencia">Cancelar</button> --}}
                                <button type="submit" class="btn btn-alicorp" style="align-self: center">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="fecha_ini_proyecto"><small><b>Fecha de Inicio proyecto</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="date" name="fecha_ini_proyecto" id="fecha_ini_proyecto" class="form-control w-100" value="{{ $project->fecha_ini_proyecto }}">
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="fecha_fin_proyecto"><small><b>Fecha de finalización proyecto</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="date" name="fecha_fin_proyecto" id="fecha_fin_proyecto" class="form-control w-100" value="{{ $project->fecha_fin_proyecto }}">
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="fecha_ini_participar"><small><b>Fecha de Inicio para participar</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="date" name="fecha_ini_participar" id="fecha_ini_participar" class="form-control w-100" value="{{ $project->fecha_ini_participar }}">
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="fecha_fin_participar"><small><b>Fecha de finalización para participar</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="date" name="fecha_fin_participar" id="fecha_fin_participar" class="form-control w-100" value="{{ $project->fecha_fin_participar }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-estilos" role="tabpanel" aria-labelledby="nav-estilos-tab">
                    <form method="POST" action="{{ route('project.config.estilo', $project->id) }}" class="row" id="form-estilo" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Estilos</h5>
                                <small>Actualiza los estilos  del proyecto</small>
                            </div>
                            <div class="d-flex" style="gap: 0.7rem">
                                {{-- <button type="button" class="btn btn-outline-secondary" style="align-self: center" id="cancelar_estilos">Cancelar</button> --}}
                                <button type="submit" class="btn btn-alicorp" style="align-self: center">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="tipo_letra"><small><b>Tipo de Letra</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <select name="tipo_letra" id="tipo_letra" class="form-select w-100">
                                    <option value="Poppins" {{ $project->tipo_letra == 'Poppins' ? 'selected' : '' }} >Poppins</option>
                                    <option value="Arial"  {{ $project->tipo_letra == 'Arial' ? 'selected' : '' }}>Arial</option>
                                    <option value="Verdana"  {{ $project->tipo_letra == 'Verdana' ? 'selected' : '' }}>Verdana</option>
                                    <option value="Roboto"  {{ $project->tipo_letra == 'Roboto' ? 'selected' : '' }}>Roboto</option>
                                    <option value="Times New Roman"  {{ $project->tipo_letra == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                                    <option value="Courier New"  {{ $project->tipo_letra == 'Courier New' ? 'selected' : '' }}>Courier New</option>
                                    <option value="Montserrat"  {{ $project->tipo_letra == 'Montserrat' ? 'selected' : '' }}>Montserrat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="titulo_pestana"><small><b>Titulo Pestaña de navegador</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="text" name="titulo_pestana" id="titulo_pestana" class="form-control w-100" value="{{ $project->titulo_pestana }}">
                            </div>
                        </div>
                        <div class="col-12 row pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label><small><b>Imagen del Fav Icon</b></small></label>
                            </div>
                            @php
                                $fav = isset($project->ruta_fav) && !empty($project->ruta_fav) ? '/storage/'.$project->ruta_fav  : '';
                            @endphp
                            <div class="col-12 col-md-6 col-lg-5">
                                <input hidden type="file" name="imagen" id="imagen">
                                <label for="imagen" class="imagen-draw-fav position-relative" style="gap: 0.3rem">
                                    <button type="button" class="btn-delete-img">X</button>
                                    <div id="upload-imagen" class="{{ empty($fav) ? 'd-flex' : 'd-none' }} flex-column align-items-center justify-content-center w-100">
                                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="3" width="40" height="40" rx="20" fill="#F2F4F7"/>
                                            <rect x="3" y="3" width="40" height="40" rx="20" stroke="#F9FAFB" stroke-width="6"/>
                                            <g clip-path="url(#clip0_141_1677)">
                                            <path d="M26.3334 26.3332L23 22.9999M23 22.9999L19.6667 26.3332M23 22.9999V30.4999M29.9917 28.3249C30.8045 27.8818 31.4466 27.1806 31.8166 26.3321C32.1866 25.4835 32.2635 24.5359 32.0352 23.6388C31.8069 22.7417 31.2863 21.9462 30.5556 21.3778C29.8249 20.8094 28.9257 20.5005 28 20.4999H26.95C26.6978 19.5243 26.2277 18.6185 25.575 17.8507C24.9223 17.0829 24.1041 16.4731 23.1818 16.0671C22.2595 15.661 21.2572 15.4694 20.2501 15.5065C19.2431 15.5436 18.2576 15.8085 17.3677 16.2813C16.4778 16.7541 15.7066 17.4225 15.1122 18.2362C14.5178 19.05 14.1156 19.9879 13.9358 20.9794C13.7561 21.9709 13.8034 22.9903 14.0744 23.961C14.3453 24.9316 14.8327 25.8281 15.5 26.5832" stroke="#868686" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_141_1677">
                                            <rect width="20" height="20" fill="white" transform="translate(13 13)"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                        
                                        <small><b>Click para Actualizar</b></small>
                                        <small>SVG,PNG,JPG (max. 250x250px)</small>
                                    </div>
                                    <div id="preview-imagen" class="{{ empty($fav) ? 'd-none' : 'd-flex' }} flex-column align-items-center justify-content-center w-100">
                                        <img alt="fav" id="img-fav-subir" src="{{ $fav }}" style="width:35px; height: 35px;">
                                    </div>
                                 </label>
                                 <input type="hidden" name="valor_img" id="valor_img" src="$fav">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-premios" role="tabpanel" aria-labelledby="nav-premios-tab">
                    <input type="hidden" name="urlPremios" id="urlPremios" value="{{ route('project.config.premio.get', $project->id) }}">
                    <form method="POST" action="{{ route('project.config.premio', $project->id) }}" class="row" id="form-premio">
                        @csrf
                        @method('PUT')
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Premios</h5>
                                <small>Actualiza los Premios del proyecto</small>
                            </div>
                            <div class="d-flex" style="gap: 0.7rem">
                                {{-- <button type="button" class="btn btn-outline-secondary" style="align-self: center" id="cancelar_premios">Cancelar</button> --}}
                                <button type="submit" class="btn btn-alicorp" style="align-self: center">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="cantidad_premio"><small><b>Número de Premios</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <select name="cantidad_premio" id="cantidad_premio" class="form-select w-100">
                                    <option value="">-- Seleccione --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12" id="content_premio">
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="prob_no_premio"><small><b>No Premio</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-7">
                                <div class="mb-2 row">
                                    <label for="prob_no_premio" class="col-sm-4">Probabilidad</label>
                                    <div class="col-sm-8">
                                        <select name="prob_no_premio" id="prob_no_premio" class="form-select w-100">
                                            <option value="0" selected>0</option>
                                            <option value="10" selected>10</option>
                                            <option value="15" selected>15</option>
                                            <option value="20" selected>20</option>
                                            <option value="25" selected>25</option>
                                            <option value="30" selected>30</option>
                                            <option value="35" selected>35</option>
                                            <option value="40" selected>40</option>
                                            <option value="45" selected>45</option>
                                            <option value="50" selected>50</option>
                                            <option value="55" selected>55</option>
                                            <option value="60" selected>60</option>
                                            <option value="65" selected>65</option>
                                            <option value="70" selected>70</option>
                                            <option value="75" selected>75</option>
                                            <option value="80" selected>80</option>
                                            <option value="85" selected>85</option>
                                            <option value="90" selected>90</option>
                                            <option value="95" selected>95</option>
                                            <option value="100" selected>100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($project->project_type->id == 3)
                <div class="tab-pane fade" id="nav-condicion" role="tabpanel" aria-labelledby="nav-condicion-tab">
                    <form method="POST" action="{{ route('project.config.condicion', $project->id) }}" class="row" id="form-condicion">
                        @csrf
                        @method('PUT')
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Condicionales</h5>
                                <small>Actualiza las Restricciones del proyecto</small>
                            </div>
                            <div class="d-flex" style="gap: 0.7rem">
                                {{-- <button type="button" class="btn btn-outline-secondary" style="align-self: center" id="cancelar_condicionales">Cancelar</button> --}}
                                <button type="submit" class="btn btn-alicorp" style="align-self: center">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="cantidad_condicion"><small><b>Número de Condicionales</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <select name="cantidad_condicion" id="cantidad_condicion" class="form-select w-100">
                                    <option value="0">-- Seleccione --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div id="content_condicion">
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-asignacion" role="tabpanel" aria-labelledby="nav-asignacion-tab">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Asignación PDV</h5>
                                <small>Actualiza las Asignaciones de PDV a Xplorers</small>
                            </div>
                            <div>
                                <livewire:punto-venta />
                            </div>
                        </div>
                    </div>
                    <livewire:asignacion :projectId="$project->id"/>
                </div>
                @endif
                <div class="tab-pane fade" id="nav-estado" role="tabpanel" aria-labelledby="nav-estado-tab">
                    
                    <form method="POST" action="{{ route('project.config.estado', $project->id) }}" class="row" id="form-estado">
                        @csrf
                        @method('PUT')
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Estados</h5>
                                <small>Actualiza el estado del proyecto</small>
                            </div>
                            <div class="d-flex" style="gap: 0.7rem">
                                {{-- <button type="button" class="btn btn-outline-secondary" style="align-self: center" id="cancelar_estados">Cancelar</button> --}}
                                <button type="submit" class="btn btn-alicorp" style="align-self: center">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="status"><small><b>Estado del proyecto</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <select name="status" id="status" class="form-select w-100">
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                    <option value="2">Finalizado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="fecha_fin_participar"><small><b>Fecha de finalización para participar</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <input type="date" name="fecha_fin_participar" id="fecha_fin_participar" class="form-control w-100" value="{{ $project->fecha_fin_participar }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script_jquery')
    <script>
        $( '#small-bootstrap-class-multiple-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
            dropdownParent: $( '#small-bootstrap-class-multiple-field' ).parent(),
        } );

        var marcas = '{{ $project->marcas }}'
        $( '#small-bootstrap-class-multiple-field' ).val(marcas.split(", ")).trigger('change')

        // Setear valores
        var numeroPremios = document.querySelector("#cantidad_premio");
        numeroPremios.value = "{{ $project->cantidad_premio }}"

        var estado = document.querySelector("#status");
        estado.value = "{{ $project->status }}"
    </script>
    <script>
        
        const img_fav_subir = document.getElementById("img-fav-subir")
        document.getElementById('imagen').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const preview = document.getElementById('preview-imagen');
                    const upload = document.getElementById('upload-imagen')
                    preview.style.display = 'flex'; // Muestra la imagen
                    upload.classList.add("d-none")
                    preview.classList.remove("d-none")
                    img_fav_subir.src = e.target.result;
                };

                reader.readAsDataURL(file); // Lee la imagen como una URL de datos
            }
        });
    </script>
    <script src="{{ asset('backend/js/admin/configuracionLanding.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>

    <script>
        $(document).ready(function () {
            var array = []
            var data = {
                id: '',
                tipo_condicion: "",
                tipo_producto: "",
                cantidad_condicion: "",
            };

            $("#cantidad_condicion").on('change', function () {
                const n = +$(this).val();

                if (array.length > 0 && array.length > n) {
                    array.splice(n)
                }

                for (let i = 0; i < n; i++) {
                    const dataArray = array[i];
                    if (!dataArray) {
                        const datos = {...data};
                        datos.id = uuid.v4();
                        array[i] = datos
                    }
                }
                
                arrayAddCondicion(array)
            });

            function arrayAddCondicion(array) {
                var html = ``;
                array.forEach((element, index) => {
                    html += `
                            <div class="col-12 row border-bottom pb-3 mb-4">
                                <input type="hidden" value="${element.id}" class="id"/>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for=""><small><b>Condición ${index + 1}</b></small></label>
                                </div>
                                <div class="col-12 col-md-6 col-lg-5">
                                    <div class="w-100 mb-3">
                                        <select class="form-select w-100 tipo_condicion" id="tipo_condicion" name="tipo_condicion">
                                            <option value="" ${element.tipo_condicion == "" ? 'selected' : ''}>-- Seleccione --</option>
                                            <option value="Imagen" ${element.tipo_condicion == "Imagen" ? 'selected' : ''}>Imagen</option>
                                            <option value="Texto" ${element.tipo_condicion == "Texto" ? 'selected' : ''}>Texto</option>
                                        </select>
                                    </div>
                                    <div class="w-100 mb-3">
                                        <select class="form-select w-100 tipo_producto" id="tipo_producto" name="tipo_producto">
                                            <option value="" ${element.tipo_producto == "" ? 'selected' : ''}>-- Seleccione --</option>
                                            <option value="Empaque" ${element.tipo_producto == "Empaque" ? 'selected' : ''}>Empaque</option>
                                            <option value="Fecha Vencimiento" ${element.tipo_producto == "Fecha Vencimiento" ? 'selected' : ''}>Fecha Vencimiento</option>
                                        </select>
                                    </div>
                                    <div class="w-100">
                                        <select class="form-select w-100 cantidad_condicion" id="cantidad_condicion" name="cantidad_condicion">
                                            <option value="" ${element.cantidad_condicion == "" ? 'selected' : ''}>-- Seleccione --</option>
                                            <option value="Número de imágenes" ${element.cantidad_condicion == "Número de imágenes" ? 'selected' : ''}>Número de imágenes</option>
                                            <option value="Nro de Caracteres" ${element.cantidad_condicion == "Nro de Caracteres" ? 'selected' : ''}>Nro de Caracteres</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    `;
                });
                $("#content_condicion").html(html);
            }

            $(document).on('change', '.tipo_condicion', function () {
                const valor = $(this).val();
                const id = $(this).parent().parent().parent().find(".id").val();

                const dataArray = array.find(a => a.id == id)
                dataArray.tipo_condicion = valor;
                console.log(array)
            });

            $(document).on('change', '.tipo_producto', function () {
                const valor = $(this).val();
                const id = $(this).parent().parent().parent().find(".id").val();

                const dataArray = array.find(a => a.id == id)
                dataArray.tipo_producto = valor;
                console.log(array)
            });

            $(document).on('change', '.cantidad_condicion', function () {
                const valor = $(this).val();
                const id = $(this).parent().parent().parent().find(".id").val();

                const dataArray = array.find(a => a.id == id)
                dataArray.cantidad_condicion = valor;
                console.log(array)
            });

            $('#form-condicion').on('submit', function(event) {
                event.preventDefault();

                var condicion_str = array.map(a => {
                    return [ a.tipo_condicion, a.tipo_producto, a.cantidad_condicion ]
                })

                var formData = new FormData(this);
                formData.append('condicion_str', JSON.stringify(condicion_str))

                $.ajax({
                    url: $(this).attr('action'), // URL de la ruta
                    method: 'POST',
                    data: formData,
                    contentType: false, // Para enviar los datos como FormData
                    processData: false, // No procesar los datos
                    success: function(data) {
                        // Procesar los datos devueltos
                        toastr.success(data.message); 
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                        toastr.error('Ocurrió un error al procesar la solicitud.');
                    }
                });
            });

            function obtenerCondiciones() {
                $.ajax({
                    type: "GET",
                    url: '{{ route("project.config.condicion.get", $project->id) }}',
                    success: function (response) {
                        if (response) {
                            response.forEach(res => {
                                array.push({
                                    id: uuid.v4(),
                                    tipo_condicion: res.tipo_condicion,
                                    tipo_producto: res.tipo_producto,
                                    cantidad_condicion: res.cantidad_condicion,
                                })
                            })
                            $("#cantidad_condicion").val(array.length);
                            arrayAddCondicion(array)
                        }
                    }
                });
            }
            obtenerCondiciones()
        });
    </script>
    <script>
        
    $(document).ready(function () {
        $(document).on('click','.btn-delete-img2', function () {
            const valor_file = $(this).parent().parent().find('#logo_proyecto');
            const valor_img = $(this).parent().parent().find('#valor_img_logo');
            const preview_img = $(this).parent().parent().find('#img_logo_proyecto');
            const upload_logo_none = $(this).parent().parent().find('#upload_logo_none');

            Swal.fire({
                icon: 'question',
                title: '¿Seguro de eliminar la imagen?',
                showConfirmButton: true,
                showCancelButton: true
            }).then((swal) => {
                if (swal.isConfirmed) {
                    // preview_img.attr('src', '{{ asset('backend/img/thumbnail.png') }}')
                    valor_file.val(null)
                    valor_img.val(null)
                    $(upload_logo_none).addClass('d-flex');
                    $(upload_logo_none).removeClass('d-none');
                    $('#img_logo_proyecto').removeClass('d-block');
                    $('#img_logo_proyecto').addClass('d-none');
                    
                }
            })
        });
        $(document).on('click','.btn-delete-img', function () {
            const valor_img = $(this).parent().parent().find('#valor_img');
            const valorImg = $(this).parent().parent().find('#img-fav-subir');
            const preview_img = $(this).parent().parent().find('#preview-imagen');
            const upload_img = $(this).parent().parent().find('#upload-imagen');
            const valor_file = $(this).parent().parent().find('input[type="file"]');
            Swal.fire({
                icon: 'question',
                title: '¿Seguro de eliminar la imagen?',
                showConfirmButton: true,
                showCancelButton: true
            }).then((swal) => {
                if (swal.isConfirmed) {
                    preview_img.removeClass('d-flex')
                    preview_img.addClass('d-none');
                    upload_img.removeClass('d-none')
                    upload_img.addClass('d-flex');

                    valorImg.attr('src', '')
                    valor_file.val(null)
                    valor_img.val(null)
                }
            })
        });
    });
    </script>
    <script>
        $(document).ready(function () {
            $('#logo_proyecto').change(function (e) {
                const upload_logo_none = $(this).parent().parent().find('#upload_logo_none');
                var reader = new FileReader();
                reader.onload = function (event) {
                    $('#img_logo_proyecto').attr('src', event.target.result).show();
                };
                reader.readAsDataURL(e.target.files[0]);
                $(upload_logo_none).removeClass('d-flex');
                $(upload_logo_none).addClass('d-none');
                $('#img_logo_proyecto').addClass('d-block');
                $('#img_logo_proyecto').removeClass('d-none');
            });
        });
    </script>
@endsection