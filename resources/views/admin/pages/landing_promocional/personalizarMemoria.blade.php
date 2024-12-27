@extends('admin.pages.inicio.layout')


@php
    $project = $data["project"]; 
    $gameMemoria = $data["gameMemoria"]; 
    $projectPremio = $data["projectPremio"]; 
    $premioSelect = $data["premio"]; 
    $sigueIntentando = $data["sigueIntentando"];

    $urlSigue = isset($sigueIntentando["imagen"]) && !empty($sigueIntentando["imagen"]) ? '/storage/'.$sigueIntentando["imagen"] : '';
@endphp

@section('header_left')
  <span>{{ $project->project_type->name }} > <b>{{ $project->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
<button type="submit" class="btn btn-alicorp" id="guardar-memoria">
    Guardar
</button>
@endsection


@section('inicio_dash')
@php
    $rutaCon = route($project->project_type->ruta_name.'.show.overview', $project->id );

    //imagenes
    $principal = isset($gameMemoria) ? $gameMemoria->principal : '';
    $premio = isset($gameMemoria) ? $gameMemoria->premio : '';
    $principalData = json_decode($principal, true);
    $premioData = json_decode($premio, true);
    $imgNulo = asset('backend/svg/img-null.svg');

    // Principal
    $bgMemoria = isset($principalData["banner"]) && !empty($principalData["banner"]) ? "background-image: url('".'/storage/'.$principalData["banner"]."');" : "background-color: #EFF2F6;" ;
    $bgMemoria_url = isset($principalData["banner"]) && !empty($principalData["banner"]) ? '/storage/'.$principalData["banner"] : "" ;

    $imgLogo = isset($principalData["logo-subir"]) && !empty($principalData["logo-subir"]) ? '/storage/'.$principalData["logo-subir"] : $imgNulo;
    $imgLogo_url = isset($principalData["logo-subir"]) && !empty($principalData["logo-subir"]) ? '/storage/'.$principalData["logo-subir"] : "";

    // Premios
    $imgLogoPremio = isset($premioData["gano-subir"])  && !empty($premioData["gano-subir"]) ? '/storage/'.$premioData["gano-subir"] : $imgNulo;
    $imgLogoPremio_url = isset($premioData["gano-subir"])  && !empty($premioData["gano-subir"]) ? '/storage/'.$premioData["gano-subir"] : '';

    // array memorias
    $jsonDataMemoria = json_decode($gameMemoria->premio_img ?? "", true);

    $img1 = isset($jsonDataMemoria[0]['img']) && !empty($jsonDataMemoria[0]['img']) ? "/storage/".$jsonDataMemoria[0]['img'] : $imgNulo;
    $img1_url = isset($jsonDataMemoria[0]['img']) && !empty($jsonDataMemoria[0]['img']) ? "/storage/".$jsonDataMemoria[0]['img'] : '';
    $img2 = isset($jsonDataMemoria[1]['img']) && !empty($jsonDataMemoria[1]['img']) ? "/storage/".$jsonDataMemoria[1]['img'] : $imgNulo;
    $img2_url = isset($jsonDataMemoria[1]['img']) && !empty($jsonDataMemoria[1]['img']) ? "/storage/".$jsonDataMemoria[1]['img'] : '';
    $img3 = isset($jsonDataMemoria[2]['img']) && !empty($jsonDataMemoria[2]['img']) ? "/storage/".$jsonDataMemoria[2]['img'] : $imgNulo;
    $img3_url = isset($jsonDataMemoria[2]['img']) && !empty($jsonDataMemoria[2]['img']) ? "/storage/".$jsonDataMemoria[2]['img'] : '';
    $img4 = isset($jsonDataMemoria[3]['img']) && !empty($jsonDataMemoria[3]['img']) ? "/storage/".$jsonDataMemoria[3]['img'] : $imgNulo;
    $img4_url = isset($jsonDataMemoria[3]['img']) && !empty($jsonDataMemoria[3]['img']) ? "/storage/".$jsonDataMemoria[3]['img'] : '';
    $img5 = isset($jsonDataMemoria[4]['img']) && !empty($jsonDataMemoria[4]['img']) ? "/storage/".$jsonDataMemoria[4]['img'] : $imgNulo;
    $img5_url = isset($jsonDataMemoria[4]['img']) && !empty($jsonDataMemoria[4]['img']) ? "/storage/".$jsonDataMemoria[4]['img'] : '';
    $img6 = isset($jsonDataMemoria[5]['img']) && !empty($jsonDataMemoria[5]['img']) ? "/storage/".$jsonDataMemoria[5]['img'] : $imgNulo;
    $img6_url = isset($jsonDataMemoria[5]['img']) && !empty($jsonDataMemoria[5]['img']) ? "/storage/".$jsonDataMemoria[5]['img'] : '';

    // valores
    $boldTitulo = isset($principalData["bold-titulo-parrafo"]) ? ($principalData["bold-titulo-parrafo"] == 1 ? "checked" : "") : "";
    $italicTitulo = isset($principalData["italic-titulo-parrafo"]) ? ($principalData["italic-titulo-parrafo"] == 1 ? "checked" : "") : "";
    $tituloTexto = isset($principalData["texto-header"]) ? $principalData["texto-header"]  : "";
    
    $tamanoTexto = isset($principalData["tamanoTexto"]) ? $principalData["tamanoTexto"] : "";
    $tamano1 = $tamanoTexto == 1 ? 'checked' : "";
    $tamano2 = $tamanoTexto == 2 ? 'checked' : "";
    $tamano3 = $tamanoTexto == 3 ? 'checked' : "";
    
    $alineacion = isset($principalData["alineacionTexto"]) ? $principalData["alineacionTexto"] : "";
    $alineacion1 = $alineacion == 1 ? 'checked' : "";
    $alineacion2 = $alineacion == 2 ? 'checked' : "";
    $alineacion3 = $alineacion == 3 ? 'checked' : "";

    $color = isset($principalData["color-texto-input"]) ? $principalData["color-texto-input"] : "#FFFFFF";

    // fw-bold
    $styleBold = isset($principalData["bold-titulo-parrafo"]) ? ($principalData["bold-titulo-parrafo"] == 1 ? "fw-bold" : "") : "";
    $italicTitulo = isset($principalData["italic-titulo-parrafo"]) ? ($principalData["italic-titulo-parrafo"] == 1 ? "fst-italic" : "") : "";

    $styleTamano = $tamanoTexto == 1 ? "fs-6" : ($tamanoTexto == 2 ? "fs-3"  :  ($tamanoTexto == 3 ? "fs-1"  : ""));
    $styleAlineacion = $alineacion == 1 ? "text-start" : ($alineacion == 2 ? "text-center"  :  ($alineacion == 3 ? "text-end"  : "text-center"));


    // Premios BOTONES
    $verBotones = isset($premioData["verBoton"]) ? $premioData["verBoton"] : "";
    $verBotones1 = $verBotones == 1 ? 'checked' : "";
    $verBotones2 = $verBotones == 2 ? 'checked' : "";
    $styleBotones =  $verBotones == 1 ? 'd-none' : 'd-flex';

    $btnBg = isset($premioData["color-btn-bg-input"]) ? $premioData["color-btn-bg-input"] : "#fff";
    $btnColor = isset($premioData["color-texto-btn"]) ? $premioData["color-texto-btn"] : "#d5542e";
    
    // premios img
    $imgPremio = isset($premioSelect["imagen"]) && !empty($premioSelect["imagen"]) ? "/storage/".$premioSelect["imagen"] : $imgNulo;
    $imgPremio_url = isset($premioSelect["imagen"]) && !empty($premioSelect["imagen"]) ? "/storage/".$premioSelect["imagen"] : '';
    $namePremio = isset($premioSelect["premio_nombre"]) && !empty($premioSelect["premio_nombre"]) ? $premioSelect["premio_nombre"] : '';

@endphp

<script>
    function subirImagenPremio (event, orden) {  
        const premio_img = document.getElementById("premio_img")
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-premio-'+orden.toString());
                const upload = document.getElementById('upload-premio-'+orden.toString())
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                if (orden == 1) {
                    premio_img.src = e.target.result;
                }
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    }
</script>

<style>
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
.d-none-2 {
    display: none;
}
.img-subir {
    position: relative;
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
.content_politicas_terminos {
        width: 100%;
        background-color: #ffffffbd;
        color: #d5542e !important;
        border-radius: 25px;
    }

    .content_politicas_terminos h1 {
        font-weight: 700;
        padding-bottom: 0.3em;
        font-size: 3em;
        border-bottom: 2px solid #d5542e;
    } 

    .content_politicas_terminos p {
        font-size: 22px;
        font-weight: 400;
    }

    .btn_politicas, .btn_terminos {
        background-color: #d5542e;
        color: #fff;
        border: 0;
        font-size: 1.5em;
        font-weight: 500;
        border-radius: 35px;
        padding: 0.3em 1.5em
    }

    .btn_politicas:hover, .btn_terminos:hover {
        color: #fff;
    }
</style>
@php
    $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';
@endphp
<div class="container-fluid" style="min-height: 100vh; overflow: auto;">
    <div class="row">
        <form id="form-memoria" action="{{ route($tipoJuego."juego.post.registro.personalizar", $project->id) }}" method="POST" enctype="multipart/form-data" class="col-3 border-end" style="overflow-y: scroll; height: 100vh;">
            @csrf
            @method('POST')
            <div class="d-block" id="menu_edit">
                <div class="border-bottom py-2">
                    <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_configuracion"><i class="bi bi-box-arrow-left"></i> Personalizar</button>
                </div>
                <div class="py-2 border-bottom cursor" id="principal-menu">
                    <p class="mb-0"><b>Vista Principal</b></p>
                    <ul class="list-unstyled ps-4">
                        <li>
                            <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                            <small>Sección Vista principal</small>
                        </li>
                        <li>
                            <img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion">
                            <small>Titulo</small>
                        </li>
                        <li>
                            <img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg imagen">
                            <small>Logo</small>
                        </li>
                        <li>
                            <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                            <small>Bloque Elementos de Juego</small>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom cursor" id="encabezado-menu">
                    <p class="mb-0"><b>Vista Premiación</b></p>
                    <ul class="list-unstyled ps-4">
                        <li>
                            <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                            <small>Bloque Premios</small>
                        </li>
                        <li>
                            <img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion">
                            <small>Botón</small>
                        </li>
                        <li>
                            <img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion">
                            <small>Botón</small>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom cursor" id="politicas-menu">
                    <p class="mb-0"><b>Política de privacidad</b></p>
                    <ul class="list-unstyled ps-4">
                        <li>
                            <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                            <small>Bloque Política de privacidad</small>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom cursor" id="terminos-menu">
                    <p class="mb-0"><b>Terminos y Condiciones</b></p>
                    <ul class="list-unstyled ps-4">
                        <li>
                            <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                            <small>Bloque Terminos y Condiciones</small>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-none" id="pagina_principal">
                <div class="border-bottom py-2">
                    <button type="button"  class="border-0 w-100 text-start" style="background-color: #fff;" id="back_principal"><i class="fas fa-chevron-left"></i> Pagina Principal</button>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseOneGame">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Vista Principal</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 collapseOneGame" >
                        <li>
                            <p class="mb-2">Fondo</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="banner-subir">
                                    <div class="cursor">
                                        <div id="upload-banner" class="{{ isset($bgMemoria_url) && !empty($bgMemoria_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 1,500x1,060px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-banner" src="{{ $bgMemoria_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="banner-subir" id="banner-subir">
                                <input type="hidden" name="banner-subir-url" id="banner-subir-url" value="{{ $bgMemoria_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom d-none">
                    <button class="header-edit-web" type="button" id="collapseTwoGame">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                    </button>
                    <ul class="list-unstyled ps-4 d-none-2 collapseTwoGame" >
                        <li class="my-2">
                            <p class="mb-1">Texto</p>
                            <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                                <div class="p-1 cursor bold">
                                    <input hidden type="checkbox" name="bold-titulo-parrafo" id="bold-titulo-parrafo" {{ $boldTitulo }}>
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
                                    <input hidden type="checkbox" name="italic-titulo-parrafo" id="italic-titulo-parrafo" {{ $italicTitulo }}>
                                </div>
                            </div>
                            <input type="text" class="form-control p-2" id="texto-header" name="texto-header" value="{{ $tituloTexto }}">
                        </li>
                        <li class="my-2">
                            <p class="my-1">Tamaño Texto</p>
                            
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto1" autocomplete="off" {{ $tamano1 }} value="1">
                                <label class="btn btn-outline-text" for="tamanoTexto1"><small><b>Chico</b></small></label>
                              
                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto2" autocomplete="off" {{ $tamano2 }} value="2">
                                <label class="btn btn-outline-text" for="tamanoTexto2"><small><b>Mediano</b></small></label>
                              
                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto3" autocomplete="off" {{ $tamano3 }} value="3">
                                <label class="btn btn-outline-text" for="tamanoTexto3"><small><b>Grande</b></small></label>
                            </div>

                        </li>
                        <li class="my-2">
                            <p class="my-1">Alineación</p>
                            
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto1" autocomplete="off" {{ $alineacion1 }} value="1">
                                <label class="btn btn-outline-text" for="alineacionTexto1"><small><b><i class="fas fa-align-left"></i></b></small></label>
                              
                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto2" autocomplete="off" {{ $alineacion2 }} value="2">
                                <label class="btn btn-outline-text" for="alineacionTexto2"><small><b><i class="fas fa-align-center"></i></b></small></label>
                              
                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto3" autocomplete="off" {{ $alineacion3 }} value="3">
                                <label class="btn btn-outline-text" for="alineacionTexto3"><small><b><i class="fas fa-align-right"></i></b></small></label>
                            </div>

                        </li>
                        <li class="my-2">
                            <p class="my-1">Color</p>
                            
                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-texto-input" name="color-texto-input" value="{{ $color }}">
                                <input type="color" class="form-control form-control-color p-0" id="color-texto" value="{{ $color }}">
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseThreeGame">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg seccion"> <small>Logo</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 d-none-2 collapseThreeGame" >
                        <li>
                            <p class="mb-2">Logo</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="logo-subir">
                                    <div class="cursor">
                                        <div id="upload-logo" class="{{ isset($imgLogo_url) && !empty($imgLogo_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 300x300px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-logo" src="{{ $imgLogo_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="logo-subir" id="logo-subir">
                                <input type="hidden" name="logo-subir-url" id="logo-subir-url" value="{{ $imgLogo_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseFourGame">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Elementos de Juego</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 d-none-2 collapseFourGame" >
                        <li>
                            <p class="mb-2">Imagen 1</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="imagen-1-subir">
                                    <div class="cursor">
                                        <div id="upload-imagen-1" class="{{ isset($img1_url) && !empty($img1_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 150x150px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-imagen-1" src="{{ $img1_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="imagen-1-subir" id="imagen-1-subir">
                                <input type="hidden" name="imagen-1-subir-url" id="imagen-1-subir-url" value="{{ $img1_url }}">
                            </div>
                        </li>
                        <li>
                            <p class="mb-2">Imagen 2</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="imagen-2-subir">
                                    <div class="cursor">
                                        <div id="upload-imagen-2" class="{{ isset($img2_url) && !empty($img2_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 150x150px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-imagen-2" src="{{ $img2_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="imagen-2-subir" id="imagen-2-subir">
                                <input type="hidden" name="imagen-2-subir-url" id="imagen-2-subir-url" value="{{ $img2_url }}">
                            </div>
                        </li>
                        <li>
                            <p class="mb-2">Imagen 3</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="imagen-3-subir">
                                    <div class="cursor">
                                        <div id="upload-imagen-3" class="{{ isset($img3_url) && !empty($img3_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 150x150px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-imagen-3" src="{{ $img3_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="imagen-3-subir" id="imagen-3-subir">
                                <input type="hidden" name="imagen-3-subir-url" id="imagen-3-subir-url" value="{{ $img3_url }}">
                            </div>
                        </li>
                        <li>
                            <p class="mb-2">Imagen 4</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="imagen-4-subir">
                                    <div class="cursor">
                                        <div id="upload-imagen-4" class="{{ isset($img4_url) && !empty($img4_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 150x150px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-imagen-4" src="{{ $img4_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="imagen-4-subir" id="imagen-4-subir">
                                <input type="hidden" name="imagen-4-subir-url" id="imagen-4-subir-url" value="{{ $img4_url }}">
                            </div>
                        </li>
                        <li>
                            <p class="mb-2">Imagen 5</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="imagen-5-subir">
                                    <div class="cursor">
                                        <div id="upload-imagen-5" class="{{ isset($img5_url) && !empty($img5_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 150x150px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-imagen-5" src="{{ $img5_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="imagen-5-subir" id="imagen-5-subir">
                                <input type="hidden" name="imagen-5-subir-url" id="imagen-5-subir-url" value="{{ $img5_url }}">
                            </div>
                        </li>
                        <li>
                            <p class="mb-2">Imagen 6</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="imagen-6-subir">
                                    <div class="cursor">
                                        <div id="upload-imagen-6" class="{{ isset($img6_url) && !empty($img6_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 150x150px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-imagen-6" src="{{ $img6_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="imagen-6-subir" id="imagen-6-subir">
                                <input type="hidden" name="imagen-6-subir-url" id="imagen-6-subir-url" value="{{ $img6_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-none" id="encabezado">
                <div class="border-bottom py-2">
                    <button type="button"  class="border-0 w-100 text-start" style="background-color: #fff;" id="back_encabezado"><i class="fas fa-chevron-left"></i> Vista Premiación</button>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseOnePremio">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Header Premiación</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 collapseOnePremio" >
                        <li>
                            <p class="mb-2">Titulo</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="gano-subir">
                                    <div class="cursor">
                                        <div id="upload-gano" class="{{ isset($imgLogoPremio_url) && !empty($imgLogoPremio_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 250x250px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-gano" src="{{ $imgLogoPremio_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="gano-subir" id="gano-subir">
                                <input type="hidden" name="gano-subir-url" id="gano-subir-url" value="{{ $imgLogoPremio_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseTwoPremio">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 d-none-2 collapseTwoPremio" >
                        <li>
                            <p class="mb-2">Ver Botones</p>
                            
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="verBoton" id="verBoton1" autocomplete="off" {{ $verBotones1 }}  value="1">
                                <label class="btn btn-outline-text" for="verBoton1"><small><b>No</b></small></label>
                              
                                <input type="radio" class="btn-check" name="verBoton" id="verBoton2" autocomplete="off" {{ $verBotones2 }}  value="2">
                                <label class="btn btn-outline-text" for="verBoton2"><small><b>Si</b></small></label>
                            </div>

                        </li>
                        <li class="my-2">
                            <p class="my-1">Color</p>
                            
                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-texto-btn" name="color-texto-btn" value="{{ $btnColor }}">
                                <input type="color" class="form-control form-control-color p-0" id="color-btn" value="{{ $btnColor }}">
                            </div>

                        </li>
                        <li class="my-2">
                            <p class="my-1">Color Fondo</p>
                            
                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-btn-bg-input" name="color-btn-bg-input" value="{{ $btnBg }}">
                                <input type="color" class="form-control form-control-color p-0" id="color-btn-bg" value="{{ $btnBg }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseThreePremio">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Premiación</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2  d-none-2 collapseThreePremio" >
                        @foreach ($projectPremio as $value)
                        @php
                            $imgUrl = !empty($value["imagen"]) ? "/storage/".$value["imagen"] : ''
                        @endphp
                        <li class="mb-2">
                            <p class="mb-2">Premio {{ $value->orden }} => {{ $value->nombre_premio }}</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="premio-subir-{{ $value->orden }}">
                                    <div class="cursor">
                                        <div id="upload-premio-{{ $value->orden }}" class="{{ isset($imgUrl) && !empty($imgUrl) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 400x400px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-premio-{{ $value->orden }}" src="{{ $imgUrl }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="premio-subir-{{ $value->orden }}" id="premio-subir-{{ $value->orden }}" onchange="subirImagenPremio(event, {{ $value->orden }})">
                                <input type="text" hidden  name="premio_id_{{ $value->orden }}" id="premio_id_{{ $value->orden }}" value="{{ $value->orden }}|{{ $value->id }}">
                                <input type="hidden" name="premio-subir-{{ $value->orden }}-url" id="premio-subir-{{ $value->orden }}-url" value="{{ $imgUrl }}">
                            </div>
                        </li>
                        @endforeach
                        <li class="mb-2">
                            <p class="mb-2">Sigue Intentando</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="sigue-intentando-subir">
                                    <div class="cursor">
                                        <div id="upload-sigue" class="{{ isset($urlSigue) && !empty($urlSigue) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 400x400px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-sigue" src="{{ $urlSigue }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="sigue-intentando-subir" id="sigue-intentando-subir">
                                <input type="hidden" name="sigue-intentando-subir-url" id="sigue-intentando-subir-url" value="{{ $urlSigue }}">
                            </div>
                        </li>
                    </ul>
                </div>
                
            </div>
            <div class="d-none" id="politicas">
                @php
                $politicas = isset($gameMemoria["politicas"]) && !empty($gameMemoria["politicas"]) && !empty(json_decode($gameMemoria["politicas"], true)['politicas_value']) ? json_decode($gameMemoria["politicas"], true)['politicas_value'] : 'Conste por el presente documento, yo ____________, identificado con _______________, (en adelante él/la "CEDENTE"), expresa su voluntad expresa de ceder de forma gratuita, a favor de ALICORP S.A.A., con RUC Nº 20100055237, con domicilio legal  en avenida Argentina 4793, Carmen de la Legua Reynoso, Callao y a sus subsidiarias (en adelante, ALICORP o la EMPRESA), los derechos de explotación y uso de su imagen, cesión que se realiza sin limitación alguna, de acuerdo al artículo 15 del código civil; en los términos que se detallan a continuación:
                        PRIMERO: OBJETO DE SESIÓN
                        <br>
                        <br>
                        1.1. Él, La CEDENTE cede y transfiere de forma total e integra, gratuita e ilimitada a nivel mundial, a LA EMPRESA todos los derechos de uso de su imagen que aparecerá en el video, fotografías y cualquier otro medio de captación de imágenes que elaborará y será de propiedad de LA EMPRESA.';
                $colorPolitica = isset($gameMemoria["politicas"]) && !empty($gameMemoria["politicas"]) && !empty(json_decode($gameMemoria["politicas"], true)['color-politica-btn']) ? json_decode($gameMemoria["politicas"], true)['color-politica-btn'] : $btnColor;
                @endphp
                <div class="border-bottom py-2">
                    <button type="button"  class="border-0 w-100 text-start" style="background-color: #fff;" id="back_politicas"><i class="fas fa-chevron-left"></i> Vista Política de privacidad</button>
                </div>
                

                <div class="py-2 border-bottom">
                    <ul class="list-unstyled ps-4 mt-2">
                        <li>
                            <p class="mb-2">Color Base</p>
                            
                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-politica-btn" name="color-politica-btn" value="{{ $colorPolitica }}">
                                <input type="color" class="form-control form-control-color p-0" id="politica-btn" value="{{ $colorPolitica }}">
                            </div>
                        </li>
                        <li>
                            <p class="mb-2">Texto</p>
                            
                            <textarea name="politicas_text" id="politicas_text" cols="30" rows="10" class="form-control">{{ str_replace('<br>', '', $politicas) }}</textarea>
                            <input type="hidden" name="politicas_value" id="politicas_value" value="{{ $politicas }}">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-none" id="terminos">
                @php
                    $terminos = isset($gameMemoria["terminos"]) && !empty($gameMemoria["terminos"]) && !empty(json_decode($gameMemoria["terminos"], true)['terminos_value']) ? json_decode($gameMemoria["terminos"], true)['terminos_value'] : "Vigencia: Lima: del 15.03.2024 al 17.05.2024, Provincia: del 22.03.2024 al 07.04.2024, los días viernes, sábados y domingos, de 9:00 a.m. a 2:00 p.m. Válida en los mercados participantes de las ciudades de Lima, Arequipa, Trujillo, Huancayo y Chiclayo. Participan solo mayores de 18 años que realicen en el mercado participante la compra mínima de: (i) de 02 pastas corta o larga Don Vittorio, en cualquiera de sus presentaciones y (ii) ubiquen a la impulsadora, quien les permitirá participar en el “Juego de la Ruleta Virtual” y según el resultado podrá llevarse o no, uno de los premios disponibles. Stock total de premios en los mercados participantes: Lima: (i) 500 kits Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450g, 01 salsa roja Don Vittorio de 200 g), (ii) 225 coladores, (iii) 500 cucharones de pasta, Provincia: (i) 180 kits N°1 Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450 g), (ii) 222 kits N°2 Don Vittorio (incluye: 01 bolso notex, 01 codito Don Vittorio de 250 g), 300 kits N°3 Don Vittorio (incluye: 01 bolso notex, 01 salsa roja Don Vittorio de 200 g). Más información en https://www.alicorp.com.pe/pe/es/promociones/ o al número 01 7089300.";
                    $colorTermino = isset($gameMemoria["terminos"]) && !empty($gameMemoria["terminos"]) && !empty(json_decode($gameMemoria["terminos"], true)['color-termino-btn']) ? json_decode($gameMemoria["terminos"], true)['color-termino-btn'] : $btnColor;
                @endphp
                <div class="border-bottom py-2">
                    <button type="button"  class="border-0 w-100 text-start" style="background-color: #fff;" id="back_terminos"><i class="fas fa-chevron-left"></i> Vista Terminos y Condiciones</button>
                </div>
                
                <div class="py-2 border-bottom">
                    <ul class="list-unstyled ps-4 mt-2">
                        <li>
                            <p class="mb-2">Color Base</p>
                            
                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-termino-btn" name="color-termino-btn" value="{{ $colorTermino }}">
                                <input type="color" class="form-control form-control-color p-0" id="termino-btn" value="{{ $colorTermino }}">
                            </div>
                        </li>
                        <li>
                            <p class="mb-2">Texto</p>
                            
                            <textarea name="terminos_text" id="terminos_text" cols="30" rows="10" class="form-control">{{ str_replace('<br>', '', $terminos) }}</textarea>
                            <input type="hidden" name="terminos_value" id="terminos_value" value="{{ $terminos }}">
                        </li>
                    </ul>
                </div>
            </div>
        </form>
        <div class="col-9 p-0 landing_page position-relative" id="juego_memoria" style="height: 100vh;">
            <style>
                .juego_memorio_content {
                    width: 100%;
                    height: 100vh;
                    font-family: Arial, Helvetica, sans-serif;
                }
                .game {
                    /* position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%); */
                    max-width: 660px;
                    margin: auto;
                }
                .controls {
                    display: flex;
                    gap: 20px;
                    margin-top: 10px;
                    padding: 0 1.2em;
                }
                /* button {
                    background: #282A3A;
                    color: #FFF;
                    border-radius: 5px;
                    padding: 10px 20px;
                    border: 0;
                    cursor: pointer;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 18pt;
                    font-weight: bold;
                } */
                .disabled {
                    color: #757575;
                }
                .stats {
                    color: #FFF;
                    font-size: 14pt;
                    font-weight: bold;
                }
                .board-container {
                    position: relative;
                }
                .board,
                .win {
                    border-radius: 5px;
                    /* box-shadow: 0 25px 50px rgb(33 33 33 / 25%);
                    background: linear-gradient(135deg,  #03001e 0%,#7303c0 0%,#ec38bc 50%, #fdeff9 100%); */
                    transition: transform .6s cubic-bezier(0.4, 0.0, 0.2, 1);
                    backface-visibility: hidden;
                }
                .board {
                    padding: 20px;
                    display: grid;
                    grid-template-columns: repeat(4, auto);
                    grid-gap: 20px;
                }
                .board-container.flipped .board {
                    transform: rotateY(180deg) rotateZ(50deg);
                }
                .board-container.flipped .win {
                    transform: rotateY(0) rotateZ(0);
                }
                .card {
                    position: relative;
                    width: 140px;
                    height: 140px;
                    cursor: pointer;
                    background-color: transparent !important;
                    border: 0;
                }
                .card-front,
                .card-back {
                    position: absolute;
                    border: 4px solid #fff;
                    border-radius: 15px;
                    width: 100%;
                    height: 100%;
                    /* background: #282A3A; */
                    /* background: linear-gradient(190deg, #e71b1b 0%, #ff3434 0%, #991616 50%, #590202 100%); */
                    background: radial-gradient(ellipse at top, #f13636 0%, #f13636 40%, #d10f0f 80%);
                    transition: transform .6s cubic-bezier(0.4, 0.0, 0.2, 1);
                    backface-visibility: hidden;
                    overflow: hidden;
                }
                .card-back {
                    transform: rotateY(180deg) rotateZ(50deg);
                    font-size: 28pt;
                    user-select: none;
                    text-align: center;
                    line-height: 100px;
                    background: #FDF8E6;
                }
                .card.flipped .card-front {
                    transform: rotateY(180deg) rotateZ(50deg);
                }
                .card.flipped .card-back {
                    transform: rotateY(0) rotateZ(0);
                }
                .win {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    text-align: center;
                    background: #FDF8E6;
                    transform: rotateY(180deg) rotateZ(50deg);
                }
                .win-text {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 21pt;
                    color: #282A3A;
                }
                .highlight {
                    color: #7303c0;
                }

                .img-card {
                    width: 100%;
                    height: 100%;
                }

                .none-visibiliti {
                    transform: scale(1);
                    transition: transform 0.6s cubic-bezier(0.4, 0.0, 0.2, 1);
                    visibility: hidden;
                }

                .scale-trans {
                    transform: scale(1.2);
                    transition: transform 0.6s cubic-bezier(0.4, 0.0, 0.2, 1);
                }

                .btn-top {
                    background-color: #fff;
                    padding: 0.5em;
                    color: #e71b1b;
                    font-weight: 900;
                    border-radius: 36px;
                    font-size: 0.9rem;
                }

                .btn-memoria {
                    
                    padding: 0.5em 1em;
                    color: #d5542e;
                    font-weight: 500;
                    font-size: 13px !important;
                    border-radius: 36px;
                    font-size: 1rem;
                    margin: 10px 0.2em;
                    text-decoration: none;
                }

                .btn-memoria:hover {
                    color: #d5542e;
                }
            </style>
            <div class="juego_memorio_content" id="juego_memorio_content" style="{{ $bgMemoria }} background-size: cover;">
                <div class="contenido_juego d-block" id="contenido_juego">
                    <p class="{{ $styleAlineacion }} {{ $styleTamano }} w-100 mt-0 mb-0 pt-2 {{ $styleBold }} {{ $italicTitulo }} d-none" id="parrafo-header" style="color: {{ $color }};">{{ $tituloTexto }}</p>
                    <div class="d-flex justify-content-center pt-4">
                        <img class="img-fluid" id="logo_memoria" src="{{ $imgLogo }}" alt="" style="max-width: 250px;">
                    </div>
                    <div class="game">
                        <div class="controls">
                            <button style="display: none;">Start</button>
                            <div class="stats" style="display: none;">
                                <div class="moves">3 intentos</div>
                                <div class="timer">Time: 0 sec</div>
                            </div>
                            <div class="btn-top error">
                                ERRORES: 0
                            </div>
                            <div class="btn-top turno">
                                TURNOS: 0
                            </div>
                        </div>
                        <div class="board-container">
                            <div class="board" data-dimension="4"></div>
                            <!-- <div class="win">You won!</div> -->
                        </div>
                    </div>
                </div>
                <div class="win-game d-none" id="win-game">
                    <div class="d-flex justify-content-center pt-4 w-100 mb-3">
                        <img class="img-fluid" src="{{ $imgLogoPremio }}" alt="" id="img-header-premio" style="max-width: 350px;">
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center w-100">
                        <img class="img-fluid mb-2" src="{{ $imgPremio }}" alt="" id="premio_img" style="max-width: 370px;">
                        <h4 class="text-white" style="font-weight: 700;" id="h4Premio">{{ $namePremio }}</h4>
                    </div>
                    <div class="{{ $styleBotones }} justify-content-center" id="btn_content">
                        <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }};">IR A REGISTRO</a>
                        <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }};">IR A HOME</a>
                        {{-- <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }};">VOLVER A JUGAR</a> --}}
                    </div>
                </div>
                <div class="container h-100 d-flex align-items-center d-none" id="poltica-privacidad">
                    <div class="content_politicas_terminos text-center p-5">
                        <h1 class="w-75 m-auto text_politicas_color" style="color: {{ $colorPolitica }} !important;border-color: {{ $colorPolitica }} !important;">POLÍTICA DE PRIVACIDAD</h1>
                        <p class="mt-4 text_politicas_color" id="text_politicas" style="color: {{ $colorPolitica }} !important;">
                            @php
                                echo $politicas;
                            @endphp
                        </p>
                        <div class="d-flex justify-content-between mt-5">
                            <button type="button" class="btn_politicas text-uppercase" id="aceptar_politica" style="background-color: {{ $colorPolitica }} !important;">Aceptar y contnuar</button>
                            <a href="{{ route('index') }}" class="btn_politicas text-uppercase" style="text-decoration: none; background-color: {{ $colorPolitica }} !important;">No Aceptar y salir</a>
                        </div>
                    </div>
                </div>
                <div class="container h-100 d-flex align-items-center d-none" id="terminos-condiciones">
                    <div class="content_politicas_terminos text-center p-5">
                        <h1 class="w-75 m-auto text_terminos_color" style="color: {{ $colorTermino }} !important;border-color: {{ $colorTermino }} !important;">TÉRMINOS Y CONDICIONES</h1>
                        <p class="mt-4 text_terminos_color" id="text_terminos" style="color: {{ $colorTermino }} !important;">
                            @php
                                echo $terminos;
                            @endphp
                        </p>
                        <div class="d-flex justify-content-between mt-5">
                            <button type="submit" class="btn_terminos text-uppercase" id="aceptar_terminos" style="background-color: {{ $colorTermino }} !important;">Aceptar y contnuar</button>
                            <a href="{{ route('index') }}" class="btn_terminos text-uppercase" style="text-decoration: none; background-color: {{ $colorTermino }} !important;">No Aceptar y salir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer>

    let itemCard = [
        {
            valor: 1,
            img: '{{ $img1 }}'
        },
        {
            valor: 2,
            img: '{{ $img2 }}'
        },
        {
            valor: 3,
            img: '{{ $img3 }}'
        },
        {
            valor: 4,
            img: '{{ $img4 }}'
        },
        {
            valor: 5,
            img: '{{ $img5 }}'
        },
        {
            valor: 6,
            img: '{{ $img6 }}'
        }
    ]

    const maxTurno = 1;
    let nErrores = 0;

    const selectors = {
        boardContainer: document.querySelector('.board-container'),
        board: document.querySelector('.board'),
        moves: document.querySelector('.moves'),
        timer: document.querySelector('.timer'),
        start: document.querySelector('button'),
        win: document.querySelector('.win-game'),
        contenido_juego: document.querySelector('.contenido_juego')
    }

    const state = {
        gameStarted: false,
        flippedCards: 0,
        totalFlips: 0,
        totalTime: 0,
        loop: null
    }

    const shuffle = array => {
        const clonedArray = [...array]
        for (let i = clonedArray.length - 1; i > 0; i--) {
            const randomIndex = Math.floor(Math.random() * (i + 1))
            const original = clonedArray[i]

            clonedArray[i] = clonedArray[randomIndex]
            clonedArray[randomIndex] = original
        }

        return clonedArray
    }

    const pickRandom = (array, items) => {
        const clonedArray = [...array]
        const randomPicks = []

        for (let i = 0; i < items; i++) {
            const randomIndex = Math.floor(Math.random() * clonedArray.length)
            
            randomPicks.push(clonedArray[randomIndex])
            clonedArray.splice(randomIndex, 1)
        }

        return randomPicks
    }

    const generateGame = () => {
        const dimensions = selectors.board.getAttribute('data-dimension')  

        // const emojis = ['🥔', '🍒', '🥑', '🌽', '🥕', '🍇', '🍉', '🍌', '🥭', '🍍']
        const articulos = itemCard;
        const picks = pickRandom(articulos, (3 * dimensions) / 2) 
        const items = shuffle([...picks, ...picks])
       
        const cards = `
            <div class="board" style="grid-template-columns: repeat(${dimensions}, auto)">
                ${items.map(item => `
                    <div class="card" data-attr-valor="${item.valor}">
                        <div class="card-front"></div>
                        <div class="card-back">
                            <img src="${item.img}" class="img-card imagen_${item.valor}" />
                        </div>
                    </div>
                `).join('')}
        </div>
        `
        
        const parser = new DOMParser().parseFromString(cards, 'text/html')

        selectors.board.replaceWith(parser.querySelector('.board'))
    }

    const startGame = () => {
        state.gameStarted = true
        // selectors.start.classList.add('disabled')

        state.loop = setInterval(() => {
            state.totalTime++

            selectors.moves.innerText = `${state.totalFlips} moves`
            selectors.timer.innerText = `Time: ${state.totalTime} sec`
        }, 1000)
    }

    const flipBackCards = () => {
        document.querySelectorAll('.card:not(.matched)').forEach(card => {
            card.classList.remove('flipped')
        })

        state.flippedCards = 0
    }

    const flipCard = card => {
        state.flippedCards++
        state.totalFlips++
        if (!state.gameStarted) {
            startGame()
        }

        if (state.flippedCards <= 2) {
            card.classList.add('flipped')
        }

        if (state.flippedCards === 2) {
            const flippedCards = document.querySelectorAll('.flipped:not(.matched)')

            if (flippedCards[0].attributes.getNamedItem("data-attr-valor").value === flippedCards[1].attributes.getNamedItem("data-attr-valor").value) {
                console.log('gano')
            // if (valor1 === valor2) {
                flippedCards[0].classList.add('matched')
                flippedCards[1].classList.add('matched')
                flippedCards[0].classList.add('scale-trans')
                flippedCards[1].classList.add('scale-trans')
                setTimeout(() => {
                    flippedCards[0].classList.add('none-visibiliti')
                    flippedCards[1].classList.add('none-visibiliti')
                    flippedCards[0].classList.remove('scale-trans')
                    flippedCards[1].classList.remove('scale-trans')
                    // mover a vista premiación
                    document.getElementById("win-game").classList.add('d-block')
                    document.getElementById("win-game").classList.remove('d-none')
                    // ocultar
                    document.getElementById("contenido_juego").classList.remove('d-block')
                    document.getElementById("contenido_juego").classList.add('d-none')
                }, 1500);
            } else {
                const turno = document.getElementsByClassName('turno');
                const error = document.getElementsByClassName('error');
                // console.log('perdio')
                nErrores++
                error[0].innerHTML = `ERRORES: ${nErrores}`;
                setTimeout(() => {
                    // mover a vista premiación
                    document.getElementById("win-game").classList.add('d-block')
                    document.getElementById("win-game").classList.remove('d-none')
                    // ocultar
                    document.getElementById("contenido_juego").classList.remove('d-block')
                    document.getElementById("contenido_juego").classList.add('d-none')

                    document.getElementById("premio_img").src = "{{ $urlSigue }}";
                    document.getElementById("h4Premio").textContent = 'Sigue Intentando'
                }, 1500);
            }

            setTimeout(() => {
                flipBackCards()
                // if (nErrores === 1) {
                    // alert("Perdistes")
                    nErrores = 0;
                    const flippedCards2 = document.querySelectorAll('.card')
                    flippedCards2.forEach(value => { 
                        value.classList.remove("none-visibiliti")
                        value.classList.remove("matched")
                        value.classList.remove("flipped")
                    })
                    const error = document.getElementsByClassName('error');
                    error[0].innerHTML = `ERRORES: ${nErrores}`;
                    generateGame()
                // }
            }, 1000)

        }
        if (!document.querySelectorAll('.card:not(.flipped)').length) {
            setTimeout(() => {
                selectors.boardContainer.classList.add('flipped')
                // selectors.win.innerHTML = `
                //     <span class="win-text">
                //         You won!<br />
                //         with <span class="highlight">${state.totalFlips}</span> moves<br />
                //         under <span class="highlight">${state.totalTime}</span> seconds
                //     </span>
                // `
                selectors.contenido_juego.classList.add('d-none')
                selectors.win.classList.remove('d-none')
                selectors.win.classList.add('d-block')

                clearInterval(state.loop)
            }, 1000)
        }
    }

    const attachEventListeners = () => {
        document.addEventListener('click', event => {
            const eventTarget = event.target
            const eventParent = eventTarget.parentElement
            if (event.target.classList.contains('card-front')) {
                if (eventTarget.className.includes('card') && !eventParent.className.includes('flipped')) {
                    flipCard(eventParent)
                } else if (eventTarget.nodeName === 'BUTTON' && !eventTarget.className.includes('disabled')) {
                    startGame()
                }
            }
        })
    }

    document.getElementsByClassName('turno')[0].innerHTML = `TURNOS: ${maxTurno}`;
    generateGame()
    attachEventListeners()
