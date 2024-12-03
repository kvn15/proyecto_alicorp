@php
    $project = $data["project"];
    $landing = $data["landing"];
@endphp
@extends('admin.pages.inicio.layout')


@section('header_left')
  <span>{{ $project->project_type->name }} > <b>{{ $project->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
<button type="submit" class="btn btn-alicorp" id="guardar-landing">
    Guardar
</button>
@endsection

@section('inicio_dash')
<style>
.cursor {
    cursor: pointer;
}

.d-none-2 {
    display: none;
}
.btn-delete-img {
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
@php
    $rutaCon = route($project->project_type->ruta_name.'.show.overview', $project->id );
    $imgNulo = asset('backend/svg/img-null.svg');
@endphp
<div class="row p-0 ps-1 w-100">
    <form id="form_html" action="{{ route('landing.post.html', $project->id) }}" method="POST">
        @csrf
        @method('POST')
    </form>
    <form id="form-landing" method="POST" action="{{ route('landing.post', $project->id) }}" enctype="multipart/form-data" class="col-3 border-end" style="overflow-y: scroll; height: 100vh;">
        @csrf
        @method('POST')
        <input type="submit" value="enviar" hidden>
        <div class="d-block" id="menu_edit">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_configuracion"><i class="bi bi-box-arrow-left"></i> Personalizar</button>
            </div>
            <div class="py-2 border-bottom cursor" id="encabezado-menu">
                <p class="mb-0"><b>Encabezado</b></p>
                <ul class="list-unstyled ps-4">
                    <li>
                        <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                        <small>Sección Encabezado</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg imagen">
                        <small>Logo</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                        <small>Titulos de navegación</small>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom cursor" id="principal-menu">
                <p class="mb-0"><b>Página principal</b></p>
                <ul class="list-unstyled ps-4">
                    <li>
                        <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                        <small>Sección pagina principal</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion">
                        <small>Titulo</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/lapiz.svg')}}" alt="svg imagen">
                        <small>Texto</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg imagen">
                        <small>Imagen</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/boton.svg')}}" alt="svg imagen">
                        <small>Botón</small>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom cursor" id="participar-menu">
                <p class="mb-0"><b>Como participar</b></p>
                <ul class="list-unstyled ps-4">
                    <li>
                        <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                        <small>Sección Como participar</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion">
                        <small>Titulo</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                        <small>Bloque participar</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/boton.svg')}}" alt="svg imagen">
                        <small>Botón</small>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom cursor" id="formulario-menu">
                <p class="mb-0"><b>Formulario Participar</b></p>
                <ul class="list-unstyled ps-4">
                    <li>
                        <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                        <small>Sección Formulario participar</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion">
                        <small>Titulo</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                        <small>Bloque formulario</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/boton.svg')}}" alt="svg imagen">
                        <small>Botón</small>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom cursor" id="ganadores-menu">
                <p class="mb-0"><b>Ganadores</b></p>
                <ul class="list-unstyled ps-4">
                    <li>
                        <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                        <small>Sección Ganadores</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion">
                        <small>Titulo</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                        <small>Bloque Lista ganadores</small>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom cursor" id="preguntas-menu">
                <p class="mb-0"><b>Preguntas Frecuentes</b></p>
                <ul class="list-unstyled ps-4">
                    <li>
                        <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                        <small>Sección Preguntas frecuentes</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion">
                        <small>Titulo</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                        <small>Bloque preguntas</small>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom cursor" id="redes-menu">
                <p class="mb-0"><b>Redes Sociales</b></p>
                <ul class="list-unstyled ps-4">
                    <li>
                        <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                        <small>Sección Redes sociales</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion">
                        <small>Titulo</small>
                    </li>
                    <li>
                        <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                        <small>Bloque redes sociales</small>
                    </li>
                </ul>
            </div>
        </div>
        @php
            $encabezado = isset($landing->encabezado) && !empty($landing->encabezado) ? json_decode($landing->encabezado) : null;
            $color_menu = $encabezado ? $encabezado->color_menu : '#000000';
            $logo_subir = $encabezado && !empty($encabezado->logo_subir) ? '/storage/'.$encabezado->logo_subir : $imgNulo;
            $logo_subir_url = $encabezado && !empty($encabezado->logo_subir) ? '/storage/'.$encabezado->logo_subir : "";

            $bold_menu = $encabezado && $encabezado->bold_menu == 1 ? "checked" : "";
            $bold_menu_style = $encabezado && $encabezado->bold_menu == 1 ? "fw-bold" : "";
            $italic_menu = $encabezado && $encabezado->italic_menu == 1 ? "checked" : "";
            $italic_menu_style = $encabezado && $encabezado->italic_menu == 1 ? "fst-italic" : "";

            $tamanoMenu1 = $encabezado && $encabezado->tamanoMenu == 1 ? 'checked' : '';
            $tamanoMenu2 = $encabezado && $encabezado->tamanoMenu == 2 ? 'checked' : '';
            $tamanoMenu3 = $encabezado && $encabezado->tamanoMenu == 2 ? 'checked' : '';
            $styleTamanoMenu = $encabezado && $encabezado->tamanoMenu  == 1 ? "fs-6" : ($encabezado && $encabezado->tamanoMenu  == 2 ? "fs-3"  :  ($encabezado && $encabezado->tamanoMenu  == 3 ? "fs-1"  : ""));
            
            $color_navegacion = $encabezado && $encabezado->color_navegacion ? $encabezado->color_navegacion : '#ffffff';
            $color_navegacion_input_hover = $encabezado && $encabezado->color_navegacion_input_hover ? $encabezado->color_navegacion_input_hover : '#fbbb01';

            $navegacion_1 = $encabezado && $encabezado->navegacion_1 ? $encabezado->navegacion_1 : '¿CÓMO PARTICIPAR?';
            $direccionar_1 = $encabezado && $encabezado->direccionar_1 ? $encabezado->direccionar_1 : '#participar';
            
            $navegacion_2 = $encabezado && $encabezado->navegacion_2 ? $encabezado->navegacion_2 : 'PREGUNTAS FRECUENTES';
            $direccionar_2 = $encabezado && $encabezado->direccionar_2 ? $encabezado->direccionar_2 : '#preguntas-frecuentes';
            
            $navegacion_3 = $encabezado && $encabezado->navegacion_3 ? $encabezado->navegacion_3 : 'TÉRMINOS Y CONDICIONES';
            $direccionar_3 = $encabezado && $encabezado->direccionar_3 ? $encabezado->direccionar_3 : '#terminos_condiciones';
            
            $navegacion_4 = $encabezado && $encabezado->navegacion_4 ? $encabezado->navegacion_4 : 'VER GANADORES';
            $direccionar_4 = $encabezado && $encabezado->direccionar_4 ? $encabezado->direccionar_4 : '#ganadores';
        @endphp
        <div  class="d-none" id="encabezado">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_encabezado"><i class="fas fa-chevron-left"></i> Encabezado</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web hidev" type="button" id="collapseOneNav">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Encabezado</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseOneNav">
                    <li>
                        <p class="mb-1">Distribución Menú</p>
                        <div class="d-flex justify-content-center" style="gap: 1.2em;">
                            <div class="d-none">
                                <input hidden type="radio" name="distribucion_menu" id="menu-left" value="1" class="distribucion_menu">
                                <label for="menu-left" class="d-flex align-items-center border border-3 p-2 cursor menu-left">
                                    <img class="img-fluid" src="{{asset('backend/svg/menu-left.svg')}}" alt="">
                                </label>
                            </div>
                            <div>
                                <input hidden type="radio" name="distribucion_menu" id="menu-right" value="1" class="distribucion_menu" checked>
                                <label for="menu-right" class="d-flex align-items-center border border-3 p-2 cursor menu-right">
                                    <img class="img-fluid" src="{{asset('backend/svg/menu-right.svg')}}" alt="">
                                </label>
                            </div>
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="my-1">Color Menú</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-menu-input" name="color-menu-input" value="{{ $color_menu }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-menu" id="color-menu" value="{{ $color_menu }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseTwoNav">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg seccion"> <small>Logo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseTwoNav d-none-2">
                    <li>
                        <p class="mb-1">Imagen Logo</p>
                        <div class="img-subir">
                            <button type="button" class="btn-delete-img">X</button>
                            <label for="logo-subir">
                                <div class="cursor">
                                    <div id="upload-logo" class="{{ isset($logo_subir_url) && !empty($logo_subir_url) ? 'd-none' : '' }} upload_img">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 140px x 55 px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview-logo" src="{{ $logo_subir_url }}">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="logo-subir" id="logo-subir">
                            <input type="hidden" name="logo-subir-url" id="logo-subir-url" value="{{ $logo_subir_url }}">
                            <input type="text" class="data_value" value="logo-nav" hidden>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseThreeNav">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Titulos de navegación</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseThreeNav d-none-2">
                    <li>
                        <p class="mb-1">Configuración Navegación</p>
                        <div class="d-flex justify-content-start my-2" style="gap: 1.2em;">
                            <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                                <div class="p-1 cursor bold">
                                    <input hidden type="checkbox" name="bold-menu" id="bold-menu" value="1" {{ $bold_menu }}>
                                    <label for="bold-menu" class="d-flex align-items-center cursor">
                                        <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_menu">
                                            <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="p-1 cursor italic">
                                    <label for="italic-menu" class="d-flex align-items-center cursor">
                                        <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_menu">
                                            <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                        </svg>
                                    </label>
                                    <input hidden type="checkbox" name="italic-menu" id="italic-menu" value="1" {{ $italic_menu }}>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group mb-2" role="group">
                            <input type="radio" class="btn-check" name="tamanoMenu" id="tamanoMenu1" autocomplete="off" {{ $tamanoMenu1 }} value="1">
                            <label class="btn btn-outline-text" for="tamanoMenu1"><small><b>Chico</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoMenu" id="tamanoMenu2" autocomplete="off" {{ $tamanoMenu2 }} value="2">
                            <label class="btn btn-outline-text" for="tamanoMenu2"><small><b>Mediano</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoMenu" id="tamanoMenu3" autocomplete="off" {{ $tamanoMenu3 }} value="3">
                            <label class="btn btn-outline-text" for="tamanoMenu3"><small><b>Grande</b></small></label>
                        </div>
                        
                        <p class="my-1">Color Navegación</p>
                        <div class="d-flex my-2" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color_navegacion_input" name="color_navegacion_input" value="{{ $color_navegacion }}">
                            <input type="color" class="form-control form-control-color p-0" name="color_navegacion" id="color_navegacion" value="{{ $color_navegacion }}">
                        </div>
                        
                        <p class="my-1">Color Navegación Activo</p>
                        <div class="d-flex my-2" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color_navegacion_input_hover" name="color_navegacion_input_hover" value="{{ $color_navegacion_input_hover }}">
                            <input type="color" class="form-control form-control-color p-0" name="color_navegacion_hover" id="color_navegacion_hover" value="{{ $color_navegacion_input_hover }}">
                        </div>
                    </li>

                    <li class="my-2">
                        <p class="my-2"><b>Navegación 1</b></p>
                        <p class="my-1">Texto</p>
                        <input type="text" class="form-control p-2" name="navegacion_1" id="navegacion_1" value="{{ $navegacion_1 }}">
                        <p class="my-1">Direccionar</p>
                        <select class="form-select" name="direccionar_1" id="direccionar_1">
                            <option value="#participar" {{ $direccionar_1 == '#participar' ? 'selected' : '' }}>Como Participar</option>
                            <option value="#formulario-participar" {{ $direccionar_1 == '#formulario-participar' ? 'selected' : '' }}>Formulario Participar</option>
                            <option value="#ganadores" {{ $direccionar_1 == '#ganadores' ? 'selected' : '' }}>Ganadores</option>
                            <option value="#preguntas-frecuentes" {{ $direccionar_1 == '#preguntas-frecuentes' ? 'selected' : '' }}>Preguntas Frecuentes</option>
                            <option value="">Términos y condiciones</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <p class="my-2"><b>Navegación 2</b></p>
                        <input type="text" class="form-control p-2" name="navegacion_2" id="navegacion_2" value="{{ $navegacion_2 }}">
                        <p class="my-1">Direccionar</p>
                        <select class="form-select" name="direccionar_2" id="direccionar_2">
                            <option value="#participar" {{ $direccionar_2 == '#participar' ? 'selected' : '' }}>Como Participar</option>
                            <option value="#formulario-participar" {{ $direccionar_2 == '#formulario-participar' ? 'selected' : '' }}>Formulario Participar</option>
                            <option value="#ganadores" {{ $direccionar_2 == '#ganadores' ? 'selected' : '' }}>Ganadores</option>
                            <option value="#preguntas-frecuentes" {{ $direccionar_2 == '#preguntas-frecuentes' ? 'selected' : '' }}>Preguntas Frecuentes</option>
                            <option value="">Términos y condiciones</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <p class="my-2"><b>Navegación 3</b></p>
                        <input type="text" class="form-control p-2" name="navegacion_3" id="navegacion_3" value="{{ $navegacion_3 }}">
                        <p class="my-1">Direccionar</p>
                        <select class="form-select" name="direccionar_3" id="direccionar_3">
                            <option value="#participar" {{ $direccionar_3 == '#participar' ? 'selected' : '' }}>Como Participar</option>
                            <option value="#formulario-participar" {{ $direccionar_3 == '#formulario-participar' ? 'selected' : '' }}>Formulario Participar</option>
                            <option value="#ganadores" {{ $direccionar_3 == '#ganadores' ? 'selected' : '' }}>Ganadores</option>
                            <option value="#preguntas-frecuentes" {{ $direccionar_3 == '#preguntas-frecuentes' ? 'selected' : '' }}>Preguntas Frecuentes</option>
                            <option value="#terminos_condiciones" selected>Términos y condiciones</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <p class="my-2"><b>Navegación 4</b></p>
                        <input type="text" class="form-control p-2" name="navegacion_4" id="navegacion_4" value="{{ $navegacion_4 }}">
                        <p class="my-1">Direccionar</p>
                        <select class="form-select" name="direccionar_4" id="direccionar_4">
                            <option value="#participar" {{ $direccionar_4 == '#participar' ? 'selected' : '' }}>Como Participar</option>
                            <option value="#formulario-participar" {{ $direccionar_4 == '#formulario-participar' ? 'selected' : '' }}>Formulario Participar</option>
                            <option value="#ganadores" {{ $direccionar_4 == '#ganadores' ? 'selected' : '' }}>Ganadores</option>
                            <option value="#preguntas-frecuentes" {{ $direccionar_4 == '#preguntas-frecuentes' ? 'selected' : '' }}>Preguntas Frecuentes</option>
                            <option value="">Términos y condiciones</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
        @php
            $pagina_principal = isset($landing->pagina_principal) && !empty($landing->pagina_principal) ? json_decode($landing->pagina_principal, true) : null;
            $banner_subir = $pagina_principal && !empty($pagina_principal["banner_subir"]) ? '/storage/'.$pagina_principal["banner_subir"] : $imgNulo;
            $banner_subir_url = $pagina_principal && !empty($pagina_principal["banner_subir"]) ? '/storage/'.$pagina_principal["banner_subir"] : "";
            $fondo_landing = $pagina_principal && !empty($pagina_principal["fondo_landing"]) ? $pagina_principal["fondo_landing"] : '#000000';
            
            $bold_titulo_header = $pagina_principal && $pagina_principal["bold-titulo-header"] == 1 ? "checked" : "";
            $bold_titulo_header_style = $pagina_principal && $pagina_principal["bold-titulo-header"] == 1 ? "fw-bold" : "";
            $italic_titulo_header = $pagina_principal && $pagina_principal["italic-titulo-header"] == 1 ? "checked" : "";
            $italic_titulo_header_style = $pagina_principal && $pagina_principal["italic-titulo-header"] == 1 ? "fst-italic" : "";
            $input_titulo_header = $pagina_principal && $pagina_principal["input-titulo-header"] ? $pagina_principal["input-titulo-header"] : '';

            $tamanoTituloHeader1 = $pagina_principal && $pagina_principal["tamanoTitulo"] == 1 ? 'checked' : '';
            $tamanoTituloHeader2 = $pagina_principal && $pagina_principal["tamanoTitulo"] == 2 ? 'checked' : '';
            $tamanoTituloHeader3 = $pagina_principal && $pagina_principal["tamanoTitulo"] == 3 ? 'checked' : '';
            $styleTamanoTituloHeader = $pagina_principal && $pagina_principal["tamanoTitulo"]  == 1 ? "fs-6" : ($pagina_principal && $pagina_principal["tamanoTitulo"]  == 2 ? "fs-3"  :  ($pagina_principal && $pagina_principal["tamanoTitulo"]  == 3 ? "fs-1"  : ""));
            
            $alineacionTitulo1 = $pagina_principal && $pagina_principal["alineacionTitulo"] == 1 ? 'checked' : '';
            $alineacionTitulo2 = $pagina_principal && $pagina_principal["alineacionTitulo"] == 2 ? 'checked' : '';
            $alineacionTitulo3 = $pagina_principal && $pagina_principal["alineacionTitulo"] == 3 ? 'checked' : '';
            $stylealineacionTitulo = $pagina_principal && $pagina_principal["alineacionTitulo"]  == 1 ? "text-start" : ($pagina_principal && $pagina_principal["alineacionTitulo"]  == 2 ? "text-center"  :  ($pagina_principal && $pagina_principal["alineacionTitulo"]  == 3 ? "text-end"  : "text-center"));
            
            $color_titulo = $pagina_principal && $pagina_principal["color-titulo"] ? $pagina_principal["color-titulo"] : '#ffffff';

            //PARRAFO
            $bold_titulo_parrafo = $pagina_principal && $pagina_principal["bold-titulo-parrafo"] == 1 ? "checked" : "";
            $bold_titulo_parrafo_style = $pagina_principal && $pagina_principal["bold-titulo-parrafo"] == 1 ? "fw-bold" : "";
            $italic_titulo_parrafo = $pagina_principal && $pagina_principal["italic-titulo-parrafo"] == 1 ? "checked" : "";
            $italic_titulo_parrafo_style = $pagina_principal && $pagina_principal["italic-titulo-parrafo"] == 1 ? "fst-italic" : "";

            $input_texto_header = $pagina_principal && $pagina_principal["texto-header"] ? $pagina_principal["texto-header"] : '';

            $tamanoTextoHeader1 = $pagina_principal && $pagina_principal["tamanoTexto"] == 1 ? 'checked' : '';
            $tamanoTextoHeader2 = $pagina_principal && $pagina_principal["tamanoTexto"] == 2 ? 'checked' : '';
            $tamanoTextoHeader3 = $pagina_principal && $pagina_principal["tamanoTexto"] == 3 ? 'checked' : '';
            $styletamanoTextoHeader = $pagina_principal && $pagina_principal["tamanoTexto"]  == 1 ? "fs-6" : ($pagina_principal && $pagina_principal["tamanoTexto"]  == 2 ? "fs-3"  :  ($pagina_principal && $pagina_principal["tamanoTexto"]  == 3 ? "fs-1"  : ""));
            
            $alineacionTexto1 = $pagina_principal && $pagina_principal["alineacionTexto"] == 1 ? 'checked' : '';
            $alineacionTexto2 = $pagina_principal && $pagina_principal["alineacionTexto"] == 2 ? 'checked' : '';
            $alineacionTexto3 = $pagina_principal && $pagina_principal["alineacionTexto"] == 3 ? 'checked' : '';
            $stylealineacionTexto = $pagina_principal && $pagina_principal["alineacionTexto"]  == 1 ? "text-start" : ($pagina_principal && $pagina_principal["alineacionTexto"]  == 2 ? "text-center"  :  ($pagina_principal && $pagina_principal["alineacionTexto"]  == 3 ? "text-end"  : "text-center"));
        
            $color_texto = $pagina_principal && $pagina_principal["color-texto"] ? $pagina_principal["color-texto"] : '#ffffff';

            // imagen
            $imagen_subir = $pagina_principal && $pagina_principal["imagen-subir"] ? '/storage/'.$pagina_principal["imagen-subir"] : $imgNulo;
            $imagen_subir_url = $pagina_principal && $pagina_principal["imagen-subir"] ? '/storage/'.$pagina_principal["imagen-subir"] : "";

            // button
            $direccionar_boton_header = $pagina_principal && $pagina_principal["direccionar_boton_header"] ? $pagina_principal["direccionar_boton_header"] : '#formulario-participar';

            $bold_boton_parrafo = $pagina_principal && $pagina_principal["bold-boton-parrafo"] == 1 ? "checked" : "";
            $bold_boton_parrafo_style = $pagina_principal && $pagina_principal["bold-boton-parrafo"] == 1 ? "fw-bold" : "";
            $italic_boton_parrafo = $pagina_principal && $pagina_principal["italic-boton-header"] == 1 ? "checked" : "";
            $italic_boton_parrafo_style = $pagina_principal && $pagina_principal["italic-boton-header"] == 1 ? "fst-italic" : "";

            $tamanoBotonHeader1 = $pagina_principal && $pagina_principal["tamanoBotonHeader"] == 1 ? 'checked' : '';
            $tamanoBotonHeader2 = $pagina_principal && $pagina_principal["tamanoBotonHeader"] == 2 ? 'checked' : '';
            $tamanoBotonHeader3 = $pagina_principal && $pagina_principal["tamanoBotonHeader"] == 3 ? 'checked' : '';
            $styletamanoBotonHeader = $pagina_principal && $pagina_principal["tamanoBotonHeader"]  == 1 ? "fs-6" : ($pagina_principal && $pagina_principal["tamanoBotonHeader"]  == 2 ? "fs-3"  :  ($pagina_principal && $pagina_principal["tamanoBotonHeader"]  == 3 ? "fs-1"  : ""));
        
            $color_boton_header = $pagina_principal && $pagina_principal["color-boton-header"] ? $pagina_principal["color-boton-header"] : '#ffffff';

            $titulo_boton_header = $pagina_principal && isset($pagina_principal["titulo-boton-header"]) ? $pagina_principal["titulo-boton-header"] : 'PARTICIPAR';
        @endphp
        <div class="d-none" id="pagina_principal">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_principal"><i class="fas fa-chevron-left"></i> Pagina Principal</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web hidev" type="button" id="collapseOneHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Pagina principal</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseOneHeader">
                    <li>
                        <p class="mb-1">Distribución</p>
                        <div class="d-flex justify-content-center" style="gap: 1.2em;">
                            <div>
                                <input hidden type="radio" name="distribucion" id="horizontal" value="1" class="distribucion" checked>
                                <label for="horizontal" class="d-flex align-items-center border border-3 p-2 cursor horizontal">
                                    <img src="{{asset('backend/svg/distri-horizontal.svg')}}" alt="">
                                </label>
                            </div>
                            <div>
                                <input hidden type="radio" name="distribucion" id="vertical" value="1" class="distribucion">
                                <label for="vertical" class="d-flex align-items-center border border-3 p-2 cursor vertical">
                                    <img src="{{asset('backend/svg/vertical.svg')}}" alt="">
                                </label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p class="mb-2">Banner</p>
                        <div class="img-subir">
                            <button type="button" class="btn-delete-img">X</button>
                            <label for="banner-subir">
                                <div class="cursor">
                                    <div id="upload-banner" class="{{ isset($banner_subir_url) && !empty($banner_subir_url) ? 'd-none' : '' }} upload_img">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1040x750 px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview-banner" src="{{ $banner_subir_url }}">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="banner-subir" id="banner-subir">
                            <input type="hidden" name="banner-subir-url" id="banner-subir-url" value="{{ $banner_subir_url }}">
                            <input type="text" class="data_value" value="header" hidden>
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="my-1">Fondo Landing</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="fondo_landing_input" name="fondo_landing_input" value="{{ $fondo_landing }}">
                            <input type="color" class="form-control form-control-color p-0" id="fondo_landing" name="fondo_landing" value="{{ $fondo_landing }}">
                        </div>

                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseTwoHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                
                <ul class="list-unstyled ps-4 collapseTwoHeader  d-none-2">
                    <li class="my-2">
                        <p class="mb-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-header" id="bold-titulo-header" {{ $bold_titulo_header }}>
                                <label for="bold-titulo-header" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-titulo-header" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-titulo-header" id="italic-titulo-header" {{ $italic_titulo_header }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" id="input-titulo-header" name="input-titulo-header" value="{{ $input_titulo_header }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTitulo" id="tamanoTitulo1" autocomplete="off" value="1" {{ $tamanoTituloHeader1 }}>
                            <label class="btn btn-outline-text" for="tamanoTitulo1"><small><b>Chico</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoTitulo" id="tamanoTitulo2" autocomplete="off" value="2" {{ $tamanoTituloHeader2 }}>
                            <label class="btn btn-outline-text" for="tamanoTitulo2"><small><b>Mediano</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoTitulo" id="tamanoTitulo3" autocomplete="off" {{ $tamanoTituloHeader3 }} value="3">
                            <label class="btn btn-outline-text" for="tamanoTitulo3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Alineación</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="alineacionTitulo" id="alineacionTitulo1" autocomplete="off" value="1" {{ $alineacionTitulo1 }}>
                            <label class="btn btn-outline-text" for="alineacionTitulo1"><small><b><i class="fas fa-align-left"></i></b></small></label>
                            
                            <input type="radio" class="btn-check" name="alineacionTitulo" id="alineacionTitulo2" autocomplete="off" {{ $alineacionTitulo2 }} value="2">
                            <label class="btn btn-outline-text" for="alineacionTitulo2"><small><b><i class="fas fa-align-center"></i></b></small></label>
                            
                            <input type="radio" class="btn-check" name="alineacionTitulo" id="alineacionTitulo3" autocomplete="off" value="3" {{ $alineacionTitulo3 }}>
                            <label class="btn btn-outline-text" for="alineacionTitulo3"><small><b><i class="fas fa-align-center"></i></b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input" name="color-titulo-input" value="{{ $color_titulo }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo" id="color-titulo" value="{{ $color_titulo }}">
                        </div>

                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseThreeHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/lapiz.svg')}}" alt="svg seccion"> <small>Texto</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 collapseThreeHeader  d-none-2 ">
                    <li class="my-2">
                        <p class="mb-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-parrafo" id="bold-titulo-parrafo" {{ $bold_titulo_parrafo }}>
                                <label for="bold-titulo-parrafo" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_texto">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-titulo-parrafo" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_texto">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-titulo-parrafo" id="italic-titulo-parrafo" {{ $italic_titulo_parrafo }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="texto-header" id="texto-header" value="{{ $input_texto_header }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto1" autocomplete="off" {{ $tamanoTextoHeader1 }} value="1">
                            <label class="btn btn-outline-text" for="tamanoTexto1"><small><b>Chico</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto2" autocomplete="off" value="2" {{ $tamanoTextoHeader2 }}>
                            <label class="btn btn-outline-text" for="tamanoTexto2"><small><b>Mediano</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto3" autocomplete="off" value="3" {{ $tamanoTextoHeader3 }}>
                            <label class="btn btn-outline-text" for="tamanoTexto3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Alineación</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto1" autocomplete="off" value="1" {{ $alineacionTexto1 }}>
                            <label class="btn btn-outline-text" for="alineacionTexto1"><small><b><i class="fas fa-align-left"></i></b></small></label>
                            
                            <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto2" autocomplete="off" {{ $alineacionTexto2 }} value="2">
                            <label class="btn btn-outline-text" for="alineacionTexto2"><small><b><i class="fas fa-align-center"></i></b></small></label>
                            
                            <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto3" autocomplete="off" value="3" {{ $alineacionTexto3 }}>
                            <label class="btn btn-outline-text" for="alineacionTexto3"><small><b><i class="fas fa-align-center"></i></b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-texto-input" name="color-texto-input" value="{{ $color_texto }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-texto" id="color-texto" value="{{ $color_texto }}">
                        </div>

                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom d-none">
                <button class="header-edit-web showv" type="button" id="collapseFourHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg seccion"> <small>Imagen</small></b></p>
                </button>

                <ul class="list-unstyled ps-4 collapseFourHeader  d-none-2">
                    <li class="my-2">
                        <div class="img-subir">
                            <button type="button" class="btn-delete-img">X</button>
                            <label for="imagen-subir">
                                <div id="upload-imagen" class="{{ isset($imagen_subir_url) && !empty($imagen_subir_url) ? 'd-none' : '' }} upload_img">
                                    <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                    <h6>Click para Actualizar</h6>
                                    <p>PNG, JPG (max. 1,000x1,000px)</p>
                                </div>
                                <div>
                                    <img class="img-fluid" id="preview-imagen" src="{{ $imagen_subir_url }}">
                                </div>
                            </label>
                            <input hidden type="file" name="imagen-subir" id="imagen-subir">
                            <input type="hidden" name="imagen-subir-url" id="imagen-subir-url" value="{{ $imagen_subir_url }}">
                            <input type="text" class="data_value" value="imagen-header" hidden>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseFiveHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                </button>

                <ul class="list-unstyled ps-4 collapseFiveHeader  d-none-2">
                    <li class="my-2">
                        <p class="mb-1">Direccionar</p>
                        <select class="form-select" name="direccionar_boton_header" id="direccionar_boton_header">
                            <option value="#formulario-participar" {{ $direccionar_boton_header == '#formulario-participar' ? 'selected' : '' }}>Formulario Participar</option>
                            <option value="#ganadores" {{ $direccionar_boton_header == '#ganadores' ? 'selected' : '' }}>Ganadores</option>
                            <option value="#preguntas-frecuentes" {{ $direccionar_boton_header == '#preguntas-frecuentes' ? 'selected' : '' }}>Preguntas Frecuentes</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <p class="mb-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-boton-parrafo" id="bold-boton-header" {{ $bold_boton_parrafo }}>
                                <label for="bold-boton-header" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_btn_header">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-boton-header" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_btn_header">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-boton-header" id="italic-boton-header" {{ $italic_boton_parrafo }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="titulo-boton-header" id="titulo-boton-header" value="{{ $titulo_boton_header }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoBotonHeader" id="tamanoBotonHeader1" autocomplete="off" {{ $tamanoBotonHeader1 }} value="1">
                            <label class="btn btn-outline-text" for="tamanoBotonHeader1"><small><b>Chico</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoBotonHeader" id="tamanoBotonHeader2" autocomplete="off" value="2" {{ $tamanoBotonHeader2 }}>
                            <label class="btn btn-outline-text" for="tamanoBotonHeader2"><small><b>Mediano</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoBotonHeader" id="tamanoBotonHeader3" autocomplete="off" value="3" {{ $tamanoBotonHeader3 }}>
                            <label class="btn btn-outline-text" for="tamanoBotonHeader3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-boton-header-input" name="color-boton-header-input" value="{{ $color_boton_header  }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-boton-header" id="color-boton-header" value="{{ $color_boton_header  }}">
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        @php
            $como_participar = isset($landing->como_participar) && !empty($landing->como_participar) ? json_decode($landing->como_participar, true) : null;

            $border_input_como = $como_participar && $como_participar["border-input-como"] ? $como_participar["border-input-como"] : '#fbbb01';

            $bold_titulo_como = $como_participar && $como_participar["bold-titulo-como"] == 1 ? "checked" : "";
            $bold_titulo_como_style = $como_participar && $como_participar["bold-titulo-como"] == 1 ? "fw-bold" : "";
            $italic_titulo_como = $como_participar && $como_participar["italic-titulo-como"] == 1 ? "checked" : "";
            $italic_titulo_como_style = $como_participar && $como_participar["italic-titulo-como"] == 1 ? "fst-italic" : "";

            $input_titulo_como = $como_participar && $como_participar["input-titulo-como"] ? $como_participar["input-titulo-como"] : '¿Cómo participar?';

            $tamanoTituloComo1 = $como_participar && $como_participar["tamanoTituloComo"] == 1 ? 'checked' : '';
            $tamanoTituloComo2 = $como_participar && $como_participar["tamanoTituloComo"] == 2 ? 'checked' : '';
            $tamanoTituloComo3 = $como_participar && $como_participar["tamanoTituloComo"] == 3 ? 'checked' : '';
            $styletamanoTituloComo = $como_participar && $como_participar["tamanoTituloComo"]  == 1 ? "fs-6" : ($como_participar && $como_participar["tamanoTituloComo"]  == 2 ? "fs-3"  :  ($como_participar && $como_participar["tamanoTituloComo"]  == 3 ? "fs-1"  : ""));
        
            $color_titulo_como = $como_participar && $como_participar["color-titulo-como"] ? $como_participar["color-titulo-como"] : '#fbbb01 ';
        
            $participar_1 = $como_participar && $como_participar["participar_1"] ? '/storage/'.$como_participar["participar_1"] : $imgNulo;
            $participar_1_url = $como_participar && $como_participar["participar_1"] ? '/storage/'.$como_participar["participar_1"] : "";
            $participar_2 = $como_participar && $como_participar["participar_2"] ? '/storage/'.$como_participar["participar_2"] : $imgNulo;
            $participar_2_url = $como_participar && $como_participar["participar_2"] ? '/storage/'.$como_participar["participar_2"] : "";
            $participar_3 = $como_participar && $como_participar["participar_3"] ? '/storage/'.$como_participar["participar_3"] : $imgNulo;
            $participar_3_url = $como_participar && $como_participar["participar_3"] ? '/storage/'.$como_participar["participar_3"] : "";

            $bold_boton_como = $como_participar && $como_participar["bold-boton-como"] == 1 ? "checked" : "";
            $bold_boton_como_style = $como_participar && $como_participar["bold-boton-como"] == 1 ? "fw-bold" : "";
            $italic_boton_como = $como_participar && $como_participar["italic-boton-como"] == 1 ? "checked" : "";
            $italic_boton_como_style = $como_participar && $como_participar["italic-boton-como"] == 1 ? "fst-italic" : "";

            $tamanoBotonComo1 = $como_participar && $como_participar["tamanoBotonComo"] == 1 ? 'checked' : '';
            $tamanoBotonComo2 = $como_participar && $como_participar["tamanoBotonComo"] == 2 ? 'checked' : '';
            $tamanoBotonComo3 = $como_participar && $como_participar["tamanoBotonComo"] == 3 ? 'checked' : '';
            $styletamanoBotonComo = $como_participar && $como_participar["tamanoBotonComo"]  == 1 ? "fs-6" : ($como_participar && $como_participar["tamanoBotonComo"]  == 2 ? "fs-3"  :  ($como_participar && $como_participar["tamanoBotonComo"]  == 3 ? "fs-1"  : ""));
        
            $color_boton_como = $como_participar && $como_participar["color-boton-como"] ? $como_participar["color-boton-como"] : '#ffffff';

            $input_buttom_como = $como_participar && isset($como_participar["input-boton-como"]) ? $como_participar["input-boton-como"] : 'VER TÉRMINOS Y CONDICIONES';
        @endphp
        <div class="d-none" id="como_participar">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_como_participa"><i class="fas fa-chevron-left"></i> Como Participar</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web hidev" type="button" id="collapseOneNav1">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Como participar</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseOneNav1 ">
                    <li class="my-2">
                        <p class="my-1">Color Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="border-input-como" name="border-input-como" value="{{ $border_input_como }}">
                            <input type="color" class="form-control form-control-color p-0" id="border-como" value="{{ $border_input_como }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseTwoComo">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseTwoComo  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-como" id="bold-titulo-como" {{ $bold_titulo_como }}>
                                <label for="bold-titulo-como" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_como">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-titulo-como" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_como">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-titulo-como" id="italic-titulo-como" {{ $italic_titulo_como }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-como" id="input-titulo-como" value="{{ $input_titulo_como }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloComo" id="tamanoTituloComo1" autocomplete="off" value="1" {{ $tamanoTituloComo1 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloComo1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloComo" id="tamanoTituloComo2" autocomplete="off" value="2" {{ $tamanoTituloComo2 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloComo2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloComo" id="tamanoTituloComo3" autocomplete="off" {{ $tamanoTituloComo3 }} value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloComo3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-como" name="color-titulo-input-como" value="{{ $color_titulo_como }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-como" id="color-titulo-como" value="{{ $color_titulo_como }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseThreeComo">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Participar</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseThreeComo  d-none-2">
                    <li class="my-2">
                        <p class="mb-1">Participar 1</p>
                        <div class="img-subir">
                            <button type="button" class="btn-delete-img">X</button>
                            <label for="participar_1">
                                <div class="cursor">
                                    <div id="upload-participar-1" class="{{ isset($participar_1_url) && !empty($participar_1_url) ? 'd-none' : '' }} upload_img">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1,000x1,000px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview_participar_1" src="{{ $participar_1_url }}">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="participar_1" id="participar_1">
                            <input type="hidden" name="participar_1-url" id="participar_1-url" value="{{ $participar_1_url }}">
                            <input type="text" class="data_value" value="item_participar_1" hidden>
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="mb-1">Participar 2</p>
                        <div class="img-subir">
                            <button type="button" class="btn-delete-img">X</button>
                            <label for="participar_2">
                                <div class="cursor">
                                    <div id="upload-participar-2" class="{{ isset($participar_2_url) && !empty($participar_2_url) ? 'd-none' : '' }} upload_img">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1,000x1,000px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview_participar_2" src="{{ $participar_2_url }}">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="participar_2" id="participar_2">
                            <input type="hidden" name="participar_2-url" id="participar_2-url" value="{{ $participar_2_url }}">
                            <input type="text" class="data_value" value="item_participar_2" hidden>
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="mb-1">Participar 3</p>
                        <div class="img-subir">
                            <button type="button" class="btn-delete-img">X</button>
                            <label for="participar_3">
                                <div class="cursor">
                                    <div id="upload-participar-3" class="{{ isset($participar_3_url) && !empty($participar_3_url) ? 'd-none' : '' }} upload_img">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1,000x1,000px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview_participar_3" src="{{ $participar_3_url }}">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="participar_3" id="participar_3">
                            <input type="hidden" name="participar_3-url" id="participar_3-url" value="{{ $participar_3_url }}">
                            <input type="text" class="data_value" value="item_participar_3" hidden>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseFourComo">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseFourComo  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-boton-como" id="bold-boton-como" {{ $bold_boton_como }}>
                                <label for="bold-boton-como" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_como_btn">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-boton-como" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_como_btn">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-boton-como" id="italic-boton-como" {{ $italic_boton_como }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-boton-como" id="input-boton-como" value="{{ $input_buttom_como }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoBotonComo" id="tamanoBotonComo1" autocomplete="off" {{ $tamanoBotonComo1 }} value="1">
                            <label class="btn btn-outline-text" for="tamanoBotonComo1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoBotonComo" id="tamanoBotonComo2" autocomplete="off" {{ $tamanoBotonComo2 }} value="2">
                            <label class="btn btn-outline-text" for="tamanoBotonComo2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoBotonComo" id="tamanoBotonComo3" autocomplete="off" {{ $tamanoBotonComo3 }} value="3">
                            <label class="btn btn-outline-text" for="tamanoBotonComo3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Fondo</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-boton-input-como" name="color-boton-input-como" value="{{ $color_boton_como }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-boton-como" id="color-boton-como" value="{{ $color_boton_como }}">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @php
            $formulario_participar = isset($landing->formulario_participar) && !empty($landing->formulario_participar) ? json_decode($landing->formulario_participar, true) : null;

            $border_formulario = $formulario_participar && $formulario_participar["border-formulario"] ? $formulario_participar["border-formulario"] : '#fbbb01';

            $bold_titulo_formulario = $formulario_participar && $formulario_participar["bold-titulo-formulario"] == 1 ? "checked" : "";
            $bold_titulo_formulario_style = $formulario_participar && $formulario_participar["bold-titulo-formulario"] == 1 ? "fw-bold" : "";
            $italic_titulo_formulario = $formulario_participar && $formulario_participar["italic-titulo-formulario"] == 1 ? "checked" : "";
            $italic_titulo_formulario_style = $formulario_participar && $formulario_participar["italic-titulo-formulario"] == 1 ? "fst-italic" : "";

            $input_titulo_formulario = $formulario_participar && $formulario_participar["input-titulo-formulario"] ? $formulario_participar["input-titulo-formulario"] : '¿Cómo participar?';

            $tamanoTituloFormulario1 = $formulario_participar && $formulario_participar["tamanoTituloFormulario"] == 1 ? 'checked' : '';
            $tamanoTituloFormulario2 = $formulario_participar && $formulario_participar["tamanoTituloFormulario"] == 2 ? 'checked' : '';
            $tamanoTituloFormulario3 = $formulario_participar && $formulario_participar["tamanoTituloFormulario"] == 3 ? 'checked' : '';
            $styletamanoTituloFormulario = $formulario_participar && $formulario_participar["tamanoTituloFormulario"]  == 1 ? "fs-6" : ($formulario_participar && $formulario_participar["tamanoTituloFormulario"]  == 2 ? "fs-3"  :  ($formulario_participar && $formulario_participar["tamanoTituloFormulario"]  == 3 ? "fs-1"  : ""));
        
            $color_titulo_formulario = $formulario_participar && $formulario_participar["color-titulo-formulario"] ? $formulario_participar["color-titulo-formulario"] : '#fbbb01';

            $color_label_formulario = $formulario_participar && $formulario_participar["color-label-formulario"] ? $formulario_participar["color-label-formulario"] : '#ffffff';

            $bold_boton_formulario = $formulario_participar && $formulario_participar["bold-boton-formulario"] == 1 ? "checked" : "";
            $bold_boton_formulario_style = $formulario_participar && $formulario_participar["bold-boton-formulario"] == 1 ? "fw-bold" : "";
            $italic_boton_formulario = $formulario_participar && $formulario_participar["italic-boton-formulario"] == 1 ? "checked" : "";
            $italic_boton_formulario_style = $formulario_participar && $formulario_participar["italic-boton-formulario"] == 1 ? "fst-italic" : "";

            $tamanoBotonFormulario1 = $formulario_participar && $formulario_participar["tamanoBotonFormulario"] == 1 ? 'checked' : '';
            $tamanoBotonFormulario2 = $formulario_participar && $formulario_participar["tamanoBotonFormulario"] == 2 ? 'checked' : '';
            $tamanoBotonFormulario3 = $formulario_participar && $formulario_participar["tamanoBotonFormulario"] == 3 ? 'checked' : '';
            $styletamanoBotonFormulario = $formulario_participar && $formulario_participar["tamanoBotonFormulario"]  == 1 ? "fs-6" : ($formulario_participar && $formulario_participar["tamanoBotonFormulario"]  == 2 ? "fs-3"  :  ($formulario_participar && $formulario_participar["tamanoBotonFormulario"]  == 3 ? "fs-1"  : ""));
        
            $color_boton_formulario = $formulario_participar && $formulario_participar["color-boton-formulario"] ? $formulario_participar["color-boton-formulario"] : '#ffffff';

            $input_buttom_formulario = $formulario_participar && isset($formulario_participar["input-boton-formulario"]) ? $formulario_participar["input-boton-formulario"] : 'PARTICIPAR ';
        @endphp
        <div class="d-none" id="form-participar">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_form_participa"><i class="fas fa-chevron-left"></i> Formulario Participar</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web hide" type="button" id="collapseOneFormulario">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Formulario participar</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseOneFormulario ">
                    <li class="my-2">
                        <p class="my-1">Color Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="border-input-formulario" name="border-input-formulario" value="{{ $border_formulario }}">
                            <input type="color" class="form-control form-control-color p-0" name="border-formulario" id="border-formulario" value="{{ $border_formulario }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseTwoFormulario">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseTwoFormulario  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-formulario" id="bold-titulo-formulario" {{ $bold_titulo_formulario }}>
                                <label for="bold-titulo-formulario" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_formulario">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-titulo-formulario" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_formulariio">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-titulo-formulario" id="italic-titulo-formulario" {{ $italic_titulo_formulario }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-formulario" id="input-titulo-formulario" value="{{ $input_titulo_formulario }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloFormulario" id="tamanoTituloFormulario1" autocomplete="off" value="1" {{ $tamanoTituloFormulario1 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloFormulario1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloFormulario" id="tamanoTituloFormulario2" autocomplete="off" value="2" {{ $tamanoTituloFormulario2 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloFormulario2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloFormulario" id="tamanoTituloFormulario3" autocomplete="off" {{ $tamanoTituloFormulario3 }} value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloFormulario3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-formulario" name="color-titulo-input-formulario" value="{{ $color_titulo_formulario }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-formulario" id="color-titulo-formulario" value="{{ $color_titulo_formulario }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseThreeFormulario">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque formulario</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseThreeFormulario  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Color Label Formulario</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-label-input-formulario" name="color-label-input-formulario" value="{{ $color_label_formulario }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-label-formulario" id="color-label-formulario" value="{{ $color_label_formulario }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseFourFormulario">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseFourFormulario  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-boton-formulario" id="bold-boton-formulario" {{ $bold_boton_formulario }}>
                                <label for="bold-boton-formulario" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_formulario_btn">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-boton-formulario" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_formulariio_btn">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-boton-formulario" id="italic-boton-formulario" {{ $italic_boton_formulario }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-boton-formulario" id="input-boton-formulario" value="{{ $input_buttom_formulario }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoBotonFormulario" id="tamanoBotonFormulario1" autocomplete="off" {{ $tamanoBotonFormulario1 }} value="1">
                            <label class="btn btn-outline-text" for="tamanoBotonFormulario1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoBotonFormulario" id="tamanoBotonFormulario2" autocomplete="off" value="2" {{ $tamanoBotonFormulario2 }}>
                            <label class="btn btn-outline-text" for="tamanoBotonFormulario2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoBotonFormulario" id="tamanoBotonFormulario3" autocomplete="off" value="3" {{ $tamanoBotonFormulario3 }}>
                            <label class="btn btn-outline-text" for="tamanoBotonFormulario3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-boton-input-formulario" name="color-boton-input-formulario" value="{{ $color_boton_formulario }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-boton-formulario" id="color-boton-formulario" value="{{ $color_boton_formulario }}">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @php
            $ganadores = isset($landing->ganadores) && !empty($landing->ganadores) ? json_decode($landing->ganadores, true) : null;
            
            $border_ganador = $ganadores && $ganadores["border-ganador"] ? $ganadores["border-ganador"] : '#fbbb01';

            $bold_titulo_ganador = $ganadores && $ganadores["bold-titulo-ganador"] == 1 ? "checked" : "";
            $bold_titulo_ganador_style = $ganadores && $ganadores["bold-titulo-ganador"] == 1 ? "fw-bold" : "";
            $italic_titulo_ganador = $ganadores && $ganadores["italic-titulo-ganador"] == 1 ? "checked" : "";
            $italic_titulo_ganador_style = $ganadores && $ganadores["italic-titulo-ganador"] == 1 ? "fst-italic" : "";

            $input_titulo_ganador = $ganadores && $ganadores["input-titulo-ganador"] ? $ganadores["input-titulo-ganador"] : 'Ganadores';

            $tamanoTituloGanador1 = $ganadores && $ganadores["tamanoTituloGanador"] == 1 ? 'checked' : '';
            $tamanoTituloGanador2 = $ganadores && $ganadores["tamanoTituloGanador"] == 2 ? 'checked' : '';
            $tamanoTituloGanador3 = $ganadores && $ganadores["tamanoTituloGanador"] == 3 ? 'checked' : '';
            $styletamanoTituloGanador = $ganadores && $ganadores["tamanoTituloGanador"]  == 1 ? "fs-6" : ($ganadores && $ganadores["tamanoTituloGanador"]  == 2 ? "fs-3"  :  ($ganadores && $ganadores["tamanoTituloGanador"]  == 3 ? "fs-1"  : ""));
        
            $color_titulo_ganador = $ganadores && $ganadores["color-titulo-ganador"] ? $ganadores["color-titulo-ganador"] : '#fbbb01';

            $color_lista = $ganadores && $ganadores["color-lista-ganador"] ? $ganadores["color-lista-ganador"] : '#ffffff';
        @endphp
        <div class="d-none" id="ganadores-section">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_ganador"><i class="fas fa-chevron-left"></i> Ganadores</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web hidev" type="button" id="collapseOneGanador">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Ganadores</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseOneGanador">
                    <li class="my-2">
                        <p class="my-1">Color Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="border-input-ganador" name="border-input-ganador" value="{{ $border_ganador }}">
                            <input type="color" class="form-control form-control-color p-0" name="border-ganador" id="border-ganador" value="{{ $border_ganador }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseTwoGanador">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseTwoGanador  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-ganador" id="bold-titulo-ganador" {{ $bold_titulo_ganador }}>
                                <label for="bold-titulo-ganador" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_ganador">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-titulo-ganador" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_ganador">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-titulo-ganador" id="italic-titulo-ganador" {{ $italic_titulo_ganador }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-ganador" id="input-titulo-ganador" value="{{ $input_titulo_ganador }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloGanador" id="tamanoTituloGanador1" autocomplete="off" value="1" {{ $tamanoTituloGanador1 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloGanador1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloGanador" id="tamanoTituloGanador2" autocomplete="off" value="2" {{ $tamanoTituloGanador2 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloGanador2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloGanador" id="tamanoTituloGanador3" autocomplete="off" {{ $tamanoTituloGanador3 }} value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloGanador3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-ganador" name="color-titulo-input-ganador" value="{{ $color_titulo_ganador }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-ganador" id="color-titulo-ganador" value="{{ $color_titulo_ganador }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseThreeGanador">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque ganadores</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseThreeGanador  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Color Lista</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-lista-input-ganador" name="color-lista-input-ganador" value="{{ $color_lista }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-lista-ganador" id="color-lista-ganador" value="{{ $color_lista }}">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @php
            $preguntas_frecuentes = isset($landing->preguntas_frecuentes) && !empty($landing->preguntas_frecuentes) ? json_decode($landing->preguntas_frecuentes, true) : null;
            $border_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["border-pregunta"] ? $preguntas_frecuentes["border-pregunta"] : '#fbbb01';

            $bold_titulo_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["bold-titulo-pregunta"] == 1 ? "checked" : "";
            $bold_titulo_pregunta_style = $preguntas_frecuentes && $preguntas_frecuentes["bold-titulo-pregunta"] == 1 ? "fw-bold" : "";
            $italic_titulo_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["italic-titulo-pregunta"] == 1 ? "checked" : "";
            $italic_titulo_pregunta_style = $preguntas_frecuentes && $preguntas_frecuentes["italic-titulo-pregunta"] == 1 ? "fst-italic" : "";

            $input_titulo_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["input-titulo-pregunta"] ? $preguntas_frecuentes["input-titulo-pregunta"] : 'Preguntas Frecuentes';

            $tamanoTituloPregunta1 = $preguntas_frecuentes && $preguntas_frecuentes["tamanoTituloPregunta"] == 1 ? 'checked' : '';
            $tamanoTituloPregunta2 = $preguntas_frecuentes && $preguntas_frecuentes["tamanoTituloPregunta"] == 2 ? 'checked' : '';
            $tamanoTituloPregunta3 = $preguntas_frecuentes && $preguntas_frecuentes["tamanoTituloPregunta"] == 3 ? 'checked' : '';
            $styletamanoTituloPregunta = $preguntas_frecuentes && $preguntas_frecuentes["tamanoTituloPregunta"]  == 1 ? "fs-6" : ($preguntas_frecuentes && $preguntas_frecuentes["tamanoTituloPregunta"]  == 2 ? "fs-3"  :  ($preguntas_frecuentes && $preguntas_frecuentes["tamanoTituloPregunta"]  == 3 ? "fs-1"  : ""));
        
            $color_titulo_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["color-titulo-pregunta"] ? $preguntas_frecuentes["color-titulo-pregunta"] : '#fbbb01';

            $color_text_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["color-text-pregunta"] ? $preguntas_frecuentes["color-text-pregunta"] : '#fbbb01';

            $color_border_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["color-borde-pregunta"] ? $preguntas_frecuentes["color-borde-pregunta"] : '#fbbb01';

            $pregunta1 = $preguntas_frecuentes && $preguntas_frecuentes["pregunta1"] ? $preguntas_frecuentes["pregunta1"] : '';
            $respuesta1 = $preguntas_frecuentes && $preguntas_frecuentes["respuesta1"] ? $preguntas_frecuentes["respuesta1"] : '';

            $pregunta2 = $preguntas_frecuentes && $preguntas_frecuentes["pregunta2"] ? $preguntas_frecuentes["pregunta2"] : '';
            $respuesta2 = $preguntas_frecuentes && $preguntas_frecuentes["respuesta2"] ? $preguntas_frecuentes["respuesta2"] : '';

            $pregunta3 = $preguntas_frecuentes && $preguntas_frecuentes["pregunta3"] ? $preguntas_frecuentes["pregunta3"] : '';
            $respuesta3 = $preguntas_frecuentes && $preguntas_frecuentes["respuesta3"] ? $preguntas_frecuentes["respuesta3"] : '';

            $pregunta4 = $preguntas_frecuentes && $preguntas_frecuentes["pregunta4"] ? $preguntas_frecuentes["pregunta4"] : '';
            $respuesta4 = $preguntas_frecuentes && $preguntas_frecuentes["respuesta4"] ? $preguntas_frecuentes["respuesta4"] : '';
        @endphp
        <div class="d-none" id="preguntas-section">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-logo_subir: #fff;" id="back_pregunta"><i class="fas fa-chevron-left"></i> Preguntas Frecuentes</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web hidev" type="button" id="collapseOnePregunta">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Preguntas</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseOnePregunta">
                    <li class="my-2">
                        <p class="my-1">Color Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="border-input-pregunta" name="border-input-pregunta" value="{{ $border_pregunta }}">
                            <input type="color" class="form-control form-control-color p-0" name="border-pregunta" id="border-pregunta" value="{{ $border_pregunta }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseTwoPregunta">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseTwoPregunta  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-pregunta" id="bold-titulo-pregunta" {{ $bold_titulo_pregunta }}>
                                <label for="bold-titulo-pregunta" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_pregunta">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-titulo-pregunta" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_pregunta">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-titulo-pregunta" id="italic-titulo-pregunta" {{ $italic_titulo_pregunta }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-pregunta" id="input-titulo-pregunta" value="{{ $input_titulo_pregunta }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloPregunta" id="tamanoTituloPregunta1" autocomplete="off" value="1" {{ $tamanoTituloPregunta1 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloPregunta1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloPregunta" id="tamanoTituloPregunta2" autocomplete="off" value="2" {{ $tamanoTituloPregunta2 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloPregunta2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloPregunta" id="tamanoTituloPregunta3" autocomplete="off" {{ $tamanoTituloPregunta3 }} value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloPregunta3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-pregunta" name="color-titulo-input-pregunta" value="{{ $color_titulo_pregunta }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-pregunta" id="color-titulo-pregunta" value="{{ $color_titulo_pregunta }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseThreePregunta">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Preguntas frecuentes</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseThreePregunta  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Color Preguntas</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-text-input-pregunta" name="color-text-input-pregunta" value="{{ $color_text_pregunta }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-text-pregunta" id="color-text-pregunta" value="{{ $color_text_pregunta }}">
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="my-1">Color Preguntas Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-borde-input-pregunta" name="color-borde-input-pregunta" value="{{ $color_border_pregunta }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-borde-pregunta" id="color-borde-pregunta" value="{{ $color_border_pregunta }}">
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="my-1"><b>Preguntas:</b> </p>
                        <div>
                            <p>Pregunta 1</p>
                            <input type="text" class="form-control" name="pregunta1" id="pregunta1" value="{{ $pregunta1 }}">
                            <p>Respuesta</p>
                            <textarea class="form-control" name="respuesta1" id="respuesta1">{{ $respuesta1 }}</textarea>
                            <hr>
                        </div>
                        <div>
                            <p>Pregunta 2</p>
                            <input type="text" class="form-control" name="pregunta2" id="pregunta2" value="{{ $pregunta2 }}">
                            <p>Respuesta</p>
                            <textarea class="form-control" name="respuesta2" id="respuesta2">{{ $respuesta2 }}</textarea>
                            <hr>
                        </div>
                        <div>
                            <p>Pregunta 3</p>
                            <input type="text" class="form-control" name="pregunta3" id="pregunta3" value="{{ $pregunta3 }}">
                            <p>Respuesta</p>
                            <textarea class="form-control" name="respuesta3" id="respuesta3">{{ $respuesta3 }}</textarea>
                            <hr>
                        </div>
                        <div>
                            <p>Pregunta 4</p>
                            <input type="text" class="form-control" name="pregunta4" id="pregunta4" value="{{ $pregunta4 }}">
                            <p>Respuesta</p>
                            <textarea class="form-control" name="respuesta4" id="respuesta4">{{ $respuesta4 }}</textarea>
                            <hr>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @php
            $redes_sociales = isset($landing->redes_sociales) && !empty($landing->redes_sociales) ? json_decode($landing->redes_sociales, true) : null;

            $bold_titulo_redes = $redes_sociales && $redes_sociales["bold-titulo-redes"] == 1 ? "checked" : "";
            $bold_titulo_redes_style = $redes_sociales && $redes_sociales["bold-titulo-redes"] == 1 ? "fw-bold" : "";
            $italic_titulo_redes = $redes_sociales && $redes_sociales["italic-titulo-redes"] == 1 ? "checked" : "";
            $italic_titulo_redes_style = $redes_sociales && $redes_sociales["italic-titulo-redes"] == 1 ? "fst-italic" : "";

            $input_titulo_redes = $redes_sociales && $redes_sociales["input-titulo-redes"] ? $redes_sociales["input-titulo-redes"] : 'Redes Sociales';

            $tamanoTituloRedes1 = $redes_sociales && $redes_sociales["tamanoTituloRedes"] == 1 ? 'checked' : '';
            $tamanoTituloRedes2 = $redes_sociales && $redes_sociales["tamanoTituloRedes"] == 2 ? 'checked' : '';
            $tamanoTituloRedes3 = $redes_sociales && $redes_sociales["tamanoTituloRedes"] == 3 ? 'checked' : '';
            $styletamanoTituloRedes = $redes_sociales && $redes_sociales["tamanoTituloRedes"]  == 1 ? "fs-6" : ($redes_sociales && $redes_sociales["tamanoTituloRedes"]  == 2 ? "fs-3"  :  ($redes_sociales && $redes_sociales["tamanoTituloRedes"]  == 3 ? "fs-1"  : ""));
        
            $color_titulo_redes = $redes_sociales && $redes_sociales["color-titulo-redes"] ? $redes_sociales["color-titulo-redes"] : '#fbbb01';

            $color_icon_redes = $redes_sociales && $redes_sociales["color-icon-redes"] ? $redes_sociales["color-icon-redes"] : '#fbbb01';

            $redes_sociales_array = $redes_sociales && $redes_sociales["redes_sociales"] ? $redes_sociales["redes_sociales"] : [];
            
        @endphp
        <div class="d-none" id="redes-section">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-logo_subir: #fff;" id="back_redes"><i class="fas fa-chevron-left"></i> Redes Sociales</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web hidev" type="button" id="collapseOneRedees">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseOneRedees">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-redes" id="bold-titulo-redes" {{ $bold_titulo_redes }}>
                                <label for="bold-titulo-redes" class="d-flex align-items-center cursor">
                                    <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_redes">
                                        <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="p-1 cursor italic">
                                <label for="italic-titulo-redes" class="d-flex align-items-center cursor">
                                    <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_redes">
                                        <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                    </svg>
                                </label>
                                <input hidden type="checkbox" name="italic-titulo-redes" id="italic-titulo-redes" {{ $italic_titulo_redes }}>
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-redes" id="input-titulo-redes" value="{{ $input_titulo_redes }}">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloRedes" id="tamanoTituloRedes1" autocomplete="off" value="1" {{ $tamanoTituloRedes1 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloRedes1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloRedes" id="tamanoTituloRedes2" autocomplete="off" value="2" {{ $tamanoTituloRedes2 }}>
                            <label class="btn btn-outline-text" for="tamanoTituloRedes2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloRedes" id="tamanoTituloRedes3" autocomplete="off" {{ $tamanoTituloRedes3 }} value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloRedes3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-redes" name="color-titulo-input-redes" value="{{ $color_titulo_redes }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-redes" id="color-titulo-redes" value="{{ $color_titulo_redes }}">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web showv" type="button" id="collapseTwoRedees">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Redes</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapseTwoRedees  d-none-2">
                    <li class="my-2">
                        <p class="my-1">Color Redes</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-icon-input-redes" name="color-icon-input-redes" value="{{ $color_icon_redes }}">
                            <input type="color" class="form-control form-control-color p-0" name="color-icon-redes" id="color-icon-redes" value="{{ $color_icon_redes }}">
                        </div>
                    </li>
                    <li class="my-2">

                        <button type="button" class="btn btn-alicorp w-100 my-2" id="add_redes">Agregar Redes</button>

                        <div id="content_redes">

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </form>
    <div class="col-9 p-0" id="landing_page" style="overflow-y: scroll; height: 100vh;">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            :root {
                --landing: {{ $fondo_landing }};
                --color-text1: #fff;
                --color-active-nav: {{ $color_navegacion_input_hover }};
                --popins: "Poppins", sans-serif;
                --bg-nav: #080808;
                --buttom-header: #cd0a10;
                --color-buttom-header: #fff;
                --border-participar: {{ $border_input_como }};
                --title-participar: #fbbb01;
                --buttom-participar: #fbbb01;
                --buttom-vermas: #fbbb01;
                --color-vermas: #fff;
                --bg-arccordion: #080808;
                --color-active-arccordion: #fbbb01;
                --color-text-arccordion: #fff;
            }

            .landing_page {
                color: var(--color-text1) !important;
                background-color: var(--landing);
                font-family: var(--popins) !important;
            }

            .nav-landing {
                background-color: var(--bg-nav);
            }

            .navbar a {
                color: {{ $color_navegacion }};
                font-weight: 500;
            }

            .navbar a:hover {
                color: var(--color-active-nav) !important;
                text-decoration: underline;
            }

            .navbar a.active {
                color: var(--color-active-nav) !important;
                text-decoration: underline;
            }

            header {
                min-height: 600px;
                background-size: cover;
                background-repeat: no-repeat;
                padding: 3em;
                padding-top: 8em;
            }

            .btn-landing {
                background-color: var(--buttom-header);
                color: var(--color-buttom-header);
                border-radius: 25px;
                font-weight: 500;
                padding-left: 2em;
                padding-right: 2em;
            }

            section {
                position: relative;
                background-color: transparent;
                width: 90%;
                max-width: 1187px;
                margin: auto;
                border: 1px solid var(--border-participar);
                border-radius: 25px;
                padding: 2em 3.5em;
                margin-bottom: 5em;
                padding-bottom: 5em;
            }

            section .aside-row {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 2em;
            }

            section .movil-aside {
                display: grid;
                grid-template-columns: 1fr !important;
                gap: 0em;
            }

            section .item-participar {
                width: 100%;
                height: 300px;
            }

            section .item-participar:first-child {
                border-top-left-radius: 10px;
            }

            section .item-participar:last-child {
                border-top-right-radius: 10px;
            }

            .title-participar {
                color: var(--title-participar);
                font-weight: 600;
                margin-bottom: 1.7rem;
            }

            section .btn-landing {
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translate(-50%, 50%);
            }

            .input-text {
                border-radius: 25px;
            }

            .btn-participar, .btn-ver-mas {
                background-color: var(--buttom-participar);
                color: var(--color-buttom-header);
                border-radius: 25px;
                font-weight: 500;
                padding-left: 2em;
                padding-right: 2em;
            }

            /* .btn-participar:hover {
                background-color: var(--buttom-participar) !important;
            } */


            .landing_page table {
                color: var(--color-text1);
            }

            .btn-ver-mas {
                background-color: var(--buttom-vermas);
                color: var(--color-vermas);
            }

            .accordion-item {
                background-color: transparent !important;
                color: var(--color-text-arccordion);
            }

            .accordion-button {
                background-color: transparent !important;
                color: var(--color-text-arccordion);
            }


            .btns {
                border: none;
                padding: 0.4em 1.2em;
                text-decoration: none;
            }

            .btns:hover {
                color: #fff;
            }

            footer a {
                display: block;
                width: 50px;
                margin: 0px 1em;
            }


            @media (max-width: 575.98px) {
                .aside-row {
                    grid-template-columns: 1fr !important;
                    gap: 0em !important;
                }
            }


            @media (min-width: 576px) and (max-width: 767.98px) {
                .aside-row {
                    grid-template-columns: 1fr !important;
                    gap: 0em !important;
                }
            }


            @media (min-width: 768px) and (max-width: 991.98px) {
                .aside-row {
                    grid-template-columns: 1fr 1fr !important;
                    gap: 0em !important;
                }
            }


            @media (min-width: 992px) and (max-width: 1199.98px) {
                .aside-row {
                    grid-template-columns: 1fr 1fr !important;
                    gap: 0em !important;
                }
            }


            @media (min-width: 1200px) {

            }

            .nav-position {
                position: sticky;
                top: 0;
                z-index: 999;
            }

            .cursor {
                cursor: pointer;
            }

            .img-subir {
                position: relative;
                display: block;
                width: 100%;
                padding: 1.2em;
                border: 1px solid #D0D5DD;
                border-radius: 8px;
                text-align: center;
                cursor: pointer;
            }

            .img-subir h6 {
                color: #027A48 !important;
            }

            .img-subir p {
                color: #868686;
                font-weight: 400;
                font-size: 12px;
                margin: 0;
            }

            .btn-outline-text {
                border: 1px solid #D0D5DD !important;
            }

            .btn-check:checked+.btn {
                background-color: #E620200D;
                border-color: #E62020 !important;
            }

            .header-edit-web {
                width: 100%;
                text-align: left;
                border: 0;
                background-color: #fff !important;
            }

            .distribucion:checked ~ .horizontal {
                border-color: #E62020 !important;
                background-color: #E620200D;
            }

            .distribucion:checked ~ .vertical {
                border-color: #E62020 !important;
                background-color: #E620200D;
            }

            .distribucion_menu:checked ~ .menu-left {
                border-color: #E62020 !important;
                background-color: #E620200D;
            }

            .distribucion_menu:checked ~ .menu-right {
                border-color: #E62020 !important;
                background-color: #E620200D;
            }

            .table > :not(caption) > * > * {
                background-color: transparent;
                color: {{ $color_lista }};
            }
            .accordion-button:not(.collapsed) {
                box-shadow: inset 0 calc(-1 * 1px) 0 var(--border-participar) !important;
            }
        </style>
        <div class="landing_page position-relative">
            <div class="w-100 nav-landing nav-position px-5" id="nav-landing" style="background-color: {{ $color_menu }} !important;">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">
                                    <img src="{{$logo_subir}}" alt="Bootstrap" id="logo-nav" style="width: 100px;">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars" style="color: #fff;"></i>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex" style="gap: 3rem;">
                                        <li class="nav-item">
                                            <a class="navegacion_1_menu nav-link active item_landing_menu {{ $bold_menu_style }} {{ $italic_menu_style }} {{ $styleTamanoMenu }}" aria-current="page" href="#participar" id="{{ $direccionar_1 }}">{{ $navegacion_1 }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="navegacion_2_menu nav-link item_landing_menu {{ $bold_menu_style }} {{ $italic_menu_style }} {{ $styleTamanoMenu }}" href="#preguntas-frecuentes" id="{{ $direccionar_2 }}">{{ $navegacion_2 }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="navegacion_3_menu nav-link item_landing_menu {{ $bold_menu_style }} {{ $italic_menu_style }} {{ $styleTamanoMenu }}" href="#" id="{{ $direccionar_3 }}">{{ $navegacion_3 }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="navegacion_4_menu nav-link item_landing_menu {{ $bold_menu_style }} {{ $italic_menu_style }} {{ $styleTamanoMenu }}" href="#ganadores" id="{{ $direccionar_4 }}">{{ $navegacion_4 }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <header id="header" class="w-100 d-flex flex-column justify-content-center align-items-center" style="gap: 1.2rem;background-image: url({{$banner_subir}});">
                    {{-- <img class="img-fluid" src="{{$imagen_subir}}" alt="" id="imagen-header"> --}}
                    <p class="{{ $stylealineacionTitulo }} {{ $styleTamanoTituloHeader }} w-100 {{ $bold_titulo_header_style }} {{ $italic_titulo_header_style }}" id="titulo_header">{{ $input_titulo_header }}</p>
                    <p class="{{ $stylealineacionTexto }} {{ $styletamanoTextoHeader }} w-100 {{ $bold_titulo_parrafo_style }} {{ $italic_titulo_parrafo_style }}" id="parrafo-header" style="color: {{ $color_texto }};">{{ $input_texto_header }}</p>
                    <a href="{{ $direccionar_boton_header }}" class="btns btn-landing {{ $styletamanoBotonHeader }} {{ $bold_boton_parrafo_style }} {{ $italic_boton_parrafo_style }}" id="btn_participar_header" style="background-color: {{ $color_boton_header }};margin-top: 12em;">{{ $titulo_boton_header }}</a>
                </header>
                <div class="pt-5" id="participar">
                    <section>
                        <h1 class="text-center title-participar {{ $bold_titulo_como_style }} {{ $italic_titulo_como_style }} {{ $styletamanoTituloComo }}" id="title_como" style="color: {{ $color_titulo_como }} !important;">{{ $input_titulo_como }}</h1>
                        <div class="aside-row">
                            <aside class="col-12 col-md-6 col-lg-4 item-participar">
                                <img class="img-fluid" src="{{$participar_1}}" alt="" id="item_participar_1">
                            </aside>
                            <aside class="col-12 col-md-6 col-lg-4 item-participar">
                                <img class="img-fluid" src="{{$participar_2}}" alt="" id="item_participar_2">
                            </aside>
                            <aside class="col-12 col-md-6 col-lg-4 item-participar">
                                <img class="img-fluid" src="{{$participar_3}}" alt="" id="item_participar_3">
                            </aside>
                        </div>
                        <button class="btns btn-landing {{ $styletamanoBotonComo }} {{ $bold_boton_como_style }} {{ $italic_boton_como_style }}" id="btn-como" style="background-color: {{ $color_boton_como }} !important;">{{ $input_buttom_como }}</button>
                    </section>
                </div>
                <div class="mt-5" id="formulario-participar">
                    <section style="border-color: {{ $border_formulario }} !important;">
                        <h1 class="text-center title-participar {{ $styletamanoTituloFormulario }} {{ $bold_titulo_formulario_style }} {{ $italic_titulo_formulario_style }}" id="title_formulario_participar" style="color: {{ $color_titulo_formulario }};">{{ $input_titulo_formulario }}</h1>
                        <form class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">Nombre</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">Apellido</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">Tipo de documento</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">N° de documento</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">Edad (*Mayores de 18 años)</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">N° telefónico</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">Correo Electronico</label>
                                <input type="email" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">N° de LOTE + foto de producto</label>
                                <input type="text" class="form-control input-text">
                                <input type="file" name="" id="" class="form-control mt-2">
                            </div>
    
                            <div class="col-12 row mt-3">
                                <div class="form-check col-12 col-md-6 col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="termino_condicion" id="termino_condicion">
                                    <label class="form-check-label label_form" for="termino_condicion " style="color: {{ $color_label_formulario }} !important;">
                                        Acepto terminos y condiciones
                                    </label>
                                </div>
                                <div class="form-check col-12 col-md-6 col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="datos_web" id="datos_web">
                                    <label class="form-check-label label_form" for="datos_web" style="color: {{ $color_label_formulario }} !important;">
                                        Deseo usar mis datos para crear un usuario en plataforma web
                                    </label>
                                </div>
                                <div class="form-check col-12 col-md-6 col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="politica_privacidad" id="politica_privacidad">
                                    <label class="form-check-label label_form" for="politica_privacidad" style="color: {{ $color_label_formulario }} !important;">
                                        Acepto política de privacidad de datos
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mt-3 d-flex justify-content-center">
                                <button type="submit" class="btns btn-participar {{ $styletamanoBotonFormulario }} {{ $bold_boton_formulario_style }} {{ $italic_boton_formulario_style }}" id="btn-formulario" style="background-color: {{ $color_boton_formulario }} !important;">{{ $input_buttom_formulario }}</button>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="mt-5"  id="ganadores">
                    <section style="border-color: {{ $border_ganador }} !important;">
                        <h1 class="text-center title-participar {{ $bold_titulo_ganador_style }} {{ $italic_titulo_ganador_style }} {{ $styletamanoTituloGanador }}" id="ganador-title" style="color: {{ $color_titulo_ganador }} !important;">{{ $input_titulo_ganador }}</h1>
                        <div class="w-100 table-responsive">
                            <table class="table table-borderless" id="lista_ganador">
                                <thead>
                                    <tr>
                                        <th>N° de documento</th>
                                        <th>Nombres</th>
                                        <th>Premio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                    <tr>
                                        <td>73897044</td>
                                        <td>Kevin Blas Huamán</td>
                                        <td>Articulo 1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <div class="mt-5" id="preguntas-frecuentes">
                    <section style="border-color: {{ $border_pregunta }} !important;">
                        <h1 class="text-center title-participar {{ $bold_titulo_pregunta_style }} {{ $italic_titulo_pregunta_style }} {{ $styletamanoTituloPregunta }}" id="pregunta-title" style="color: {{ $color_titulo_pregunta }} !important;">{{ $input_titulo_pregunta }}</h1>
                        <div class="w-100">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item" style="border-color: {{ $color_border_pregunta }} !important;">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" 
                                    id="pregunta-1-landing" style="color: {{ $color_text_pregunta }} !important;">
                                    {{ $pregunta1 }}
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body" id="respuesta-1-landing">
                                        {{ $respuesta1 }}
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item" style="border-color: {{ $color_border_pregunta }} !important;">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="pregunta-2-landing" style="color: {{ $color_text_pregunta }} !important;">
                                        {{ $pregunta2 }}
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body" id="respuesta-2-landing">
                                        {{ $respuesta2 }}
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item" style="border-color: {{ $color_border_pregunta }} !important;">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="pregunta-3-landing" style="color: {{ $color_text_pregunta }} !important;">
                                        {{ $pregunta3 }}
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body"  id="respuesta-3-landing">
                                        {{ $respuesta3 }}
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item" style="border-color: {{ $color_border_pregunta }} !important;">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" id="pregunta-4-landing" style="color: {{ $color_text_pregunta }} !important;">
                                        {{ $pregunta4 }}
                                    </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse">
                                    <div class="accordion-body"  id="respuesta-4-landing">
                                        {{ $respuesta4 }}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="w-100 pb-5" id="redes">
                <footer>
                    <h1 class="text-center title-participar mb-5 {{ $styletamanoTituloRedes }} {{ $bold_titulo_redes_style }} {{ $italic_titulo_redes_style }}" id="redes-title" style="color: {{ $color_titulo_redes }} !important;">{{ $input_titulo_redes }}</h1>
                    <div class="d-flex justify-content-center" id="landing_redes">
                        {{-- <a href=""> --}}
                            {{-- <i class="fab fa-facebook" style="font-size: 3.2rem;color: #fbbb01 !important;"></i>
                            <i class="fab fa-instagram" style="font-size: 3.2rem;color: #fbbb01 !important;"></i>
                            <i class="fab fa-linkedin" style="font-size: 3.2rem;color: #fbbb01 !important;"></i>
                            <i class="fab fa-twitter" style="font-size: 3.2rem;color: #fbbb01 !important;"></i>
                            <i class="fab fa-google" style="font-size: 3.2rem;color: #fbbb01 !important;"></i>
                            <i class="fab fa-youtube" style="font-size: 3.2rem;color: #fbbb01 !important;"></i> --}}
                        {{-- </a> --}}
                    </div>
                </footer>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const menu_edit = document.getElementById("menu_edit");
    function retornoMenuEdit() {
        menu_edit.classList.remove('d-none'); 
        menu_edit.classList.add('d-block'); 
    }
    function retornoMenuEditNone() {
        menu_edit.classList.add('d-none'); 
        menu_edit.classList.remove('d-block'); 
    }
    const pagina_principal = document.getElementById("pagina_principal");
    const back_principal = document.getElementById("back_principal");
    const principal_menu = document.getElementById("principal-menu");
    
    principal_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        pagina_principal.classList.add('d-block'); 
        pagina_principal.classList.remove('d-none'); 
    })

    back_principal.addEventListener('click', () => {
        pagina_principal.classList.remove('d-block'); 
        pagina_principal.classList.add('d-none'); 
        retornoMenuEdit();
    })

    const encabezado = document.getElementById("encabezado");
    const back_encabezado = document.getElementById("back_encabezado");
    const encabezado_menu = document.getElementById("encabezado-menu");
    
    encabezado_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        encabezado.classList.add('d-block'); 
        encabezado.classList.remove('d-none'); 
    })
    back_encabezado.addEventListener('click', () => {
        encabezado.classList.remove('d-block'); 
        encabezado.classList.add('d-none'); 
        retornoMenuEdit();
    })

    
    const como_participar = document.getElementById('como_participar')
    const back_como_participa = document.getElementById('back_como_participa')
    const participar_menu = document.getElementById('participar-menu')
    
    participar_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        como_participar.classList.add('d-block'); 
        como_participar.classList.remove('d-none'); 
    })
    back_como_participa.addEventListener('click', () => {
        como_participar.classList.remove('d-block'); 
        como_participar.classList.add('d-none'); 
        retornoMenuEdit();
    })
    
    const formulario_participar = document.getElementById('form-participar')
    const back_form_participa = document.getElementById('back_form_participa')
    const formulario_menu = document.getElementById('formulario-menu')
    
    formulario_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        formulario_participar.classList.add('d-block'); 
        formulario_participar.classList.remove('d-none'); 
    })
    back_form_participa.addEventListener('click', () => {
        formulario_participar.classList.remove('d-block'); 
        formulario_participar.classList.add('d-none'); 
        retornoMenuEdit();
    })
    
    const ganadores_section = document.getElementById('ganadores-section')
    const back_ganador = document.getElementById('back_ganador')
    const ganadores_menu = document.getElementById('ganadores-menu')
    
    ganadores_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        ganadores_section.classList.add('d-block'); 
        ganadores_section.classList.remove('d-none'); 
    })
    back_ganador.addEventListener('click', () => {
        ganadores_section.classList.remove('d-block'); 
        ganadores_section.classList.add('d-none'); 
        retornoMenuEdit();
    })
    
    const preguntas_section = document.getElementById('preguntas-section')
    const back_pregunta = document.getElementById('back_pregunta')
    const preguntas_menu = document.getElementById('preguntas-menu')
    
    preguntas_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        preguntas_section.classList.add('d-block'); 
        preguntas_section.classList.remove('d-none'); 
    })
    back_pregunta.addEventListener('click', () => {
        preguntas_section.classList.remove('d-block'); 
        preguntas_section.classList.add('d-none'); 
        retornoMenuEdit();
    })
    
    const redes_section = document.getElementById('redes-section')
    const back_redes = document.getElementById('back_redes')
    const redes_menu = document.getElementById('redes-menu')
    
    redes_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        redes_section.classList.add('d-block'); 
        redes_section.classList.remove('d-none'); 
    })
    back_redes.addEventListener('click', () => {
        redes_section.classList.remove('d-block'); 
        redes_section.classList.add('d-none'); 
        retornoMenuEdit();
    })

</script>
<script>

    const header = document.getElementById('header')
    const input_titulo_header = document.getElementById('input-titulo-header')
    const titulo_header = document.getElementById('titulo_header')
    const parrafo_header = document.getElementById('parrafo-header')

    document.getElementById('banner-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-banner');
                const upload = document.getElementById('upload-banner')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                header.style.backgroundImage = `url(${e.target.result})`;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    input_titulo_header.addEventListener('input', function(event) {
        titulo_header.innerText = event.target.value
    })

    //fs-1

    // tamaño titulo
    const tamanoTitulo1 = document.getElementById("tamanoTitulo1")
    const tamanoTitulo2 = document.getElementById("tamanoTitulo2")
    const tamanoTitulo3 = document.getElementById("tamanoTitulo3")

    tamanoTitulo1.addEventListener("change", function() {
        titulo_header.classList.remove('fs-1')
        titulo_header.classList.remove('fs-3')
        titulo_header.classList.add('fs-6')
    })
    tamanoTitulo2.addEventListener("change", function() {
        titulo_header.classList.remove('fs-1')
        titulo_header.classList.add('fs-3')
        titulo_header.classList.remove('fs-6')
    })
    tamanoTitulo3.addEventListener("change", function() {
        titulo_header.classList.add('fs-1')
        titulo_header.classList.remove('fs-3')
        titulo_header.classList.remove('fs-6')
    })

    // alineacion
    const alineacionTitulo1 = document.getElementById('alineacionTitulo1')
    const alineacionTitulo2 = document.getElementById('alineacionTitulo2')
    const alineacionTitulo3 = document.getElementById('alineacionTitulo3')

    alineacionTitulo1.addEventListener("change", function() {
        titulo_header.classList.remove('text-end')
        titulo_header.classList.remove('text-center')
        titulo_header.classList.add('text-start')
    })
    alineacionTitulo2.addEventListener("change", function() {
        titulo_header.classList.remove('text-end')
        titulo_header.classList.add('text-center')
        titulo_header.classList.remove('text-start')
    })
    alineacionTitulo3.addEventListener("change", function() {
        titulo_header.classList.add('text-end')
        titulo_header.classList.remove('text-center')
        titulo_header.classList.remove('text-start')
    })

    // color
    const color_titulo_input = document.getElementById('color-titulo-input')
    const color_titulo = document.getElementById('color-titulo')

    color_titulo_input.addEventListener("input", function(event) {
        color_titulo.value = event.target.value
        titulo_header.style.color = event.target.value
    })

    color_titulo.addEventListener('input', function(event) {
        color_titulo_input.value = this.value
        titulo_header.style.color = this.value
    })

    // estilo texto
    const bold_titulo_header = document.getElementById('bold-titulo-header')
    const italic_titulo_header = document.getElementById('italic-titulo-header')

    bold_titulo_header.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold path')
        if (this.checked) {
            titulo_header.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            titulo_header.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_titulo_header.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic path')
        if (this.checked) {
            titulo_header.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            titulo_header.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })


    // parrafo titulo

    // estilo texto
    const titulo_parrafo = document.getElementById('parrafo-header')
    const input_text_header = document.getElementById('texto-header')
    const bold_titulo_parrafo = document.getElementById('bold-titulo-parrafo')
    const italic_titulo_parrafo = document.getElementById('italic-titulo-parrafo')

    bold_titulo_parrafo.addEventListener('change', function(event) {
        console.log(this.checked)
        const svg_bold = document.querySelector('#svg_bold_texto path')
        if (this.checked) {
            titulo_parrafo.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            titulo_parrafo.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_titulo_parrafo.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_texto path')
        if (this.checked) {
            titulo_parrafo.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            titulo_parrafo.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    input_text_header.addEventListener('input', function(event) {
        titulo_parrafo.innerText = event.target.value
    })

    // tamaño titulo
    const tamanoTexto1 = document.getElementById("tamanoTexto1")
    const tamanoTexto2 = document.getElementById("tamanoTexto2")
    const tamanoTexto3 = document.getElementById("tamanoTexto3")

    tamanoTexto1.addEventListener("change", function() {
        titulo_parrafo.classList.remove('fs-1')
        titulo_parrafo.classList.remove('fs-3')
        titulo_parrafo.classList.add('fs-6')
    })
    tamanoTexto2.addEventListener("change", function() {
        titulo_parrafo.classList.remove('fs-1')
        titulo_parrafo.classList.add('fs-3')
        titulo_parrafo.classList.remove('fs-6')
    })
    tamanoTexto3.addEventListener("change", function() {
        titulo_parrafo.classList.add('fs-1')
        titulo_parrafo.classList.remove('fs-3')
        titulo_parrafo.classList.remove('fs-6')
    })

    // alineacion
    const alineacionTexto1 = document.getElementById('alineacionTexto1')
    const alineacionTexto2 = document.getElementById('alineacionTexto2')
    const alineacionTexto3 = document.getElementById('alineacionTexto3')

    alineacionTexto1.addEventListener("change", function() {
        titulo_parrafo.classList.remove('text-end')
        titulo_parrafo.classList.remove('text-center')
        titulo_parrafo.classList.add('text-start')
    })
    alineacionTexto2.addEventListener("change", function() {
        titulo_parrafo.classList.remove('text-end')
        titulo_parrafo.classList.add('text-center')
        titulo_parrafo.classList.remove('text-start')
    })
    alineacionTexto3.addEventListener("change", function() {
        titulo_parrafo.classList.add('text-end')
        titulo_parrafo.classList.remove('text-center')
        titulo_parrafo.classList.remove('text-start')
    })

    // color
    const color_texto_input = document.getElementById('color-texto-input')
    const color_texto = document.getElementById('color-texto')

    color_texto_input.addEventListener("input", function(event) {
        color_texto.value = event.target.value
        titulo_parrafo.style.color = event.target.value
    })

    color_texto.addEventListener('input', function(event) {
        color_texto_input.value = this.value
        titulo_parrafo.style.color = this.value
    })

    // FOndo color
    const fondo_landing_input = document.getElementById('fondo_landing_input')
    const fondo_landing = document.getElementById('fondo_landing')
    const landing_page  = document.querySelector('.landing_page');

    fondo_landing_input.addEventListener("input", function(event) {
        fondo_landing.value = event.target.value
        landing_page.style.backgroundColor = event.target.value
    })

    fondo_landing.addEventListener('input', function(event) {
        fondo_landing_input.value = this.value
        landing_page.style.backgroundColor = this.value
    })


    // Imagen
    

    document.getElementById('imagen-subir').addEventListener('change', function(event) {
        console.log('das')
        const file = event.target.files[0];
        if (file) {
            const reader2 = new FileReader();
            
            reader2.onload = function(e) {
                const preview2 = document.getElementById('preview-imagen');
                const upload2 = document.getElementById('upload-imagen')
                const imagen_header = document.getElementById('imagen-header')
                const parentElement = preview2.parentNode;
                preview2.src = e.target.result; // Establece la fuente de la imagen
                preview2.style.display = 'block'; // Muestra la imagen
                upload2.classList.add("d-none")
                imagen_header.src = e.target.result;
            };

            reader2.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    // Boton header
    const direccionar_boton_header = document.getElementById("direccionar_boton_header");
    const btn_participar_header = document.getElementById("btn_participar_header");

    direccionar_boton_header.addEventListener('change', function(event) {
        btn_participar_header.setAttribute("href", event.target.value)
    });

    const bold_boton_header = document.getElementById("bold-boton-header")
    const italic_boton_header = document.getElementById("italic-boton-header")
    const titulo_boton_header = document.getElementById("titulo-boton-header")

    bold_boton_header.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_btn_header path')
        if (this.checked) {
            btn_participar_header.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            btn_participar_header.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })
    
    italic_boton_header.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_btn_header path')
        if (this.checked) {
            btn_participar_header.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            btn_participar_header.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    titulo_boton_header.addEventListener('input', function(event) {
        btn_participar_header.innerText = event.target.value
    })

    // tamaño texto boton
    const tamanoBotonHeader1 = document.getElementById("tamanoBotonHeader1")
    const tamanoBotonHeader2 = document.getElementById("tamanoBotonHeader2")
    const tamanoBotonHeader3 = document.getElementById("tamanoBotonHeader3")

    tamanoBotonHeader1.addEventListener("change", function() {
        btn_participar_header.classList.remove('fs-1')
        btn_participar_header.classList.remove('fs-3')
        btn_participar_header.classList.add('fs-6')
    })
    tamanoBotonHeader2.addEventListener("change", function() {
        btn_participar_header.classList.remove('fs-1')
        btn_participar_header.classList.add('fs-3')
        btn_participar_header.classList.remove('fs-6')
    })
    tamanoBotonHeader3.addEventListener("change", function() {
        btn_participar_header.classList.add('fs-1')
        btn_participar_header.classList.remove('fs-3')
        btn_participar_header.classList.remove('fs-6')
    })

    // color
    const color_boton_header_input = document.getElementById('color-boton-header-input')
    const color_boton_header = document.getElementById('color-boton-header')

    color_boton_header_input.addEventListener("input", function(event) {
        color_boton_header.value = event.target.value
        btn_participar_header.style.backgroundColor = event.target.value
    })

    color_boton_header.addEventListener('input', function(event) {
        color_boton_header_input.value = this.value
        btn_participar_header.style.backgroundColor = this.value
    })


</script>
<script>
    const logo_nav = document.getElementById('logo-nav')
    document.getElementById('logo-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-logo');
                const upload = document.getElementById('upload-logo')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                logo_nav.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    // COlor menu
    const color_menu_input = document.getElementById("color-menu-input");
    const color_menu = document.getElementById("color-menu");
    const nav_landing = document.getElementById("nav-landing");

    color_menu_input.addEventListener("input", function(event) {
        color_menu.value = event.target.value
        nav_landing.style.backgroundColor = event.target.value
    })

    color_menu.addEventListener('input', function(event) {
        color_menu_input.value = this.value
        nav_landing.style.backgroundColor = this.value
    })

    // estilo texto
    const bold_menu = document.getElementById('bold-menu')
    const italic_menu = document.getElementById('italic-menu')
    const item_landing_menu = document.querySelectorAll(".item_landing_menu");

    bold_menu.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_menu path')
        if (this.checked) {
            item_landing_menu.forEach(menu => {
                menu.classList.add('fw-bold')
            })
            svg_bold.setAttribute('fill', '#000');
        } else {
            item_landing_menu.forEach(menu => {
                menu.classList.remove('fw-bold')
            })
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_menu.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_menu path')
        if (this.checked) {
            item_landing_menu.forEach(menu => {
                menu.classList.add('fst-italic')
            })
            svg_italic.setAttribute('fill', '#000');
        } else {
            item_landing_menu.forEach(menu => {
                menu.classList.remove('fst-italic')
            })
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    // tamaño navegacion
    const tamanoMenu1 = document.getElementById("tamanoMenu1")
    const tamanoMenu2 = document.getElementById("tamanoMenu2")
    const tamanoMenu3 = document.getElementById("tamanoMenu3")

    tamanoMenu1.addEventListener("change", function() {
        item_landing_menu.forEach(menu => {
            menu.classList.remove('fs-4')
            menu.classList.remove('fs-5')
            menu.classList.add('fs-6')
        })
    })
    tamanoMenu2.addEventListener("change", function() {
        item_landing_menu.forEach(menu => {
            menu.classList.remove('fs-4')
            menu.classList.add('fs-5')
            menu.classList.remove('fs-6')
        })
    })
    tamanoMenu3.addEventListener("change", function() {
        item_landing_menu.forEach(menu => {
            menu.classList.add('fs-4')
            menu.classList.remove('fs-5')
            menu.classList.remove('fs-6')
        })
    })

    // colores
    const color_navegacion_input = document.getElementById("color_navegacion_input");
    const color_navegacion = document.getElementById("color_navegacion");
    let root = document.documentElement;

    color_navegacion_input.addEventListener("input", function(event) {
        color_navegacion.value = event.target.value
        item_landing_menu.forEach(menu => {
            menu.style.color = event.target.value
        })
        
    })

    color_navegacion.addEventListener('input', function(event) {
        color_navegacion_input.value = this.value
        item_landing_menu.forEach(menu => {
            menu.style.color = this.value
        })
    })

    const color_navegacion_input_hover = document.getElementById("color_navegacion_input_hover");
    const color_navegacion_hover = document.getElementById("color_navegacion_hover");


    color_navegacion_input_hover.addEventListener("input", function(event) {
        color_navegacion_hover.value = event.target.value
        root.style.setProperty('--color-active-nav', `${event.target.value}`)
    })

    color_navegacion_hover.addEventListener('input', function(event) {
        color_navegacion_input_hover.value = this.value
        root.style.setProperty('--color-active-nav', `${this.value}`)
    })

    // Navegacion
    const navegacion_1 = document.getElementById("navegacion_1");
    const navegacion_2 = document.getElementById("navegacion_2");
    const navegacion_3 = document.getElementById("navegacion_3");
    const navegacion_4 = document.getElementById("navegacion_4");

    navegacion_1.addEventListener("input", function(event) {
        const item = document.querySelector(".navegacion_1_menu")
        item.innerHTML = event.target.value
    })

    navegacion_2.addEventListener("input", function(event) {
        const item = document.querySelector(".navegacion_2_menu")
        item.innerHTML = event.target.value
    })

    navegacion_3.addEventListener("input", function(event) {
        const item = document.querySelector(".navegacion_3_menu")
        item.innerHTML = event.target.value
    })

    navegacion_4.addEventListener("input", function(event) {
        const item = document.querySelector(".navegacion_4_menu")
        item.innerHTML = event.target.value
    })

    //direccionar
    const direccionar_1 = document.getElementById("direccionar_1");
    const direccionar_2 = document.getElementById("direccionar_2");
    const direccionar_3 = document.getElementById("direccionar_3");
    const direccionar_4 = document.getElementById("direccionar_4");

    direccionar_1.addEventListener('change', function(event) {
        const item = document.getElementById("navegacion_1_menu")
        item.setAttribute("href", event.target.value)
    });

    direccionar_2.addEventListener('change', function(event) {
        const item = document.getElementById("navegacion_2_menu")
        item.setAttribute("href", event.target.value)
    });

    direccionar_3.addEventListener('change', function(event) {
        const item = document.getElementById("navegacion_3_menu")
        item.setAttribute("href", event.target.value)
    });

    direccionar_4.addEventListener('change', function(event) {
        const item = document.getElementById("navegacion_4_menu")
        item.setAttribute("href", event.target.value)
    });
</script>
<script>
    
    // COlor borde
    const border_input_como = document.getElementById("border-input-como");
    const border_como = document.getElementById("border-como");
    const section_como = document.querySelector("#participar section");

    border_input_como.addEventListener("input", function(event) {
        border_como.value = event.target.value
        section_como.style.borderColor = event.target.value
    })

    border_como.addEventListener('input', function(event) {
        border_input_como.value = this.value
        section_como.style.borderColor = this.value
    })

    // estilo texto
    const bold_titulo_como = document.getElementById('bold-titulo-como')
    const italic_titulo_como = document.getElementById('italic-titulo-como')
    const title_como = document.getElementById("title_como");

    bold_titulo_como.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_como path')
        if (this.checked) {
            title_como.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            title_como.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_titulo_como.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_como path')
        if (this.checked) {
            title_como.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            title_como.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    const input_titulo_como = document.getElementById('input-titulo-como')

    input_titulo_como.addEventListener('input' , function(event) {
        title_como.innerHTML = event.target.value
    })

    // tamaño titulo
    const tamanoTituloComo1 = document.getElementById("tamanoTituloComo1")
    const tamanoTituloComo2 = document.getElementById("tamanoTituloComo2")
    const tamanoTituloComo3 = document.getElementById("tamanoTituloComo3")

    tamanoTituloComo1.addEventListener("change", function() {
        title_como.classList.remove('fs-1')
        title_como.classList.remove('fs-3')
        title_como.classList.add('fs-6')
    })
    tamanoTituloComo2.addEventListener("change", function() {
        title_como.classList.remove('fs-1')
        title_como.classList.add('fs-3')
        title_como.classList.remove('fs-6')
    })
    tamanoTituloComo3.addEventListener("change", function() {
        title_como.classList.add('fs-1')
        title_como.classList.remove('fs-3')
        title_como.classList.remove('fs-6')
    })

    const color_titulo_input_como = document.getElementById("color-titulo-input-como");
    const color_titulo_como = document.getElementById("color-titulo-como");

    color_titulo_input_como.addEventListener("input", function(event) {
        color_titulo_como.value = event.target.value
        title_como.style.color = event.target.value
    })

    color_titulo_como.addEventListener('input', function(event) {
        color_titulo_input_como.value = this.value
        title_como.style.color = this.value
    })

    // Logos
    
    const item_participar_1 = document.getElementById('item_participar_1')
    document.getElementById('participar_1').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview_participar_1');
                const upload = document.getElementById('upload-participar-1')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                item_participar_1.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });
    
    const item_participar_2 = document.getElementById('item_participar_2')
    document.getElementById('participar_2').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview_participar_2');
                const upload = document.getElementById('upload-participar-2')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                item_participar_2.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });
    
    const item_participar_3 = document.getElementById('item_participar_3')
    document.getElementById('participar_3').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview_participar_3');
                const upload = document.getElementById('upload-participar-3')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                item_participar_3.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });


    // boton
    // estilo texto
    const bold_boton_como = document.getElementById('bold-boton-como')
    const italic_boton_como = document.getElementById('italic-boton-como')
    const btn_como = document.getElementById("btn-como");

    bold_boton_como.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_como_btn path')
        if (this.checked) {
            btn_como.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            btn_como.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_boton_como.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_como_btn path')
        if (this.checked) {
            btn_como.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            btn_como.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    const input_boton_como = document.getElementById("input-boton-como")

    input_boton_como.addEventListener('input' , function(event) {
        btn_como.innerHTML = event.target.value
    })

    // tamaño titulo
    const tamanoBotonComo1 = document.getElementById("tamanoBotonComo1")
    const tamanoBotonComo2 = document.getElementById("tamanoBotonComo2")
    const tamanoBotonComo3 = document.getElementById("tamanoBotonComo3")

    tamanoBotonComo1.addEventListener("change", function() {
        btn_como.classList.remove('fs-1')
        btn_como.classList.remove('fs-3')
        btn_como.classList.add('fs-6')
    })
    tamanoBotonComo2.addEventListener("change", function() {
        btn_como.classList.remove('fs-1')
        btn_como.classList.add('fs-3')
        btn_como.classList.remove('fs-6')
    })
    tamanoBotonComo3.addEventListener("change", function() {
        btn_como.classList.add('fs-1')
        btn_como.classList.remove('fs-3')
        btn_como.classList.remove('fs-6')
    })

    const color_boton_input_como = document.getElementById("color-boton-input-como");
    const color_boton_como = document.getElementById("color-boton-como");

    color_boton_input_como.addEventListener("input", function(event) {
        color_boton_como.value = event.target.value
        btn_como.style.backgroundColor = event.target.value
    })

    color_boton_como.addEventListener('input', function(event) {
        color_boton_input_como.value = this.value
        btn_como.style.backgroundColor = this.value
    })
    
</script>
<script>
    
    // COlor borde
    const border_input_formulario = document.getElementById("border-input-formulario");
    const border_formulario = document.getElementById("border-formulario");
    const section_formulario = document.querySelector("#formulario-participar section");

    border_input_formulario.addEventListener("input", function(event) {
        border_formulario.value = event.target.value
        section_formulario.style.borderColor = event.target.value
    })

    border_formulario.addEventListener('input', function(event) {
        border_input_formulario.value = this.value
        section_formulario.style.borderColor = this.value
    })

    // estilo texto
    const bold_titulo_formulario = document.getElementById('bold-titulo-formulario')
    const italic_titulo_formulario = document.getElementById('italic-titulo-formulario')
    const title_formulario_participar = document.getElementById("title_formulario_participar");

    bold_titulo_formulario.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_formulario path')
        if (this.checked) {
            title_formulario_participar.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            title_formulario_participar.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_titulo_formulario.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_formulariio path')
        if (this.checked) {
            title_formulario_participar.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            title_formulario_participar.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    const input_formulario = document.getElementById('input-titulo-formulario')

    input_formulario.addEventListener('input' , function(event) {
        title_formulario_participar.innerHTML = event.target.value
    })


    // tamaño titulo
    const tamanoTituloFormulario1 = document.getElementById("tamanoTituloFormulario1")
    const tamanoTituloFormulario2 = document.getElementById("tamanoTituloFormulario2")
    const tamanoTituloFormulario3 = document.getElementById("tamanoTituloFormulario3")

    tamanoTituloFormulario1.addEventListener("change", function() {
        title_formulario_participar.classList.remove('fs-1')
        title_formulario_participar.classList.remove('fs-3')
        title_formulario_participar.classList.add('fs-6')
    })
    tamanoTituloFormulario2.addEventListener("change", function() {
        title_formulario_participar.classList.remove('fs-1')
        title_formulario_participar.classList.add('fs-3')
        title_formulario_participar.classList.remove('fs-6')
    })
    tamanoTituloFormulario3.addEventListener("change", function() {
        title_formulario_participar.classList.add('fs-1')
        title_formulario_participar.classList.remove('fs-3')
        title_formulario_participar.classList.remove('fs-6')
    })

    const color_titulo_input_formulario = document.getElementById("color-titulo-input-formulario");
    const color_titulo_formulario = document.getElementById("color-titulo-formulario");

    color_titulo_input_formulario.addEventListener("input", function(event) {
        color_titulo_formulario.value = event.target.value
        title_formulario_participar.style.color = event.target.value
    })

    color_titulo_formulario.addEventListener('input', function(event) {
        color_titulo_input_formulario.value = this.value
        title_formulario_participar.style.color = this.value
    })


    const color_label_input_formulario = document.getElementById("color-label-input-formulario");
    const color_label_formulario = document.getElementById("color-label-formulario");
    const label_formulario = document.querySelectorAll(".label_form")

    color_label_input_formulario.addEventListener("input", function(event) {
        color_label_formulario.value = event.target.value
        label_formulario.forEach(label => {
            label.style.color = event.target.value
        })
    })

    color_label_formulario.addEventListener('input', function(event) {
        color_label_input_formulario.value = this.value
        label_formulario.forEach(label => {
            label.style.color = this.value
        })
    })

    //BOTON

    const bold_boton_formulario = document.getElementById('bold-boton-formulario')
    const italic_boton_formulario = document.getElementById('italic-boton-formulario')
    const btn_formulario = document.getElementById("btn-formulario");

    bold_boton_formulario.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_formulario_btn path')
        if (this.checked) {
            btn_formulario.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            btn_formulario.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_boton_formulario.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_formulariio_btn path')
        if (this.checked) {
            btn_formulario.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            btn_formulario.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    const input_boton_formulario = document.getElementById('input-boton-formulario')

    input_boton_formulario.addEventListener('input' , function(event) {
        btn_formulario.innerHTML = event.target.value
    })
    
    // tamaño titulo
    const tamanoBotonFormulario1 = document.getElementById("tamanoBotonFormulario1")
    const tamanoBotonFormulario2 = document.getElementById("tamanoBotonFormulario2")
    const tamanoBotonFormulario3 = document.getElementById("tamanoBotonFormulario3")

    tamanoBotonFormulario1.addEventListener("change", function() {
        btn_formulario.classList.remove('fs-1')
        btn_formulario.classList.remove('fs-3')
        btn_formulario.classList.add('fs-6')
    })
    tamanoBotonFormulario2.addEventListener("change", function() {
        btn_formulario.classList.remove('fs-1')
        btn_formulario.classList.add('fs-3')
        btn_formulario.classList.remove('fs-6')
    })
    tamanoBotonFormulario3.addEventListener("change", function() {
        btn_formulario.classList.add('fs-1')
        btn_formulario.classList.remove('fs-3')
        btn_formulario.classList.remove('fs-6')
    })

    const color_boton_input_formulario = document.getElementById("color-boton-input-formulario");
    const color_boton_formulario = document.getElementById("color-boton-formulario");

    color_boton_input_formulario.addEventListener("input", function(event) {
        color_boton_formulario.value = event.target.value
        btn_formulario.style.backgroundColor = event.target.value
    })

    color_boton_formulario.addEventListener('input', function(event) {
        color_boton_input_formulario.value = this.value
        btn_formulario.style.backgroundColor = this.value
    })
</script>
<script>
    
    // COlor borde
    const border_input_ganador = document.getElementById("border-input-ganador");
    const border_ganador = document.getElementById("border-ganador");
    const section_ganadores = document.querySelector("#ganadores section");

    border_input_ganador.addEventListener("input", function(event) {
        border_ganador.value = event.target.value
        section_ganadores.style.borderColor = event.target.value
    })

    border_ganador.addEventListener('input', function(event) {
        border_input_ganador.value = this.value
        section_ganadores.style.borderColor = this.value
    })

    // estilo texto
    const bold_titulo_ganador = document.getElementById('bold-titulo-ganador')
    const italic_titulo_ganador = document.getElementById('italic-titulo-ganador')
    const ganador_title = document.getElementById("ganador-title");

    bold_titulo_ganador.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_formulario path')
        if (this.checked) {
            ganador_title.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            ganador_title.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_titulo_ganador.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_formulariio path')
        if (this.checked) {
            ganador_title.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            ganador_title.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    const input_ganador = document.getElementById('input-titulo-ganador')

    input_ganador.addEventListener('input' , function(event) {
        ganador_title.innerHTML = event.target.value
    })


    // tamaño titulo
    const tamanoTituloGanador1 = document.getElementById("tamanoTituloGanador1")
    const tamanoTituloGanador2 = document.getElementById("tamanoTituloGanador2")
    const tamanoTituloGanador3 = document.getElementById("tamanoTituloGanador3")

    tamanoTituloGanador1.addEventListener("change", function() {
        ganador_title.classList.remove('fs-1')
        ganador_title.classList.remove('fs-3')
        ganador_title.classList.add('fs-6')
    })
    tamanoTituloGanador2.addEventListener("change", function() {
        ganador_title.classList.remove('fs-1')
        ganador_title.classList.add('fs-3')
        ganador_title.classList.remove('fs-6')
    })
    tamanoTituloGanador3.addEventListener("change", function() {
        ganador_title.classList.add('fs-1')
        ganador_title.classList.remove('fs-3')
        ganador_title.classList.remove('fs-6')
    })

    const color_titulo_input_ganador = document.getElementById("color-titulo-input-ganador");
    const color_titulo_ganador = document.getElementById("color-titulo-ganador");

    color_titulo_input_ganador.addEventListener("input", function(event) {
        color_titulo_ganador.value = event.target.value
        ganador_title.style.color = event.target.value
    })

    color_titulo_ganador.addEventListener('input', function(event) {
        color_titulo_input_ganador.value = this.value
        ganador_title.style.color = this.value
    })


    const color_lista_input_ganador = document.getElementById("color-lista-input-ganador");
    const color_lista_ganador = document.getElementById("color-lista-ganador");
    const lista_ganador = document.getElementById("lista_ganador");

    color_lista_input_ganador.addEventListener("input", function(event) {
        color_lista_ganador.value = event.target.value
        lista_ganador.style.color = event.target.value
    })

    color_lista_ganador.addEventListener('input', function(event) {
        color_titulo_input_ganador.value = this.value
        lista_ganador.style.color = this.value
    })

</script>
<script>
    
    // COlor borde
    const border_input_pregunta = document.getElementById("border-input-pregunta");
    const accordionButton = document.querySelector('.accordion-button:not(.collapsed)');
    const border_pregunta = document.getElementById("border-pregunta");
    const section_pregunta = document.querySelector("#preguntas-frecuentes section");

    border_input_pregunta.addEventListener("input", function(event) {
        border_pregunta.value = event.target.value
        section_pregunta.style.borderColor = event.target.value
        accordionButton.style.boxShadow = `inset 0 calc(-1 * 1px) 0 ${event.target.value}`
    })

    border_pregunta.addEventListener('input', function(event) {
        border_input_pregunta.value = this.value
        section_pregunta.style.borderColor = this.value
        accordionButton.style.boxShadow = `inset 0 calc(-1 * 1px) 0 ${event.target.value}`
    })

    // estilo texto
    const bold_titulo_pregunta = document.getElementById('bold-titulo-pregunta')
    const italic_titulo_pregunta = document.getElementById('italic-titulo-pregunta')
    const pregunta_title = document.getElementById("pregunta-title");

    bold_titulo_pregunta.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_pregunta path')
        if (this.checked) {
            pregunta_title.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            pregunta_title.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_titulo_pregunta.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_pregunta path')
        if (this.checked) {
            pregunta_title.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            pregunta_title.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    const input_pregunta = document.getElementById('input-titulo-pregunta')

    input_pregunta.addEventListener('input' , function(event) {
        pregunta_title.innerHTML = event.target.value
    })


    // tamaño titulo
    const tamanoTituloPregunta1 = document.getElementById("tamanoTituloPregunta1")
    const tamanoTituloPregunta2 = document.getElementById("tamanoTituloPregunta2")
    const tamanoTituloPregunta3 = document.getElementById("tamanoTituloPregunta3")

    tamanoTituloPregunta1.addEventListener("change", function() {
        pregunta_title.classList.remove('fs-1')
        pregunta_title.classList.remove('fs-3')
        pregunta_title.classList.add('fs-6')
    })
    tamanoTituloPregunta2.addEventListener("change", function() {
        pregunta_title.classList.remove('fs-1')
        pregunta_title.classList.add('fs-3')
        pregunta_title.classList.remove('fs-6')
    })
    tamanoTituloPregunta3.addEventListener("change", function() {
        pregunta_title.classList.add('fs-1')
        pregunta_title.classList.remove('fs-3')
        pregunta_title.classList.remove('fs-6')
    })

    const color_titulo_input_pregunta = document.getElementById("color-titulo-input-pregunta");
    const color_titulo_pregunta = document.getElementById("color-titulo-pregunta");

    color_titulo_input_pregunta.addEventListener("input", function(event) {
        color_titulo_pregunta.value = event.target.value
        pregunta_title.style.color = event.target.value
    })

    color_titulo_pregunta.addEventListener('input', function(event) {
        color_titulo_input_pregunta.value = this.value
        pregunta_title.style.color = this.value
    })

    // lista

    const color_text_input_pregunta = document.getElementById("color-text-input-pregunta");
    const color_text_pregunta = document.getElementById("color-text-pregunta");
    const accordion = document.querySelectorAll('.accordion-button')
    const accordion_body = document.querySelectorAll('.accordion-body')

    color_text_input_pregunta.addEventListener("input", function(event) {
        color_text_pregunta.value = event.target.value
        accordion.forEach(a => {
            a.style.color = event.target.value
        })
        accordion_body.forEach(a => {
            a.style.color = event.target.value
        })
    })

    color_text_pregunta.addEventListener('input', function(event) {
        color_text_input_pregunta.value = this.value
        accordion.forEach(a => {
            a.style.color = this.value
        })
        accordion_body.forEach(a => {
            a.style.color = this.value
        })
    })

    const color_borde_input_pregunta = document.getElementById("color-borde-input-pregunta");
    const color_borde_pregunta = document.getElementById("color-borde-pregunta");
    const accordion_item = document.querySelectorAll('.accordion-item')

    color_borde_input_pregunta.addEventListener("input", function(event) {
        color_borde_pregunta.value = event.target.value
        accordion_item.forEach(a => {
            a.style.borderColor = event.target.value
        })
    })

    color_borde_pregunta.addEventListener('input', function(event) {
        color_borde_input_pregunta.value = this.value
        accordion_item.forEach(a => {
            a.style.borderColor = this.value
        })
    })

    // pregunta 1
    const pregunta1 = document.getElementById("pregunta1");
    const respuesta1 = document.getElementById("respuesta1");
    const pregunta_1_landing = document.getElementById("pregunta-1-landing");
    const respuesta_1_landing = document.getElementById("respuesta-1-landing");

    pregunta1.addEventListener('input', function(e) {
        console.log(e.target.value)
        pregunta_1_landing.textContent = e.target.value
    })
    respuesta1.addEventListener('input', function(e) {
        respuesta_1_landing.textContent = e.target.value
    })

    // pregunta 2
    const pregunta2 = document.getElementById("pregunta2");
    const respuesta2 = document.getElementById("respuesta2");
    const pregunta_2_landing = document.getElementById("pregunta-2-landing");
    const respuesta_2_landing = document.getElementById("respuesta-2-landing");

    pregunta2.addEventListener('input', function(e) {
        pregunta_2_landing.textContent = e.target.value
    })
    respuesta2.addEventListener('input', function(e) {
        respuesta_2_landing.textContent = e.target.value
    })

    // pregunta 3
    const pregunta3 = document.getElementById("pregunta3");
    const respuesta3 = document.getElementById("respuesta3");
    const pregunta_3_landing = document.getElementById("pregunta-3-landing");
    const respuesta_3_landing = document.getElementById("respuesta-3-landing");

    pregunta3.addEventListener('input', function(e) {
        pregunta_3_landing.textContent = e.target.value
    })
    respuesta3.addEventListener('input', function(e) {
        respuesta_3_landing.textContent = e.target.value
    })

    // pregunta 4
    const pregunta4 = document.getElementById("pregunta4");
    const respuesta4 = document.getElementById("respuesta4");
    const pregunta_4_landing = document.getElementById("pregunta-4-landing");
    const respuesta_4_landing = document.getElementById("respuesta-4-landing");

    pregunta4.addEventListener('input', function(e) {
        pregunta_4_landing.textContent = e.target.value
    })
    respuesta4.addEventListener('input', function(e) {
        respuesta_4_landing.textContent = e.target.value
    })


</script>
<script>
    // estilo texto
    const bold_titulo_redes = document.getElementById('bold-titulo-redes')
    const italic_titulo_redes = document.getElementById('italic-titulo-redes')
    const redes_title = document.getElementById("redes-title");

    bold_titulo_redes.addEventListener('change', function(event) {
        const svg_bold = document.querySelector('#svg_bold_redes path')
        if (this.checked) {
            redes_title.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            redes_title.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_titulo_redes.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_redes path')
        if (this.checked) {
            redes_title.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            redes_title.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    const input_redes = document.getElementById('input-titulo-redes')

    input_redes.addEventListener('input' , function(event) {
        redes_title.innerHTML = event.target.value
    })


    // tamaño titulo
    const tamanoTituloRedes1 = document.getElementById("tamanoTituloRedes1")
    const tamanoTituloRedes2 = document.getElementById("tamanoTituloRedes2")
    const tamanoTituloRedes3 = document.getElementById("tamanoTituloRedes3")

    tamanoTituloRedes1.addEventListener("change", function() {
        redes_title.classList.remove('fs-1')
        redes_title.classList.remove('fs-3')
        redes_title.classList.add('fs-6')
    })
    tamanoTituloRedes2.addEventListener("change", function() {
        redes_title.classList.remove('fs-1')
        redes_title.classList.add('fs-3')
        redes_title.classList.remove('fs-6')
    })
    tamanoTituloRedes3.addEventListener("change", function() {
        redes_title.classList.add('fs-1')
        redes_title.classList.remove('fs-3')
        redes_title.classList.remove('fs-6')
    })

    const color_titulo_input_redes = document.getElementById("color-titulo-input-redes");
    const color_titulo_redes = document.getElementById("color-titulo-redes");

    color_titulo_input_redes.addEventListener("input", function(event) {
        color_titulo_redes.value = event.target.value
        redes_title.style.color = event.target.value
    })

    color_titulo_redes.addEventListener('input', function(event) {
        color_titulo_input_redes.value = this.value
        redes_title.style.color = this.value
    })
</script>
@endsection

@section('script_jquery')
<script src="{{ asset('backend/js/admin/landing.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>

<script>

    $(document).ready(function() {
        var arrayRedes = {!! json_encode($redes_sociales_array) !!};
        var dataRedes = {
            "id": '',
            "name": '',
            'enlace': ''
        }

        $("#color-icon-input-redes").on('input', function (e) { 
            e.preventDefault();
            colorRedes($("#color-icon-input-redes").val())
        });
        
        $("#color-icon-redes").on('input', function (e) { 
            e.preventDefault();
            colorRedes($("#color-icon-redes").val())
        });

        function colorRedes (valor) {  
            var redes_icon = document.querySelectorAll(".redes_icon");
            redes_icon.forEach(a => {
                a.style.color = valor
            })
        }

        $("#add_redes").click(function (e) { 
            e.preventDefault();
            
            const data = {...dataRedes};
            data.id = uuid.v4();
            arrayRedes.push(data);

            addRedes(arrayRedes);
            addRedesLanding()
        });

        function addRedesLanding() {

            var html = ``;

            if(arrayRedes) {
            arrayRedes.forEach(a => {
                html += `
                    <a href="${a.enlace}">
                        <i class="fab fa-${a.name} redes_icon" style="font-size: 3.2rem;color: {{ $color_icon_redes }};"></i>
                    </a>
                `;
            })
            }

            $("#landing_redes").html(html)
        }
        
        function addRedes(array) {
            var html = ``;

            array.forEach( (a, index) => {
                html += `
                <div class="d-flex flex-wrap pt-1 border-top" role="group">
                    <input type="hidden" class="redes_id" value="${a.id}" />
                    <div class="w-100">
                        <label for="redes_select" class="form-label">Red ${index + 1}</label>
                        <select name="redes_select" id="redes_select" class="form-select redes_select">
                            <option value="">Seleccione</option>
                            <option value="facebook" ${ a.name == 'facebook' ? 'selected' : ''}>Facebook</option>
                            <option value="instagram" ${ a.name == 'instagram' ? 'selected' : ''}>Instagram</option>
                            <option value="linkedin" ${ a.name == 'linkedin' ? 'selected' : ''}>Linkedin</option>
                            <option value="twitter" ${ a.name == 'twitter' ? 'selected' : ''}>Twitter</option>
                            <option value="gmail" ${ a.name == 'gmail' ? 'selected' : ''}>Gmail</option>
                            <option value="youtube" ${ a.name == 'youtube' ? 'selected' : ''}>YouTube</option>
                            <option value="tiktok" ${ a.name == 'tiktok' ? 'selected' : ''}>TikTok</option>
                        </select>
                    </div>
                    <div class="w-100">
                        <label for="enlace_select" class="form-label">Enlace ${index + 1}</label>
                        <input type="text" name="enlace_select" id="enlace_select" class="form-control enlace_select" value="${a.enlace}">
                    </div>
                    <button type="button" class="btn btn-alicorp my-2 btn_borrar_red">Borrar</button>
                </div>
                `;
            })

            $("#content_redes").html(html);
        }

        $(document).on('click','.btn_borrar_red', function () {
            var id = $(this).parent().find('.redes_id').val();

            arrayRedes = arrayRedes.filter(a => a.id != id);

            addRedes(arrayRedes);
            addRedesLanding()
        });

        $(document).on('change','.redes_select', function () {
            var id = $(this).parent().parent().find('.redes_id').val();
            var valor = $(this).val();

            arrayRedes.find(a => a.id == id).name = valor;
            addRedesLanding()
        });

        $(document).on('change','.enlace_select', function () {
            var id = $(this).parent().parent().find('.redes_id').val();
            var valor = $(this).val();

            arrayRedes.find(a => a.id == id).enlace = valor;
            addRedesLanding()
        });

        addRedesLanding()
        addRedes(arrayRedes);
        
        $("#guardar-landing").on("click", function() {
            $("#form-landing").submit();
        })

        $('#form-landing').on('submit', function(event) {
            event.preventDefault(); 

            var formData = new FormData(this);
            formData.append('redes_sociales', JSON.stringify(arrayRedes))
            
            // // Mostrar los datos en la consola (opcional)
            // for (const [key, value] of formData.entries()) {
            //     console.log(`${key}: ${value}`);
            // }
            $.ajax({
                url: $(this).attr('action'), // URL de la ruta
                method: 'POST',
                data: formData,
                contentType: false, // Para enviar los datos como FormData
                processData: false, // No procesar los datos
                success: function(data) {
                    // Procesar los datos devueltos
                    // toastr.success(data.message); 
                    if (data) {
                        if (data.encabezado.logo_subir) {
                            $("#logo-nav").attr('src', `/storage/${data.encabezado.logo_subir}`);
                        }
                        if (data.pagina_principal.banner_subir) {
                            $("#header").css('background-image', `url(/storage/${data.pagina_principal.banner_subir})`);
                        }
                        if (data.pagina_principal["imagen-subir"]) {
                            $("#imagen-header").attr('src', `/storage/${data.pagina_principal["imagen-subir"]}`);
                        }
                        if (data.como_participar.participar_1) {
                            $("#item_participar_1").attr('src', `/storage/${data.como_participar.participar_1}`);
                        }
                        if (data.como_participar.participar_2) {
                            $("#item_participar_2").attr('src', `/storage/${data.como_participar.participar_2}`);
                        }
                        if (data.como_participar.participar_3) {
                            $("#item_participar_3").attr('src', `/storage/${data.como_participar.participar_3}`);
                        }
                    }

                    // $("#form_html").submit();
                    Swal.fire({
                        icon: 'success',
                        title: 'Cambios guardados'
                    })
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                    Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                })
                }
            });
        });

        $("#form_html").on("submit", function(event) {
            event.preventDefault(); 
            const html = $('#landing_page').html();

            // Ajax para actualizar data
            var formData2 = new FormData(this);
            formData2.append('html', html)
                    
            $.ajax({
                url: $(this).attr('action'), // URL de la ruta
                method: 'POST',
                data: formData2,
                contentType: false, // Para enviar los datos como FormData
                processData: false, // No procesar los datos
                success: function(data) {
                    // Procesar los datos devueltos
                    toastr.success('Cambios guadados correctamente'); 
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                    Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                })
                }
            });
        })
    });
</script>
<script>
    $(document).ready(function () {
        ///
        $("#collapseOneNav").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOneNav").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOneNav").show("fast");
            }
        })
        $("#collapseTwoNav").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoNav").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoNav").show("fast");
            }
        })
        $("#collapseThreeNav").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreeNav").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreeNav").show("fast");
            }
        })
        //
        $("#collapseOneHeader").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOneHeader").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOneHeader").show("fast");
            }
        })
        $("#collapseTwoHeader").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoHeader").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoHeader").show("fast");
            }
        })
        $("#collapseThreeHeader").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreeHeader").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreeHeader").show("fast");
            }
        })
        $("#collapseFourHeader").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseFourHeader").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseFourHeader").show("fast");
            }
        })
        $("#collapseFiveHeader").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseFiveHeader").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseFiveHeader").show("fast");
            }
        })
        //
        
        $("#collapseOneNav1").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOneNav1").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOneNav1").show("fast");
            }
        })
        
        $("#collapseTwoComo").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoComo").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoComo").show("fast");
            }
        })
        
        $("#collapseThreeComo").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreeComo").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreeComo").show("fast");
            }
        })
        
        $("#collapseFourComo").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseFourComo").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseFourComo").show("fast");
            }
        })

        ///
        //
        
        $("#collapseOneFormulario").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOneFormulario").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOneFormulario").show("fast");
            }
        })
        
        $("#collapseTwoFormulario").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoFormulario").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoFormulario").show("fast");
            }
        })
        
        $("#collapseThreeFormulario").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreeFormulario").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreeFormulario").show("fast");
            }
        })
        
        $("#collapseFourFormulario").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseFourFormulario").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseFourFormulario").show("fast");
            }
        })
        //
        
        $("#collapseOneGanador").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOneGanador").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOneGanador").show("fast");
            }
        })
        
        $("#collapseTwoGanador").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoGanador").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoGanador").show("fast");
            }
        })
        
        $("#collapseThreeGanador").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreeGanador").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreeGanador").show("fast");
            }
        })
        //
        
        $("#collapseOnePregunta").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOnePregunta").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOnePregunta").show("fast");
            }
        })
        
        $("#collapseTwoPregunta").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoPregunta").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoPregunta").show("fast");
            }
        })
        
        $("#collapseThreePregunta").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreePregunta").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreePregunta").show("fast");
            }
        })
        //
        
        $("#collapseOneRedees").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOneRedees").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOneRedees").show("fast");
            }
        })
        
        $("#collapseTwoRedees").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoRedees").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoRedees").show("fast");
            }
        })

    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click','.btn-delete-img', function () {
            const valor = $(this).parent().find('input[type="hidden"]');
            const valorImg = $(this).parent().find('.img-fluid');
            const upload_img = $(this).parent().find('.upload_img');
            const valor_file = $(this).parent().find('input[type="file"]');
            const valor_id = $(this).parent().find('.data_value').val();
            Swal.fire({
                icon: 'question',
                title: '¿Seguro de eliminar la imagen?',
                showConfirmButton: true,
                showCancelButton: true
            }).then((swal) => {
                if (swal.isConfirmed) {
                    valor.val("");
                    valorImg.attr('src', '')
                    upload_img.removeClass('d-none')
                    valor_file.val(null)
                    if (valor_id == 'header') {
                        $(`#${valor_id}`).css('background-image', 'url("{{ $imgNulo }}")');
                    } else {
                        $(`#${valor_id}`).attr('src', '{{ $imgNulo }}');
                    }
                }
            })
        });
        $("#back_configuracion").click(function (e) { 
            e.preventDefault();
            window.location.href = '{{ $rutaCon }}'
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.item_landing_menu', function () {
            $(".item_landing_menu").removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endsection