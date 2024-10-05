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
                    <button class="nav-link" id="nav-estado-tab" data-bs-toggle="tab" data-bs-target="#nav-estado" type="button" role="tab" aria-controls="nav-estado" aria-selected="false">Estado</button>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <input type="hidden" name="id" id="id" value="{{ $project->id }}">
                {{-- Proyecto --}}
                <div class="tab-pane fade active show" id="nav-proyecto" role="tabpanel" aria-labelledby="nav-proyecto-tab">
                    <form method="POST" class="row" id="form-info-pro" action="{{ route('project.config.proyecto', $project->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-12 d-flex justify-content-between mb-4">
                            <div>
                                <h5>Información del Proyecto</h5>
                                <small>Actualiza la información del proyecto</small>
                            </div>
                            <div class="d-flex" style="gap: 0.7rem">
                                <button type="button" class="btn btn-outline-secondary" style="align-self: center">Cancelar</button>
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
                                        <option>Christmas Island</option>
                                        <option>South Sudan</option>
                                        <option>Jamaica</option>
                                        <option>Kenya</option>
                                        <option>French Guiana</option>
                                        <option>Mayotta</option>
                                        <option>Liechtenstein</option>
                                        <option>Denmark</option>
                                        <option>Eritrea</option>
                                        <option>Gibraltar</option>
                                        <option>Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option>Haiti</option>
                                        <option>Namibia</option>
                                        <option>South Georgia and the South Sandwich Islands</option>
                                        <option>Vietnam</option>
                                        <option>Yemen</option>
                                        <option>Philippines</option>
                                        <option>Benin</option>
                                        <option>Czech Republic</option>
                                        <option>Russia</option>
                                    </select>
                                </div>
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
                                <button type="button" class="btn btn-outline-secondary" style="align-self: center">Cancelar</button>
                                <button type="submit" class="btn btn-alicorp" style="align-self: center">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="dominio"><small><b>URL Dominio</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-7">
                                <div class="input-group w-100">
                                    <span class="input-group-text" id="basic-addon3" style="color: #667085;">http://</span>
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
                                <button type="button" class="btn btn-outline-secondary" style="align-self: center">Cancelar</button>
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
                                <button type="button" class="btn btn-outline-secondary" style="align-self: center">Cancelar</button>
                                <button type="submit" class="btn btn-alicorp" style="align-self: center">Guardar</button>
                            </div>
                        </div>
                        <div class="col-12 row border-bottom pb-3 mb-4">
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="tipo_letra"><small><b>Tipo de Letra</b></small></label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <select name="tipo_letra" id="tipo_letra" class="form-select w-100">
                                    <option value="Poppins" selected>Poppins</option>
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
                            <div class="col-12 col-md-6 col-lg-5">
                                <input hidden type="file" name="imagen" id="imagen">
                                <label for="imagen" class="d-flex flex-column align-items-center imagen-draw-fav" style="gap: 0.3rem">
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
                                 </label>
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
                                <button type="button" class="btn btn-outline-secondary" style="align-self: center">Cancelar</button>
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
                            <div class="col-12 col-md-6 col-lg-5">
                                <select name="prob_no_premio" id="prob_no_premio" class="form-select w-100">
                                    <option value="2" selected>Probabildad</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
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
                                <button type="button" class="btn btn-outline-secondary" style="align-self: center">Cancelar</button>
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
    <script src="{{ asset('backend/js/admin/configuracionLanding.js') }}"></script>
@endsection