</script>

<script>
    const winGame = document.getElementById("win-game");
    const contenido_juego = document.getElementById("contenido_juego");

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

        winGame.classList.add('d-block'); 
        winGame.classList.remove('d-none'); 
        contenido_juego.classList.remove('d-block'); 
        contenido_juego.classList.add('d-none'); 
    })
    back_encabezado.addEventListener('click', () => {
        encabezado.classList.remove('d-block'); 
        encabezado.classList.add('d-none'); 
        
        winGame.classList.remove('d-block'); 
        winGame.classList.add('d-none'); 
        contenido_juego.classList.add('d-block'); 
        contenido_juego.classList.remove('d-none'); 
        retornoMenuEdit();
    })

    const politicas = document.getElementById("politicas");
    const back_politicas = document.getElementById("back_politicas");
    const politicas_menu = document.getElementById("politicas-menu");
    const poltica_privacidad = document.getElementById("poltica-privacidad");

    politicas_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        politicas.classList.add('d-block'); 
        politicas.classList.remove('d-none'); 
        poltica_privacidad.classList.remove('d-none'); 
        
        contenido_juego.classList.remove('d-block'); 
        contenido_juego.classList.add('d-none'); 
    })
    back_politicas.addEventListener('click', () => {
        politicas.classList.remove('d-block'); 
        politicas.classList.add('d-none'); 
        poltica_privacidad.classList.add('d-none'); 
        
        contenido_juego.classList.add('d-block'); 
        contenido_juego.classList.remove('d-none'); 
        retornoMenuEdit();
    })

    const terminos = document.getElementById("terminos");
    const back_terminos = document.getElementById("back_terminos");
    const terminos_menu = document.getElementById("terminos-menu");
    const terminos_condiciones = document.getElementById("terminos-condiciones");
    
    terminos_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        terminos.classList.add('d-block'); 
        terminos.classList.remove('d-none'); 
        terminos_condiciones.classList.remove('d-none'); 
        
        contenido_juego.classList.remove('d-block'); 
        contenido_juego.classList.add('d-none'); 
    })
    back_terminos.addEventListener('click', () => {
        terminos.classList.remove('d-block'); 
        terminos.classList.add('d-none'); 
        terminos_condiciones.classList.add('d-none'); 
        
        contenido_juego.classList.add('d-block'); 
        contenido_juego.classList.remove('d-none'); 
        retornoMenuEdit();
    })
