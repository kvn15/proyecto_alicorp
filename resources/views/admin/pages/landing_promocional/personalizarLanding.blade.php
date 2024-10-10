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
</style>
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
                <span>Personalizar</span>
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
        <div  class="d-none" id="encabezado">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_encabezado"><i class="fas fa-chevron-left"></i> Encabezado</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneNav" aria-expanded="true" aria-controls="collapseOneNav">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Encabezado</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse show" id="collapseOneNav" data-bs-parent="#accordionExample">
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
                            <input type="text" class="form-control" id="color-menu-input" name="color-menu-input" value="#000000">
                            <input type="color" class="form-control form-control-color p-0" name="color-menu" id="color-menu" value="#000000">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoNav" aria-expanded="true" aria-controls="collapseTwoNav">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg seccion"> <small>Logo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseTwoNav" data-bs-parent="#accordionExample">
                    <li>
                        <p class="mb-1">Imagen Logo</p>
                        <div class="img-subir">
                            <label for="logo-subir">
                                <div class="cursor">
                                    <div id="upload-logo">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1,000x1,000px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview-logo">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="logo-subir" id="logo-subir">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeNav" aria-expanded="true" aria-controls="collapseThreeNav">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Titulos de navegación</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseThreeNav" data-bs-parent="#accordionExample">
                    <li>
                        <p class="mb-1">Configuración Navegación</p>
                        <div class="d-flex justify-content-start my-2" style="gap: 1.2em;">
                            <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                                <div class="p-1 cursor bold">
                                    <input hidden type="checkbox" name="bold-menu" id="bold-menu" value="1">
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
                                    <input hidden type="checkbox" name="italic-menu" id="italic-menu" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="btn-group mb-2" role="group">
                            <input type="radio" class="btn-check" name="tamanoMenu" id="tamanoMenu1" autocomplete="off" checked value="1">
                            <label class="btn btn-outline-text" for="tamanoMenu1"><small><b>Chico</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoMenu" id="tamanoMenu2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoMenu2"><small><b>Mediano</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoMenu" id="tamanoMenu3" autocomplete="off" value="3">
                            <label class="btn btn-outline-text" for="tamanoMenu3"><small><b>Grande</b></small></label>
                        </div>
                        
                        <p class="my-1">Color Navegación</p>
                        <div class="d-flex my-2" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color_navegacion_input" name="color_navegacion_input" value="#FFFFFF">
                            <input type="color" class="form-control form-control-color p-0" name="color_navegacion" id="color_navegacion" value="#FFFFFF">
                        </div>
                        
                        <p class="my-1">Color Navegación Activo</p>
                        <div class="d-flex my-2" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color_navegacion_input_hover" name="color_navegacion_input_hover" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="color_navegacion_hover" id="color_navegacion_hover" value="#fbbb01">
                        </div>
                    </li>



                    <li class="my-2">
                        <p class="my-2"><b>Navegación 1</b></p>
                        <p class="my-1">Texto</p>
                        <input type="text" class="form-control p-2" name="navegacion_1" id="navegacion_1" value="¿CÓMO PARTICIPAR?">
                        <p class="my-1">Direccionar</p>
                        <select class="form-select" name="direccionar_1" id="direccionar_1">
                            <option value="#participar" selected>Como Participar</option>
                            <option value="#formulario-participar">Formulario Participar</option>
                            <option value="#ganadores">Ganadores</option>
                            <option value="#preguntas-frecuentes">Preguntas Frecuentes</option>
                            <option value="">Términos y condiciones</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <p class="my-2"><b>Navegación 2</b></p>
                        <input type="text" class="form-control p-2" name="navegacion_2" id="navegacion_2" value="PREGUNTAS FRECUENTES">
                        <p class="my-1">Direccionar</p>
                        <select class="form-select" name="direccionar_2" id="direccionar_2">
                            <option value="#participar">Como Participar</option>
                            <option value="#formulario-participar">Formulario Participar</option>
                            <option value="#ganadores">Ganadores</option>
                            <option value="#preguntas-frecuentes" selected>Preguntas Frecuentes</option>
                            <option value="">Términos y condiciones</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <p class="my-2"><b>Navegación 3</b></p>
                        <input type="text" class="form-control p-2" name="navegacion_3" id="navegacion_3" value="TÉRMINOS Y CONDICIONES">
                        <p class="my-1">Direccionar</p>
                        <select class="form-select" name="direccionar_3" id="direccionar_3">
                            <option value="#participar">Como Participar</option>
                            <option value="#formulario-participar">Formulario Participar</option>
                            <option value="#ganadores">Ganadores</option>
                            <option value="#preguntas-frecuentes">Preguntas Frecuentes</option>
                            <option value="#terminos_condiciones" selected>Términos y condiciones</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <p class="my-2"><b>Navegación 4</b></p>
                        <input type="text" class="form-control p-2" name="navegacion_4" id="navegacion_4" value="VER GANADORES">
                        <p class="my-1">Direccionar</p>
                        <select class="form-select" name="direccionar_4" id="direccionar_4">
                            <option value="#participar">Como Participar</option>
                            <option value="#formulario-participar">Formulario Participar</option>
                            <option value="#ganadores" selected>Ganadores</option>
                            <option value="#preguntas-frecuentes">Preguntas Frecuentes</option>
                            <option value="">Términos y condiciones</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-none" id="pagina_principal">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_principal"><i class="fas fa-chevron-left"></i> Pagina Principal</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneHeader" aria-expanded="true" aria-controls="collapseOneHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Pagina principal</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse show" id="collapseOneHeader" data-bs-parent="#accordionExample">
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
                            <label for="banner-subir">
                                <div class="cursor">
                                    <div id="upload-banner">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1,000x1,000px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview-banner">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="banner-subir" id="banner-subir">
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="my-1">Fondo Landing</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="fondo_landing_input" name="fondo_landing_input" value="#000000">
                            <input type="color" class="form-control form-control-color p-0" id="fondo_landing" name="fondo_landing" value="#000000">
                        </div>

                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoHeader" aria-expanded="true" aria-controls="collapseTwoHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                
                <ul class="list-unstyled ps-4 collapse" id="collapseTwoHeader" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="mb-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-header" id="bold-titulo-header">
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
                                <input hidden type="checkbox" name="italic-titulo-header" id="italic-titulo-header">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" id="input-titulo-header" name="input-titulo-header">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTitulo" id="tamanoTitulo1" autocomplete="off" value="1">
                            <label class="btn btn-outline-text" for="tamanoTitulo1"><small><b>Chico</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoTitulo" id="tamanoTitulo2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoTitulo2"><small><b>Mediano</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoTitulo" id="tamanoTitulo3" autocomplete="off" checked value="3">
                            <label class="btn btn-outline-text" for="tamanoTitulo3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Alineación</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="alineacionTitulo" id="alineacionTitulo1" autocomplete="off" value="1">
                            <label class="btn btn-outline-text" for="alineacionTitulo1"><small><b><i class="fas fa-align-left"></i></b></small></label>
                            
                            <input type="radio" class="btn-check" name="alineacionTitulo" id="alineacionTitulo2" autocomplete="off" checked value="2">
                            <label class="btn btn-outline-text" for="alineacionTitulo2"><small><b><i class="fas fa-align-center"></i></b></small></label>
                            
                            <input type="radio" class="btn-check" name="alineacionTitulo" id="alineacionTitulo3" autocomplete="off" value="3">
                            <label class="btn btn-outline-text" for="alineacionTitulo3"><small><b><i class="fas fa-align-center"></i></b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input" name="color-titulo-input" value="#FFFFFF">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo" id="color-titulo" value="#FFFFFF">
                        </div>

                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeHeader" aria-expanded="true" aria-controls="collapseThreeHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/lapiz.svg')}}" alt="svg seccion"> <small>Texto</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 collapse" id="collapseThreeHeader" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="mb-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-parrafo" id="bold-titulo-parrafo">
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
                                <input hidden type="checkbox" name="italic-titulo-parrafo" id="italic-titulo-parrafo">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="texto-header" id="texto-header">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto1" autocomplete="off" checked value="1">
                            <label class="btn btn-outline-text" for="tamanoTexto1"><small><b>Chico</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoTexto2"><small><b>Mediano</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto3" autocomplete="off" value="3">
                            <label class="btn btn-outline-text" for="tamanoTexto3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Alineación</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto1" autocomplete="off" value="1">
                            <label class="btn btn-outline-text" for="alineacionTexto1"><small><b><i class="fas fa-align-left"></i></b></small></label>
                            
                            <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto2" autocomplete="off" checked value="2">
                            <label class="btn btn-outline-text" for="alineacionTexto2"><small><b><i class="fas fa-align-center"></i></b></small></label>
                            
                            <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto3" autocomplete="off" value="3">
                            <label class="btn btn-outline-text" for="alineacionTexto3"><small><b><i class="fas fa-align-center"></i></b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-texto-input" name="color-texto-input" value="#FFFFFF">
                            <input type="color" class="form-control form-control-color p-0" name="color-texto" id="color-texto" value="#FFFFFF">
                        </div>

                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourHeader" aria-expanded="true" aria-controls="collapseFourHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg seccion"> <small>Imagen</small></b></p>
                </button>

                <ul class="list-unstyled ps-4 collapse" id="collapseFourHeader" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <div class="img-subir">
                            <label for="imagen-subir">
                                <div id="upload-imagen">
                                    <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                    <h6>Click para Actualizar</h6>
                                    <p>PNG, JPG (max. 1,000x1,000px)</p>
                                </div>
                                <div>
                                    <img class="img-fluid" id="preview-imagen">
                                </div>
                            </label>
                            <input hidden type="file" name="imagen-subir" id="imagen-subir">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveHeader" aria-expanded="true" aria-controls="collapseFiveHeader">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                </button>

                <ul class="list-unstyled ps-4 collapse" id="collapseFiveHeader" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="mb-1">Direccionar</p>
                        <select class="form-select" name="direccionar_boton_header" id="direccionar_boton_header">
                            <option value="#formulario-participar">Formulario Participar</option>
                            <option value="#ganadores">Ganadores</option>
                            <option value="#preguntas-frecuentes">Preguntas Frecuentes</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <p class="mb-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-boton-parrafo" id="bold-boton-header">
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
                                <input hidden type="checkbox" name="italic-boton-header" id="italic-boton-header">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="titulo-boton-header" id="titulo-boton-header" value="PARTICIPAR">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoBotonHeader" id="tamanoBotonHeader1" autocomplete="off" checked value="1">
                            <label class="btn btn-outline-text" for="tamanoBotonHeader1"><small><b>Chico</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoBotonHeader" id="tamanoBotonHeader2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoBotonHeader2"><small><b>Mediano</b></small></label>
                            
                            <input type="radio" class="btn-check" name="tamanoBotonHeader" id="tamanoBotonHeader3" autocomplete="off" value="3">
                            <label class="btn btn-outline-text" for="tamanoBotonHeader3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-boton-header-input" name="color-boton-header-input" value="#cd0a10">
                            <input type="color" class="form-control form-control-color p-0" name="color-boton-header" id="color-boton-header" value="#cd0a10">
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <div class="d-none" id="como_participar">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_como_participa"><i class="fas fa-chevron-left"></i> Como Participar</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneNav" aria-expanded="true" aria-controls="collapseOneNav">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Como participar</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse show" id="collapseOneNav" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Color Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="border-input-como" name="border-input-como" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" id="border-como" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoComo" aria-expanded="true" aria-controls="collapseTwoComo">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseTwoComo" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-como" id="bold-titulo-como">
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
                                <input hidden type="checkbox" name="italic-titulo-como" id="italic-titulo-como">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-como" id="input-titulo-como" value="¿Cómo participar?">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloComo" id="tamanoTituloComo1" autocomplete="off" value="1">
                            <label class="btn btn-outline-text" for="tamanoTituloComo1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloComo" id="tamanoTituloComo2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoTituloComo2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloComo" id="tamanoTituloComo3" autocomplete="off" checked value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloComo3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-como" name="color-titulo-input-como" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-como" id="color-titulo-como" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeComo" aria-expanded="true" aria-controls="collapseThreeComo">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Participar</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseThreeComo" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="mb-1">Participar 1</p>
                        <div class="img-subir">
                            <label for="participar_1">
                                <div class="cursor">
                                    <div id="upload-participar-1">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1,000x1,000px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview_participar_1">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="participar_1" id="participar_1">
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="mb-1">Participar 2</p>
                        <div class="img-subir">
                            <label for="participar_2">
                                <div class="cursor">
                                    <div id="upload-participar-2">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1,000x1,000px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview_participar_2">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="participar_2" id="participar_2">
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="mb-1">Participar 3</p>
                        <div class="img-subir">
                            <label for="participar_3">
                                <div class="cursor">
                                    <div id="upload-participar-3">
                                        <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                        <h6>Click para Actualizar</h6>
                                        <p>PNG, JPG (max. 1,000x1,000px)</p>
                                    </div>
                                    <div>
                                        <img class="img-fluid" id="preview_participar_3">
                                    </div>
                                </div>
                            </label>
                            <input hidden type="file" name="participar_3" id="participar_3">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourComo" aria-expanded="true" aria-controls="collapseFourComo">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseFourComo" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-boton-como" id="bold-boton-como">
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
                                <input hidden type="checkbox" name="italic-boton-como" id="italic-boton-como">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-boton-como" id="input-boton-como" value="VER TÉRMINOS Y CONDICIONES">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoBotonComo" id="tamanoBotonComo1" autocomplete="off" checked value="1">
                            <label class="btn btn-outline-text" for="tamanoBotonComo1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoBotonComo" id="tamanoBotonComo2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoBotonComo2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoBotonComo" id="tamanoBotonComo3" autocomplete="off" value="3">
                            <label class="btn btn-outline-text" for="tamanoBotonComo3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Fondo</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-boton-input-como" name="color-boton-input-como" value="#cd0a10">
                            <input type="color" class="form-control form-control-color p-0" name="color-boton-como" id="color-boton-como" value="#cd0a10">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-none" id="form-participar">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_form_participa"><i class="fas fa-chevron-left"></i> Formulario Participar</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneFormulario" aria-expanded="true" aria-controls="collapseOneFormulario">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Formulario participar</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse show" id="collapseOneFormulario" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Color Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="border-input-formulario" name="border-input-formulario" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="border-formulario" id="border-formulario" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoFormulario" aria-expanded="true" aria-controls="collapseTwoFormulario">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseTwoFormulario" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-formulario" id="bold-titulo-formulario">
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
                                <input hidden type="checkbox" name="italic-titulo-formulario" id="italic-titulo-formulario">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-formulario" id="input-titulo-formulario" value="Formulario Participar">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloFormulario" id="tamanoTituloFormulario1" autocomplete="off" value="1">
                            <label class="btn btn-outline-text" for="tamanoTituloFormulario1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloFormulario" id="tamanoTituloFormulario2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoTituloFormulario2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloFormulario" id="tamanoTituloFormulario3" autocomplete="off" checked value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloFormulario3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-formulario" name="color-titulo-input-formulario" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-formulario" id="color-titulo-formulario" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeFormulario" aria-expanded="true" aria-controls="collapseThreeFormulario">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque formulario</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseThreeFormulario" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Color Label Formulario</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-label-input-formulario" name="color-label-input-formulario" value="#FFFFFF">
                            <input type="color" class="form-control form-control-color p-0" name="color-label-formulario" id="color-label-formulario" value="#FFFFFF">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourFormulario" aria-expanded="true" aria-controls="collapseFourFormulario">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseFourFormulario" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-boton-formulario" id="bold-boton-formulario">
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
                                <input hidden type="checkbox" name="italic-boton-formulario" id="italic-boton-formulario">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-boton-formulario" id="input-boton-formulario" value="PARTICIPAR">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoBotonFormulario" id="tamanoBotonFormulario1" autocomplete="off" checked value="1">
                            <label class="btn btn-outline-text" for="tamanoBotonFormulario1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoBotonFormulario" id="tamanoBotonFormulario2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoBotonFormulario2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoBotonFormulario" id="tamanoBotonFormulario3" autocomplete="off" value="3">
                            <label class="btn btn-outline-text" for="tamanoBotonFormulario3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-boton-input-formulario" name="color-boton-input-formulario" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="color-boton-formulario" id="color-boton-formulario" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-none" id="ganadores-section">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_ganador"><i class="fas fa-chevron-left"></i> Ganadores</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneGanador" aria-expanded="true" aria-controls="collapseOneGanador">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Ganadores</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse show" id="collapseOneGanador" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Color Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="border-input-ganador" name="border-input-ganador" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="border-ganador" id="border-ganador" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoGanador" aria-expanded="true" aria-controls="collapseTwoGanador">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseTwoGanador" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-ganador" id="bold-titulo-ganador">
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
                                <input hidden type="checkbox" name="italic-titulo-ganador" id="italic-titulo-ganador">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-ganador" id="input-titulo-ganador" value="Ganadores">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloGanador" id="tamanoTituloGanador1" autocomplete="off" value="1">
                            <label class="btn btn-outline-text" for="tamanoTituloGanador1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloGanador" id="tamanoTituloGanador2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoTituloGanador2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloGanador" id="tamanoTituloGanador3" autocomplete="off" checked value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloGanador3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-ganador" name="color-titulo-input-ganador" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-ganador" id="color-titulo-ganador" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeGanador" aria-expanded="true" aria-controls="collapseThreeGanador">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque ganadores</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseThreeGanador" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Color Lista</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-lista-input-ganador" name="color-lista-input-ganador" value="#FFFFFF">
                            <input type="color" class="form-control form-control-color p-0" name="color-lista-ganador" id="color-lista-ganador" value="#FFFFFF">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-none" id="preguntas-section">
            <div class="border-bottom py-2">
                <button type="button" class="border-0 w-100 text-start" style="background-logo_subir: #fff;" id="back_pregunta"><i class="fas fa-chevron-left"></i> Preguntas Frecuentes</button>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnePregunta" aria-expanded="true" aria-controls="collapseOnePregunta">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Sección Preguntas</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse show" id="collapseOnePregunta" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Color Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="border-input-pregunta" name="border-input-pregunta" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="border-pregunta" id="border-pregunta" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoPregunta" aria-expanded="true" aria-controls="collapseTwoPregunta">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseTwoPregunta" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Texto</p>
                        <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                            <div class="p-1 cursor bold">
                                <input hidden type="checkbox" name="bold-titulo-pregunta" id="bold-titulo-pregunta">
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
                                <input hidden type="checkbox" name="italic-titulo-pregunta" id="italic-titulo-pregunta">
                            </div>
                        </div>
                        <input type="text" class="form-control p-2" name="input-titulo-pregunta" id="input-titulo-pregunta" value="Preguntas Frecuentes">
                    </li>
                    <li class="my-2">
                        <p class="my-1">Tamaño Texto</p>
                        
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="tamanoTituloPregunta" id="tamanoTituloPregunta1" autocomplete="off" value="1">
                            <label class="btn btn-outline-text" for="tamanoTituloPregunta1"><small><b>Chico</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloPregunta" id="tamanoTituloPregunta2" autocomplete="off" value="2">
                            <label class="btn btn-outline-text" for="tamanoTituloPregunta2"><small><b>Mediano</b></small></label>
                          
                            <input type="radio" class="btn-check" name="tamanoTituloPregunta" id="tamanoTituloPregunta3" autocomplete="off" checked value="3">
                            <label class="btn btn-outline-text" for="tamanoTituloPregunta3"><small><b>Grande</b></small></label>
                        </div>

                    </li>
                    <li class="my-2">
                        <p class="my-1">Color</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-titulo-input-pregunta" name="color-titulo-input-pregunta" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="color-titulo-pregunta" id="color-titulo-pregunta" value="#fbbb01">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="py-2 border-bottom">
                <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreePregunta" aria-expanded="true" aria-controls="collapseThreePregunta">
                    <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Preguntas frecuentes</small></b></p>
                </button>
                <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseThreePregunta" data-bs-parent="#accordionExample">
                    <li class="my-2">
                        <p class="my-1">Color Preguntas</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-text-input-pregunta" name="color-text-input-pregunta" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="color-text-pregunta" id="color-text-pregunta" value="#fbbb01">
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="my-1">Color Preguntas Borde</p>
                        
                        <div class="d-flex" role="group" style="gap: 0.4em;">
                            <input type="text" class="form-control" id="color-borde-input-pregunta" name="color-borde-input-pregunta" value="#fbbb01">
                            <input type="color" class="form-control form-control-color p-0" name="color-borde-pregunta" id="color-borde-pregunta" value="#fbbb01">
                        </div>
                    </li>
                    <li class="my-2">
                        <p class="my-1"><b>Preguntas:</b> </p>
                        <div>
                            <p>Pregunta 1</p>
                            <input type="text" class="form-control" name="pregunta1" id="pregunta1">
                            <p>Respuesta</p>
                            <textarea class="form-control" name="respuesta1" id="respuesta1"></textarea>
                            <hr>
                        </div>
                        <div>
                            <p>Pregunta 2</p>
                            <input type="text" class="form-control" name="pregunta2" id="pregunta2">
                            <p>Respuesta</p>
                            <textarea class="form-control" name="respuesta2" id="respuesta2"></textarea>
                            <hr>
                        </div>
                        <div>
                            <p>Pregunta 3</p>
                            <input type="text" class="form-control" name="pregunta3" id="pregunta3">
                            <p>Respuesta</p>
                            <textarea class="form-control" name="respuesta3" id="respuesta3"></textarea>
                            <hr>
                        </div>
                        <div>
                            <p>Pregunta 4</p>
                            <input type="text" class="form-control" name="pregunta4" id="pregunta4">
                            <p>Respuesta</p>
                            <textarea class="form-control" name="respuesta4" id="respuesta4"></textarea>
                            <hr>
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
                --landing: #080808;
                --color-text1: #fff;
                --color-active-nav: #fbbb01;
                --popins: "Poppins", sans-serif;
                --bg-nav: #080808;
                --buttom-header: #cd0a10;
                --color-buttom-header: #fff;
                --border-participar: #fbbb01;
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
                color: var(--color-text1);
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
                margin: 0px 2em;
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
                color: #fff
            }
        </style>
        <div class="landing_page position-relative">
            <div class="w-100 nav-landing nav-position px-5" id="nav-landing">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">
                                    <img src="{{asset('backend/landing/img/Recurso 1.png')}}" alt="Bootstrap" id="logo-nav" style="width: 100px;">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars" style="color: #fff;"></i>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex" style="gap: 3rem;">
                                        <li class="nav-item">
                                            <a class="nav-link active item_landing_menu" aria-current="page" href="#participar" id="navegacion_1_menu">¿CÓMO PARTICIPAR?</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link item_landing_menu" href="#preguntas-frecuentes" id="navegacion_2_menu">PREGUNTAS FRECUENTES</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link item_landing_menu" href="#" id="navegacion_3_menu">TÉRMINOS Y CONDICIONES</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link item_landing_menu" href="#ganadores" id="navegacion_4_menu">VER GANADORES</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <header id="header" class="w-100 d-flex flex-column justify-content-center align-items-center" style="gap: 1.2rem;background-image: url({{asset('backend/landing/img/fondo-header.jpg')}});">
                    <img class="img-fluid" src="{{asset('backend/landing/img/Objeto inteligente vectorial.png')}}" alt="" id="imagen-header">
                    <p class="text-center fs-1 w-100" id="titulo_header"></p>
                    <p class="text-center fs-6 w-100" id="parrafo-header"></p>
                    <a href="#formulario-participar" class="btns btn-landing mt-5" id="btn_participar_header">PARTICIPAR</a>
                </header>
                <div class="pt-5" id="participar">
                    <section>
                        <h1 class="text-center title-participar" id="title_como">¿Cómo participar?</h1>
                        <div class="aside-row">
                            <aside class="col-12 col-md-6 col-lg-4 item-participar">
                                <img class="img-fluid" src="{{asset('backend/landing/img/participar-1.png')}}" alt="" id="item_participar_1">
                            </aside>
                            <aside class="col-12 col-md-6 col-lg-4 item-participar">
                                <img class="img-fluid" src="{{asset('backend/landing/img/participar-2.png')}}" alt="" id="item_participar_2">
                            </aside>
                            <aside class="col-12 col-md-6 col-lg-4 item-participar">
                                <img class="img-fluid" src="{{asset('backend/landing/img/participar-3.png')}}" alt="" id="item_participar_3">
                            </aside>
                        </div>
                        <button class="btns btn-landing" id="btn-como">VER TÉRMINOS Y CONDICIONES</button>
                    </section>
                </div>
                <div class="mt-5" id="formulario-participar">
                    <section>
                        <h1 class="text-center title-participar" id="title_formulario_participar">Formulario Participar</h1>
                        <form class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form">Nombre</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form">Apellido</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form">Tipo de documento</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form">N° de documento</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form">Edad (*Mayores de 18 años)</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form">N° telefónico</label>
                                <input type="text" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form">Correo Electronico</label>
                                <input type="email" class="form-control input-text">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="label_form">N° de LOTE + foto de producto</label>
                                <input type="text" class="form-control input-text">
                                <input type="file" name="" id="" class="form-control mt-2">
                            </div>
    
                            <div class="col-12 row mt-3">
                                <div class="form-check col-12 col-md-6 col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="termino_condicion" id="termino_condicion">
                                    <label class="form-check-label label_form" for="termino_condicion ">
                                        Acepto terminos y condiciones
                                    </label>
                                </div>
                                <div class="form-check col-12 col-md-6 col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="datos_web" id="datos_web">
                                    <label class="form-check-label label_form" for="datos_web">
                                        Deseo usar mis datos para crear un usuario en plataforma web
                                    </label>
                                </div>
                                <div class="form-check col-12 col-md-6 col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="politica_privacidad" id="politica_privacidad">
                                    <label class="form-check-label label_form" for="politica_privacidad">
                                        Acepto política de privacidad de datos
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mt-3 d-flex justify-content-center">
                                <button type="submit" class="btns btn-participar" id="btn-formulario">PARTICIPAR</button>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="mt-5"  id="ganadores">
                    <section>
                        <h1 class="text-center title-participar" id="ganador-title">Ganadores</h1>
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
                    <section>
                        <h1 class="text-center title-participar" id="pregunta-title">Preguntas Frecuentes</h1>
                        <div class="w-100">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" 
                                    id="pregunta-1-landing">
                                        Accordion Item #1
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body" id="respuesta-1-landing">
                                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="pregunta-2-landing">
                                        Accordion Item #2
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body" id="respuesta-2-landing">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="pregunta-3-landing">
                                        Accordion Item #3
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body"  id="respuesta-3-landing">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" id="pregunta-4-landing">
                                        Accordion Item #3
                                    </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body"  id="respuesta-4-landing">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="w-100 mb-5" id="redes">
                <footer>
                    <h1 class="text-center title-participar mb-5">Redes Sociales</h1>
                    <div class="d-flex justify-content-center">
                        <a href="">
                            <img class="img-fluid" src="{{asset('backend/svg/facebook-svgrepo-com.svg')}}" alt="">
                        </a>
                        <a href="">
                            <img class="img-fluid" src="{{asset('backend/svg/instagram-svgrepo-com.svg')}}" alt="">
                        </a>
                        <a href="">
                            <img class="img-fluid" src="{{asset('backend/svg/linkedin-linked-in-svgrepo-com.svg')}}" alt="">
                        </a>
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
        const item = document.getElementById("navegacion_1_menu")
        item.innerHTML = event.target.value
    })

    navegacion_2.addEventListener("input", function(event) {
        const item = document.getElementById("navegacion_2_menu")
        item.innerHTML = event.target.value
    })

    navegacion_3.addEventListener("input", function(event) {
        const item = document.getElementById("navegacion_3_menu")
        item.innerHTML = event.target.value
    })

    navegacion_4.addEventListener("input", function(event) {
        const item = document.getElementById("navegacion_4_menu")
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
    const border_pregunta = document.getElementById("border-pregunta");
    const section_pregunta = document.querySelector("#preguntas-frecuentes section");

    border_input_pregunta.addEventListener("input", function(event) {
        border_pregunta.value = event.target.value
        section_pregunta.style.borderColor = event.target.value
    })

    border_pregunta.addEventListener('input', function(event) {
        border_input_pregunta.value = this.value
        section_pregunta.style.borderColor = this.value
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
@endsection

@section('script_jquery')
<script src="{{ asset('backend/js/admin/landing.js') }}"></script>
@endsection