</script>
<script>
    
    const juego_memorio_content = document.getElementById("juego_memorio_content")
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
                juego_memorio_content.style.backgroundImage = `url(${e.target.result})`;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    // =================================================================
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

    // =================================================================

    const logo_memoria = document.getElementById("logo_memoria")
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
                logo_memoria.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    // =================================================================

    const imagen_1 = document.querySelectorAll(".imagen_1")
    document.getElementById('imagen-1-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-imagen-1');
                const upload = document.getElementById('upload-imagen-1')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                imagen_1.forEach(img => {
                    img.src = e.target.result;
                })
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    // =================================================================

    const imagen_2 = document.querySelectorAll(".imagen_2")
    document.getElementById('imagen-2-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-imagen-2');
                const upload = document.getElementById('upload-imagen-2')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                imagen_2.forEach(img => {
                    img.src = e.target.result;
                })
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    // =================================================================


    const imagen_3 = document.querySelectorAll(".imagen_3")
    document.getElementById('imagen-3-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-imagen-3');
                const upload = document.getElementById('upload-imagen-3')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                imagen_3.forEach(img => {
                    img.src = e.target.result;
                })
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });
    // =================================================================

    const imagen_4 = document.querySelectorAll(".imagen_4")
    document.getElementById('imagen-4-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-imagen-4');
                const upload = document.getElementById('upload-imagen-4')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                imagen_4.forEach(img => {
                    img.src = e.target.result;
                })
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });
    // =================================================================

    const imagen_5 = document.querySelectorAll(".imagen_5")
    document.getElementById('imagen-5-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-imagen-5');
                const upload = document.getElementById('upload-imagen-5')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                imagen_5.forEach(img => {
                    img.src = e.target.result;
                })
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });
    // =================================================================

    const imagen_6 = document.querySelectorAll(".imagen_6")
    document.getElementById('imagen-6-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-imagen-6');
                const upload = document.getElementById('upload-imagen-6')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                imagen_6.forEach(img => {
                    img.src = e.target.result;
                })
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });
</script>

<script>
        
        const img_header_premio = document.getElementById("img-header-premio")
        document.getElementById('gano-subir').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const preview = document.getElementById('preview-gano');
                    const upload = document.getElementById('upload-gano')
                    const parentElement = preview.parentNode;
                    preview.src = e.target.result; // Establece la fuente de la imagen
                    preview.style.display = 'block'; // Muestra la imagen
                    upload.classList.add("d-none")
                    img_header_premio.src = e.target.result;
                };

                reader.readAsDataURL(file); // Lee la imagen como una URL de datos
            }
        });
        // tamaño titulo
        const verBoton1 = document.getElementById("verBoton1")
        const verBoton2 = document.getElementById("verBoton2")
        const btn_content = document.getElementById("btn_content");

        verBoton1.addEventListener("change", function() {
            btn_content.classList.remove('d-flex')
            btn_content.classList.add('d-none')
        })
        verBoton2.addEventListener("change", function() {
            btn_content.classList.remove('d-none')
            btn_content.classList.add('d-flex')
        })

        const color_texto_btn = document.getElementById('color-texto-btn')
        const color_btn = document.getElementById('color-btn')
        const btn_memoria = document.querySelectorAll(".btn-memoria")

        color_texto_btn.addEventListener("input", function(event) {
            color_btn.value = event.target.value
            btn_memoria.forEach(btn => {
                btn.style.color = event.target.value
            })
        })

        color_btn.addEventListener('input', function(event) {
            color_texto_btn.value = this.value
            btn_memoria.forEach(btn => {
                btn.style.color = this.value
            })
        })

        const color_btn_bg_input = document.getElementById('color-btn-bg-input')
        const color_btn_bg = document.getElementById('color-btn-bg')

        color_btn_bg_input.addEventListener("input", function(event) {
            color_btn_bg.value = event.target.value
            console.log(event.target.value)
            btn_memoria.forEach(btn => {
                btn.style.backgroundColor = event.target.value
            })
        })

        color_btn_bg.addEventListener('input', function(event) {
            color_btn_bg_input.value = this.value
            btn_memoria.forEach(btn => {
                btn.style.backgroundColor = this.value
            })
        })
</script>

<script>
    
    // const img_header_premio = document.getElementById("img-header-premio")
    document.getElementById('sigue-intentando-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-sigue');
                const upload = document.getElementById('upload-sigue')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                // img_header_premio.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });
</script>
@endsection


@section('script_jquery')
<script>
    $(document).ready(function () {
        $("#guardar-memoria").on('click', function () {
            $("#form-memoria").submit();
        });

        $("#form-memoria").on('submit', function (e) {
            e.preventDefault();

            var arrayPremiosValue = []

            var formData = new FormData(this);
            for (const [key, value] of formData.entries()) {
                if (key.includes('premio_id')) {
                    arrayPremiosValue.push(`${value}`);
                }
            }
            formData.append('arrayPremiosValue', arrayPremiosValue);
        
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
                    Swal.fire({
                        icon: 'success',
                        title: 'Cambios guardados'
                    }).then((swal) => {
                        if (swal.isConfirmed || swal.isDenied || swal.isDismissed) {
                            location.reload();
                        }
                    })
                }
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

    });
</script>
<script>
    $(document).ready(function () {
        $("#collapseOneGame").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOneGame").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOneGame").show("fast");
            }
        })
        $("#collapseTwoGame").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoGame").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoGame").show("fast");
            }
        })
        $("#collapseThreeGame").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreeGame").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreeGame").show("fast");
            }
        })
        $("#collapseFourGame").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseFourGame").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseFourGame").show("fast");
            }
        })
        //
        $("#collapseOnePremio").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseOnePremio").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseOnePremio").show("fast");
            }
        })
        $("#collapseTwoPremio").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoPremio").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoPremio").show("fast");
            }
        })
        $("#collapseThreePremio").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreePremio").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreePremio").show("fast");
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
    $("#politicas_text").on('keyup', function (e) {
        const valor = e.target.value;
        var textoPoliticas = valor.toString();
        const texto =  textoPoliticas.replace(/\n/g, '<br>')
        $("#politicas_value").val(texto);
        $("#text_politicas").html(texto)
    });
    $("#terminos_text").on('keyup', function (e) {
        const valor = e.target.value;
        var textoPoliticas = valor.toString();
        const texto =  textoPoliticas.replace(/\n/g, '<br>')
        $("#terminos_value").val(texto);
        $("#text_terminos").html(texto)
    });

    $("#color-politica-btn").on('input', function (event) {
        $("#politica-btn").val(event.target.value);
        $(".text_politicas_color").css('color', event.target.value);
        $(".text_politicas_color").css('border-color', event.target.value);
        $(".btn_politicas").css('background-color', event.target.value);
    });

    $("#politica-btn").on('input', function (event) {
        $("#color-politica-btn").val(event.target.value);
        $(".text_politicas_color").css('color', event.target.value);
        $(".text_politicas_color").css('border-color', event.target.value);
        $(".btn_politicas").css('background-color', event.target.value);
    });

    $("#color-termino-btn").on('input', function (event) {
        $("#termino-btn").val(event.target.value);
        $(".text_terminos_color").css('color', event.target.value);
        $(".text_terminos_color").css('border-color', event.target.value);
        $(".btn_terminos").css('background-color', event.target.value);
    });

    $("#termino-btn").on('input', function (event) {
        $("#color-termino-btn").val(event.target.value);
        $(".text_terminos_color").css('color', event.target.value);
        $(".text_terminos_color").css('border-color', event.target.value);
        $(".btn_terminos").css('background-color', event.target.value);
    });
</script>
@endsection