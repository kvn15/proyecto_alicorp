@extends('admin.pages.inicio.layout')


@php
    $project = $data["project"]; 
    $gameRuleta = $data["gameRuleta"]; 
    $projectPremio = $data["projectPremio"]; 
    $premioSelect = $data["premio"]; 
    $premioRuleta = $data["premioRuleta"];
    $sigueIntentando = $data["sigueIntentando"];

    $urlSigue = isset($sigueIntentando["imagen"]) && !empty($sigueIntentando["imagen"]) ? '/storage/'.$sigueIntentando["imagen"] : '';
    $urlSigue2 = isset($sigueIntentando["imagen_no_premio"]) && !empty($sigueIntentando["imagen_no_premio"]) ? '/storage/'.$sigueIntentando["imagen_no_premio"] : '';
    $imgSigue = isset($sigueIntentando["imagen"]) && !empty($sigueIntentando["imagen"]) ? '/storage/'.$sigueIntentando["imagen"] : asset('backend/svg/img-null.svg');
    $imgSigue2 = isset($sigueIntentando["imagen_no_premio"]) && !empty($sigueIntentando["imagen_no_premio"]) ? '/storage/'.$sigueIntentando["imagen_no_premio"] : asset('backend/svg/img-null.svg');
@endphp

@section('header_left')
  <span>{{ $project->project_type->name }} > <b>{{ $project->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
<button type="submit" class="btn btn-alicorp" id="guardar-ruleta">
    Guardar
</button>
@endsection

@section("inicio_dash")
@php
    $imgNulo = asset('backend/svg/img-null.svg');
@endphp
<style>
    .content-game {
        height: 100%;
    }
    .header {
        padding: 40px;
        color: #fff;
        margin: 0 auto;
        margin-bottom: 10px;
    }
    .header h1 {
        text-align: center;
    }
    .wheel {
        display: flex;
        justify-content: center;
        position: relative;
        transform: rotate(270deg);
    }
    .center-circle {
        width: 500px;
        height: 100%;
        border-radius: 50%;
        background-color: transparent;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        border: 20px solid #F8B903;
    }
    .triangle {
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 15px solid transparent;
        border-right: 30px solid #F8B903;
        position: absolute;
        top: 50%;
        right: 0%;
        transform: translateY(-41%);
    }
    textarea {
        background-color: rgba(20, 20, 20, 0.2);
        caret-color: #fff;
        resize: none;
        color: #fff;
    }
    .inputArea {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    canvas {
        width: 100%;
        max-width: 500px !important;
    }
</style>
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

        .fs-0 {
            font-size: 5em;
        }

        #inicio_juego {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4em;
        }

        .ctn-data {
            width: 100%;
            max-width: 490px;
            margin-right: auto;
        }

        .btn-jugar {
            width: 190px;
            height: 50px;
            border-radius: 25px;
            background-color: #F8B903;
            color: #000;
            font-weight: 700;
            font-size: 18px;
            border: 0;
            margin-top: 50px;
        }

        .btn-girar {
            width: 120px;
            height: 30px;
            border-radius: 25px;
            background-color: #F8B903;
            color: #000;
            font-weight: 700;
            font-size: 15px;
            border: 0;
        }
        .fs-1 {
            font-size: 3rem !important;
        }

        .content_premio {
            width: 100%;
            max-width: 500px;
            margin: auto;
            text-align: center;
        }

        .content_premio .content_premio_img {
            text-align: center;
        }

        .content_premio_img {
            position: relative;
            background-color: #e4eeea;
            border-radius: 50%;
            width: 380px;
            height: 380px;
            margin: auto;
        }

        .content_premio_img img {
            position: absolute;
            left: 0;
            top: 5%;
        }

        .content_premio h5 {
            color: #fff;
            font-size: 1.8em;
            margin: 0.5em 0;
            margin-bottom: 1.5em;
        }

        .btn_premio {
            background-color: #F8B903;
            color: #000;
            font-weight: 600;
            padding: 0.2em 0.8em;
            border-radius: 25px;
            border: 0;
        }
        #fin_juego {
            height: 100%;
            display: flex;
            align-items: center;
        }
.d-none-2 {
    display: none;
}
.img-subir {
    position: relative;
}
.btn-delete-img, .btn-delete-img_upload, .btn-delete-img_upload2 {
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
    $gameRuleta = $data["gameRuleta"];
    $principalData = isset($gameRuleta["titulo_inicio"]) ? json_decode($gameRuleta["titulo_inicio"], true) : null;
    $principalData2 = isset($gameRuleta["titulo_juego"]) ? json_decode($gameRuleta["titulo_juego"], true) : null;
    $principalData3 = isset($gameRuleta["boton_premio"]) ? json_decode($gameRuleta["boton_premio"], true) : null;
    
    // titulo
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

    $styleTamano = $tamanoTexto == 1 ? "fs-6" : ($tamanoTexto == 2 ? "fs-3"  :  ($tamanoTexto == 3 ? "fs-0"  : ""));
    $styleAlineacion = $alineacion == 1 ? "text-start" : ($alineacion == 2 ? "text-center"  :  ($alineacion == 3 ? "text-end"  : "text-center"));

    /// ========
    // titulo
    // valores
    $boldTituloGame = isset($principalData2["bold-titulo-parrafo-game"]) ? ($principalData2["bold-titulo-parrafo-game"] == 1 ? "checked" : "") : "";
    $italicTituloGame = isset($principalData2["italic-titulo-parrafo-game"]) ? ($principalData2["italic-titulo-parrafo-game"] == 1 ? "checked" : "") : "";
    $tituloTextoGame = isset($principalData2["texto-header-game"]) ? $principalData2["texto-header-game"]  : "";
    
    $tamanoTextoGame = isset($principalData2["tamanoTextoGame"]) ? $principalData2["tamanoTextoGame"] : "";
    $tamano1Game = $tamanoTextoGame == 1 ? 'checked' : "";
    $tamano2Game = $tamanoTextoGame == 2 ? 'checked' : "";
    $tamano3Game = $tamanoTextoGame == 3 ? 'checked' : "";
    
    $alineacionGame = isset($principalData2["alineacionTextoGame"]) ? $principalData2["alineacionTextoGame"] : "";
    $alineacion1Game = $alineacionGame == 1 ? 'checked' : "";
    $alineacion2Game = $alineacionGame == 2 ? 'checked' : "";
    $alineacion3Game = $alineacionGame == 3 ? 'checked' : "";

    $colorGame = isset($principalData2["color-texto-game"]) ? $principalData2["color-texto-game"] : "#FFFFFF";

    // fw-bold
    $styleBoldGame = isset($principalData2["bold-titulo-parrafo-game"]) ? ($principalData2["bold-titulo-parrafo-game"] == 1 ? "fw-bold" : "") : "";
    $italicTituloGame = isset($principalData2["italic-titulo-parrafo-game"]) ? ($principalData2["italic-titulo-parrafo-game"] == 1 ? "fst-italic" : "") : "";

    $styleTamanoGame = $tamanoTextoGame == 1 ? "fs-6" : ($tamanoTextoGame == 2 ? "fs-3"  :  ($tamanoTextoGame == 3 ? "fs-1"  : ""));
    $styleAlineacionGame = $alineacionGame == 1 ? "text-start" : ($alineacionGame == 2 ? "text-center"  :  ($alineacionGame == 3 ? "text-end"  : "text-center"));

    // ===
    // Premios BOTONES
    $verBotones = isset($principalData3["verBoton"]) ? $principalData3["verBoton"] : "";
    $verBotones1 = $verBotones == 1 ? 'checked' : "";
    $verBotones2 = $verBotones == 2 ? 'checked' : "";
    $styleBotones =  $verBotones == 1 ? 'd-none' : 'd-flex';

    $btnBg = isset($principalData3["color-btn-bg-input"]) ? $principalData3["color-btn-bg-input"] : "#F8B903";
    $btnColor = isset($principalData3["color-texto-btn"]) ? $principalData3["color-texto-btn"] : "#000";

    // Imagenes
    $fondo = isset($gameRuleta["fondo"]) && !empty($gameRuleta["fondo"]) ? '/storage/'.$gameRuleta["fondo"] : $imgNulo;
    $fondo_url = isset($gameRuleta["fondo"]) && !empty($gameRuleta["fondo"]) ? '/storage/'.$gameRuleta["fondo"] : "" ;

    $logo_inicio = isset($gameRuleta["logo_inicio"]) && !empty($gameRuleta["logo_inicio"]) ? '/storage/'.$gameRuleta["logo_inicio"] : $imgNulo;
    $logo_inicio_url = isset($gameRuleta["logo_inicio"]) && !empty($gameRuleta["logo_inicio"]) ? '/storage/'.$gameRuleta["logo_inicio"] : "" ;


    $logo_juego = isset($gameRuleta["logo_juego"]) && !empty($gameRuleta["logo_juego"]) ? '/storage/'.$gameRuleta["logo_juego"] : $imgNulo;
    $logo_juego_url = isset($gameRuleta["logo_juego"]) && !empty($gameRuleta["logo_juego"]) ? '/storage/'.$gameRuleta["logo_juego"] : "" ;

    $titulo_premio = isset($gameRuleta["titulo_premio"]) && !empty($gameRuleta["titulo_premio"]) ? '/storage/'.$gameRuleta["titulo_premio"] : $imgNulo;
    $titulo_premio_url = isset($gameRuleta["titulo_premio"]) && !empty($gameRuleta["titulo_premio"]) ? '/storage/'.$gameRuleta["titulo_premio"] : "" ;
@endphp
@php
    $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';
@endphp
<div class="container-fluid" style="overflow: auto;">
    <div class="row">
        <form id="form-ruleta" action="{{ route($tipoJuego."juego3.post.registro.personalizar", $project->id) }}" method="POST" enctype="multipart/form-data" class="col-3 border-end" style="overflow-y: scroll; height: 100vh;">
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
                            <img src="{{asset('backend/svg/boton.svg')}}" alt="svg imagen">
                            <small>Botón</small>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom cursor" id="encabezado-menu">
                    <p class="mb-0"><b>Vista Gira</b></p>
                    <ul class="list-unstyled ps-4">
                        <li>
                            <img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion">
                            <small>Sección Gira</small>
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
                            <small>Bloque Elementos de juego</small>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom cursor" id="premiacion-menu">
                    <p class="mb-0"><b>Vista Premiación</b></p>
                    <ul class="list-unstyled ps-4">
                        <li>
                            <img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg imagen">
                            <small>Bloque Premios</small>
                        </li>
                        <li>
                            <img src="{{asset('backend/svg/boton.svg')}}" alt="svg imagen">
                            <small>Botón</small>
                        </li>
                        <li>
                            <img src="{{asset('backend/svg/boton.svg')}}" alt="svg imagen">
                            <small>Botón</small>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-none" id="pagina_principal">
                <div class="border-bottom py-2">
                    <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_principal"><i class="fas fa-chevron-left"></i> Pagina Principal</button>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseOneGame" >
                        <p class="mb-0"><b><img src="{{asset('backend/svg/vector-seccion.svg')}}" alt="svg seccion"> <small>Vista Principal</small></b></p>
                    </button>
    
                    <ul class="list-unstyled ps-4 mt-2 collapseOneGame">
                        <li>
                            <p class="mb-2">Fondo</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="banner-subir">
                                    <div class="cursor">
                                        <div id="upload-banner" class="{{ isset($fondo_url) && !empty($fondo_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 1,000x1,000px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-banner" src="{{ $fondo_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="banner-subir" id="banner-subir">
                                <input type="hidden" name="banner-subir-url" id="banner-subir-url" value="{{ $fondo_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom d-none">
                    <button class="header-edit-web" type="button"  id="collapseTwoGame">
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
                            <input type="text" class="form-control p-2" id="texto-header" name="texto-header" value="GIRA Y GANA CON" value="{{ $tituloTexto }}">
                        </li>
                        <li class="my-2">
                            <p class="my-1">Tamaño Texto</p>
                            
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto1" autocomplete="off" value="1" {{ $tamano1 }}>
                                <label class="btn btn-outline-text" for="tamanoTexto1"><small><b>Chico</b></small></label>
                              
                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto2" autocomplete="off" value="2" {{ $tamano2 }}>
                                <label class="btn btn-outline-text" for="tamanoTexto2"><small><b>Mediano</b></small></label>
                              
                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto3" autocomplete="off" value="3" {{ $tamano3 }}>
                                <label class="btn btn-outline-text" for="tamanoTexto3"><small><b>Grande</b></small></label>
                            </div>
    
                        </li>
                        <li class="my-2">
                            <p class="my-1">Alineación</p>
                            
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto1" autocomplete="off" value="1" {{ $alineacion1 }}>
                                <label class="btn btn-outline-text" for="alineacionTexto1"><small><b><i class="fas fa-align-left"></i></b></small></label>
                              
                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto2" autocomplete="off" value="2" {{ $alineacion2 }}>
                                <label class="btn btn-outline-text" for="alineacionTexto2"><small><b><i class="fas fa-align-center"></i></b></small></label>
                              
                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto3" autocomplete="off" value="3" {{ $alineacion3 }}>
                                <label class="btn btn-outline-text" for="alineacionTexto3"><small><b><i class="fas fa-align-center"></i></b></small></label>
                            </div>
    
                        </li>
                        <li class="my-2">
                            <p class="my-1">Color</p>
                            
                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-texto-input" name="color-texto-input" value="{{ $color }}">
                                <input type="color" class="form-control form-control-color p-0" id="color-texto" name="color-texto" value="{{ $color }}">
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
                                        <div id="upload-logo" class="{{ isset($logo_inicio_url) && !empty($logo_inicio_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 1,000x1,000px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-logo" src="{{ $logo_inicio_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="logo-subir" id="logo-subir">
                                <input type="hidden" name="logo-subir-url" id="logo-subir-url" value="{{ $logo_inicio_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourGame" aria-expanded="true" aria-controls="collapseFourGame">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                    </button>
    
                    <ul class="list-unstyled ps-4 mt-2 collapse" id="collapseFourGame" >
                        <li>
                            <p class="mb-2">Imagen</p>
                            <div class="img-subir">
                                <label for="raspar-subir">
                                    <div class="cursor">
                                        <div id="upload-raspar">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 1,000x1,000px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-raspar">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="raspar-subir" id="raspar-subir">
                            </div>
                        </li>
                    </ul>
                </div> -->
            </div>
            <div class="d-none" id="encabezado">
                <div class="border-bottom py-2">
                    <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_encabezado"><i class="fas fa-chevron-left"></i> Vista Gira</button>
                </div>
                <div class="py-2 border-bottom d-none">
                    <button class="header-edit-web" type="button"  id="collapseTwoGame2">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/text.svg')}}" alt="svg seccion"> <small>Titulo</small></b></p>
                    </button>
                    <ul class="list-unstyled ps-4 d-none-2 collapseTwoGame2" >
                        <li class="my-2">
                            <p class="mb-1">Texto</p>
                            <div class="d-flex justify-content-start mb-2" style="gap: 1.2em;">
                                <div class="p-1 cursor bold">
                                    <input hidden type="checkbox" name="bold-titulo-parrafo-game" id="bold-titulo-parrafo-game" {{ $boldTituloGame }}>
                                    <label for="bold-titulo-parrafo-game" class="d-flex align-items-center cursor">
                                        <svg width="11" height="14" viewBox="0 0 11 14" xmlns="http://www.w3.org/2000/svg" id="svg_bold_texto">
                                            <path d="M8.6 6.79C9.57 6.12 10.25 5.02 10.25 4C10.25 1.74 8.5 0 6.25 0H0V14H7.04C9.13 14 10.75 12.3 10.75 10.21C10.75 8.69 9.89 7.39 8.6 6.79ZM3 2.5H6C6.83 2.5 7.5 3.17 7.5 4C7.5 4.83 6.83 5.5 6 5.5H3V2.5ZM6.5 11.5H3V8.5H6.5C7.33 8.5 8 9.17 8 10C8 10.83 7.33 11.5 6.5 11.5Z" fill="#98A2B3"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="p-1 cursor italic">
                                    <label for="italic-titulo-parrafo-game" class="d-flex align-items-center cursor">
                                        <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg" id="svg_italic_texto">
                                            <path d="M4 0V3H6.21L2.79 11H0V14H8V11H5.79L9.21 3H12V0H4Z" fill="#98A2B3"/>
                                        </svg>
                                    </label>
                                    <input hidden type="checkbox" name="italic-titulo-parrafo-game" id="italic-titulo-parrafo-game" {{ $italicTituloGame }}>
                                </div>
                            </div>
                            <input type="text" class="form-control p-2" id="texto-header-game" name="texto-header-game" value="GIRA Y GANA CON" value="{{ $tituloTextoGame }}">
                        </li>
                        <li class="my-2">
                            <p class="my-1">Tamaño Texto</p>
                            
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="tamanoTextoGame" id="tamanoTextoGame1" autocomplete="off" value="1" {{ $tamano1Game }}>
                                <label class="btn btn-outline-text" for="tamanoTextoGame1"><small><b>Chico</b></small></label>
                              
                                <input type="radio" class="btn-check" name="tamanoTextoGame" id="tamanoTextoGame2" autocomplete="off" value="2" {{ $tamano2Game }}>
                                <label class="btn btn-outline-text" for="tamanoTextoGame2"><small><b>Mediano</b></small></label>
                              
                                <input type="radio" class="btn-check" name="tamanoTextoGame" id="tamanoTextoGame3" autocomplete="off" value="3" {{ $tamano3Game }}>
                                <label class="btn btn-outline-text" for="tamanoTextoGame3"><small><b>Grande</b></small></label>
                            </div>
    
                        </li>
                        <li class="my-2">
                            <p class="my-1">Alineación</p>
                            
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="alineacionTextoGame" id="alineacionTextoGame1" autocomplete="off" value="1" {{ $alineacion1Game }}>
                                <label class="btn btn-outline-text" for="alineacionTextoGame1"><small><b><i class="fas fa-align-left"></i></b></small></label>
                              
                                <input type="radio" class="btn-check" name="alineacionTextoGame" id="alineacionTextoGame2" autocomplete="off" value="2" {{ $alineacion2Game }}>
                                <label class="btn btn-outline-text" for="alineacionTextoGame2"><small><b><i class="fas fa-align-center"></i></b></small></label>
                              
                                <input type="radio" class="btn-check" name="alineacionTextoGame" id="alineacionTextoGame3" autocomplete="off" value="3" {{ $alineacion3Game }}>
                                <label class="btn btn-outline-text" for="alineacionTextoGame3"><small><b><i class="fas fa-align-center"></i></b></small></label>
                            </div>
    
                        </li>
                        <li class="my-2">
                            <p class="my-1">Color</p>
                            
                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-texto-input-game" name="color-texto-input-game" value="{{ $colorGame }}">
                                <input type="color" class="form-control form-control-color p-0" id="color-texto-game" name="color-texto-game" value="{{ $colorGame }}">
                            </div>
    
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseThreeGame2">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg seccion"> <small>Logo</small></b></p>
                    </button>
    
                    <ul class="list-unstyled ps-4 mt-2 collapseThreeGame2" >
                        <li>
                            <p class="mb-2">Logo</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="logo-subir-game">
                                    <div class="cursor">
                                        <div id="upload-logo-game" class="{{ isset($logo_juego) && !empty($logo_juego) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 1,000x1,000px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-logo-game" src="{{ $logo_juego }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="logo-subir-game" id="logo-subir-game">
                                <input type="hidden" name="logo-subir-game-url" id="logo-subir-game-url" value="{{ $logo_juego }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseFourGame">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Elementos del juego</small></b></p>
                    </button>
    
                    <ul class="list-unstyled ps-4 mt-2 d-none-2 collapseFourGame" >
                        @foreach ($projectPremio as $value)
                        @php
                            $imgUrl = !empty($value["imagen"]) ? "/storage/".$value["imagen"] : ''
                        @endphp
                        <li class="mb-2">
                            <div id="premio_{{ $value->orden }}">

                                <input type="hidden" name="method" value="" class="method">
                                <input type="hidden" name="ruta_img" value="{{ route($tipoJuego."juego3.registroPremio.img", $value->id) }}" class="action">

                                <input hidden type="text" value="{{ $value->orden }}" class="input_value">
                                <p class="mb-2">Premio {{ $value->orden }} => {{ $value->nombre_premio }}</p>
                                <div class="img-subir">
                                    <button type="button" class="btn-delete-img_upload">X</button>
                                    <label for="premio-subir-{{ $value->orden }}">
                                        <div class="cursor">
                                            <div id="upload-premio-{{ $value->orden }}" class="{{ isset($imgUrl) && !empty($imgUrl) ? 'd-none' : '' }} upload_img">
                                                <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                                <h6>Click para Actualizar</h6>
                                                <p>PNG, JPG (max. 1,000x1,000px)</p>
                                            </div>
                                            <div>
                                                <img class="img-fluid" id="preview-premio-{{ $value->orden }}" src="{{ $imgUrl }}">
                                            </div>
                                        </div>
                                    </label>
                                    <input hidden type="file" name="premio_subir" id="premio-subir-{{ $value->orden }}" class="premio_upload">
                                    <input type="text" hidden name="premio_id_{{ $value->orden }}" id="premio_id_{{ $value->orden }}" value="{{ $value->orden }}|{{ $value->id }}">
                                    <input type="hidden" class="img_url_hidden" name="premio-subir-{{ $value->orden }}-url" id="premio-subir-{{ $value->orden }}-url" value="{{ $imgUrl }}">
                                </div>
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
                                            <p>PNG, JPG (max. 1,000x1,000px)</p>
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
            <div class="d-none" id="premiacion">
                <div class="border-bottom py-2">
                    <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_premiacion"><i class="fas fa-chevron-left"></i> Vista Premiación</button>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseOnePremio">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Premiación</small></b></p>
                    </button>
    
                    <ul class="list-unstyled ps-4 mt-2 collapseOnePremio" >
                        <li>
                            <p class="mb-2">Titulo Ganastes</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="premio-gano-subir">
                                    <div class="cursor">
                                        <div id="upload-premio-gano" class="{{ isset($titulo_premio) && !empty($titulo_premio) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 1,000x1,000px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-premio-gano" src="{{ $titulo_premio }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="premio-gano-subir" id="premio-gano-subir">
                                <input type="hidden" name="gano-subir-url" id="gano-subir-url" value="{{ $titulo_premio }}">
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
                                <input type="radio" class="btn-check" name="verBoton" id="verBoton1" autocomplete="off" value="1" {{ $verBotones1 }}>
                                <label class="btn btn-outline-text" for="verBoton1"><small><b>No</b></small></label>
                              
                                <input type="radio" class="btn-check" name="verBoton" id="verBoton2" autocomplete="off" value="2" {{ $verBotones2 }}>
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
                                <input type="color" class="form-control form-control-color p-0" id="color-btn-bg" name="color-btn-bg" value="{{ $btnBg }}">
                            </div>
    
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseFourGame2">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Premios</small></b></p>
                    </button>
    
                    <ul class="list-unstyled ps-4 mt-2 d-none-2 collapseFourGame2" >
                        @foreach ($projectPremio as $value)
                        @php
                            $imgUrl2 = !empty($value["imagen_premio"]) ? "/storage/".$value["imagen_premio"] : ''
                        @endphp
                        <li class="mb-2">
                            <div method="POST" id="premio_final_{{ $value->orden }}">
                               
                                <input type="hidden" name="method" value="" class="method">
                                <input type="hidden" name="ruta_img" value="{{ route($tipoJuego."juego3.registroPremioFinal.img", $value->id) }}" class="action">

                                <input hidden type="text" value="{{ $value->orden }}" class="input_value">
                                <p class="mb-2">Premio {{ $value->orden }} => {{ $value->nombre_premio }}</p>
                                <div class="img-subir">
                                    <button type="button" class="btn-delete-img_upload2">X</button>
                                    <label for="subir-premio-{{ $value->orden }}">
                                        <div class="cursor">
                                            <div id="premio-upload-{{ $value->orden }}" class="{{ isset($imgUrl2) && !empty($imgUrl2) ? 'd-none' : '' }} upload_img">
                                                <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                                <h6>Click para Actualizar</h6>
                                                <p>PNG, JPG (max. 1,000x1,000px)</p>
                                            </div>
                                            <div>
                                                <img class="img-fluid" id="premio-preview-{{ $value->orden }}" src="{{ $imgUrl2 }}">
                                            </div>
                                        </div>
                                    </label>
                                    <input hidden type="file" name="subir_premio" id="subir-premio-{{ $value->orden }}" class="premio_upload_2">
                                    <input type="hidden" name="subir_premio-{{ $value->orden }}-url" id="subir_premio-{{ $value->orden }}-url" value="{{ $imgUrl2 }}" class="img_url_hidden">
                                </div>
                            </div>
                        </li>
                        @endforeach
                        <li class="mb-2">
                            <p class="mb-2">Sigue Intentando</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="sigue-intentando-subir2">
                                    <div class="cursor">
                                        <div id="upload-sigue2" class="{{ isset($urlSigue2) && !empty($urlSigue2) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 1,000x1,000px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-sigue2" src="{{ $urlSigue2 }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="sigue-intentando-subir2" id="sigue-intentando-subir2">
                                <input type="hidden" name="sigue-intentando-subir-url2" id="sigue-intentando-subir-url2" value="{{ $urlSigue2 }}">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
        <div class="col-9 p-0">
            <div class="h-100" style="background-image: url({{ $fondo }}); background-size: cover;" id="juego_ruleta">
                <div id="inicio_juego" class=" d-none">
                    <div class="text-center ctn-data">
                        <h1 class="{{ $styleTamano }} mb-4 {{ $styleBold }} {{ $italicTitulo }} {{ $styleAlineacion }} d-none" id="titulo_header" style="color: #fff;"></h1>
                        <img style="width: 300px;" src="{{ $logo_inicio }}" alt="" id="logo_header">
                    </div>
                    <div class="w-100 d-flex justify-content-center">
                        <button class="btn-jugar" id="btn_header">JUGAR</button>
                    </div>
                </div>
                <div class="content-game" id="juego">
                    <div class="header text-center">
                        <h1 class="{{ $styleTamanoGame }} {{ $styleBoldGame }} {{ $italicTituloGame }} {{ $styleAlineacionGame }} d-none" id="titulo_juego" style="color: #fff;"></h1>
                        <img style="width: 170px;" src="{{ $logo_juego }}" alt="" id="logo_juego" style="max-width: 250px;">
                        <p id="winner" class="d-none">NONE</p>
                    </div>
                    <div class="w-100 d-flex justify-content-center">
                        <button type="button" class="mb-3 btn-girar" id="btn_girar">Girar</button>
                    </div>
                    <div style="overflow: hidden;" class="text-center">
                        <div class="wheel">
                            <canvas id="canvas" width="500" height="500"></canvas>
                            <div class="center-circle">
                                <div class="triangle"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="fin_juego" class="d-none">
                    <div class="content_premio">
                        <img class="img-fluid mb-3" src="{{ $titulo_premio }}" alt="" id="logo_ganaste" style="max-width: 350px;">
                        @php
                            $urlImagenPremio = isset($projectPremio[0]["imagen_premio"]) && !empty($projectPremio[0]["imagen_premio"]) ? '/storage/'.$projectPremio[0]["imagen_premio"] : $imgSigue2;
                        @endphp
                        <div class="content_premio_img">
                            <img class="img-fluid" src="{{ $urlImagenPremio }}" alt="" id="premio_first" style="max-width: 400px;">
                        </div>
                        <h5>{{ isset($projectPremio[0]["nombre_premio"]) ? $projectPremio[0]["nombre_premio"] : '' }}</h5>
                        <div class="{{ $styleBotones }} justify-content-center" style="gap: 0.4em;" id="btn_content">
                            <button type="button" class="btn_premio" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">IR A REGISTRO</button>
                            <button type="button" class="btn_premio" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">IR A HOME</button>
                            <button type="button" class="btn_premio" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">VOLVER A JUGAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('script_jquery')

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

        $("#inicio_juego").removeClass('d-none')
        $("#juego").addClass('d-none')
    })

    back_principal.addEventListener('click', () => {
        pagina_principal.classList.remove('d-block'); 
        pagina_principal.classList.add('d-none'); 
        retornoMenuEdit();

        $("#inicio_juego").addClass('d-none')
        $("#juego").removeClass('d-none')
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

    $("#premiacion-menu").click(() => {
        retornoMenuEditNone();
        $("#premiacion").removeClass('d-none')
        $("#juego").addClass('d-none')
        $("#fin_juego").removeClass('d-none')
    })

    $("#back_premiacion").click(function (e) { 
        retornoMenuEdit();
        $("#premiacion").addClass('d-none')
        $("#juego").removeClass('d-none')
        $("#fin_juego").addClass('d-none')
    });
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
<script>
    
    // const img_header_premio = document.getElementById("img-header-premio")
    document.getElementById('sigue-intentando-subir2').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-sigue2');
                const upload = document.getElementById('upload-sigue2')
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

<!-- Vista principal -->
<script>
    
    const juego_ruleta = document.getElementById("juego_ruleta")
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
                juego_ruleta.style.backgroundImage = `url(${e.target.result})`;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    // =================================================================
    const titulo_parrafo = document.getElementById('titulo_header')
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
        titulo_parrafo.classList.add('fs-0')
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

    const logo_header = document.getElementById("logo_header")
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
                logo_header.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

</script>
<script>

    // =================================================================
    const titulo_parrafo_game = document.getElementById('titulo_juego')
    const input_text_header_game = document.getElementById('texto-header-game')
    const bold_titulo_parrafo_game = document.getElementById('bold-titulo-parrafo-game')
    const italic_titulo_parrafo_game = document.getElementById('italic-titulo-parrafo-game')

    bold_titulo_parrafo_game.addEventListener('change', function(event) {
        console.log(this.checked)
        const svg_bold = document.querySelector('#svg_bold_texto path')
        if (this.checked) {
            titulo_parrafo_game.classList.add('fw-bold')
            svg_bold.setAttribute('fill', '#000');
        } else {
            titulo_parrafo_game.classList.remove('fw-bold')
            svg_bold.setAttribute('fill', '#98A2B3');
        }
    })

    italic_titulo_parrafo_game.addEventListener('change', function(event) {
        const svg_italic = document.querySelector('#svg_italic_texto path')
        if (this.checked) {
            titulo_parrafo_game.classList.add('fst-italic')
            svg_italic.setAttribute('fill', '#000');
        } else {
            titulo_parrafo_game.classList.remove('fst-italic')
            svg_italic.setAttribute('fill', '#98A2B3');
        }
    })

    input_text_header_game.addEventListener('input', function(event) {
        titulo_parrafo_game.innerText = event.target.value
    })

    // tamaño titulo
    const tamanoTextoGame1 = document.getElementById("tamanoTextoGame1")
    const tamanoTextoGame2 = document.getElementById("tamanoTextoGame2")
    const tamanoTextoGame3 = document.getElementById("tamanoTextoGame3")

    tamanoTextoGame1.addEventListener("change", function() {
        titulo_parrafo_game.classList.remove('fs-1')
        titulo_parrafo_game.classList.remove('fs-3')
        titulo_parrafo_game.classList.add('fs-6')
    })
    tamanoTextoGame2.addEventListener("change", function() {
        titulo_parrafo_game.classList.remove('fs-1')
        titulo_parrafo_game.classList.add('fs-3')
        titulo_parrafo_game.classList.remove('fs-6')
    })
    tamanoTextoGame3.addEventListener("change", function() {
        titulo_parrafo_game.classList.add('fs-1')
        titulo_parrafo_game.classList.remove('fs-3')
        titulo_parrafo_game.classList.remove('fs-6')
    })

    // alineacion
    const alineacionTextoGame1 = document.getElementById('alineacionTextoGame1')
    const alineacionTextoGame2 = document.getElementById('alineacionTextoGame2')
    const alineacionTextoGame3 = document.getElementById('alineacionTextoGame3')

    alineacionTextoGame1.addEventListener("change", function() {
        titulo_parrafo_game.classList.remove('text-end')
        titulo_parrafo_game.classList.remove('text-center')
        titulo_parrafo_game.classList.add('text-start')
    })
    alineacionTextoGame2.addEventListener("change", function() {
        titulo_parrafo_game.classList.remove('text-end')
        titulo_parrafo_game.classList.add('text-center')
        titulo_parrafo_game.classList.remove('text-start')
    })
    alineacionTextoGame3.addEventListener("change", function() {
        titulo_parrafo_game.classList.add('text-end')
        titulo_parrafo_game.classList.remove('text-center')
        titulo_parrafo_game.classList.remove('text-start')
    })

    // color
    const color_texto_input_game = document.getElementById('color-texto-input-game')
    const color_texto_game = document.getElementById('color-texto-game')

    color_texto_input_game.addEventListener("input", function(event) {
        color_texto_game.value = event.target.value
        titulo_parrafo_game.style.color = event.target.value
    })

    color_texto_game.addEventListener('input', function(event) {
        color_texto_input_game.value = this.value
        titulo_parrafo_game.style.color = this.value
    })

    const logo_juego = document.getElementById("logo_juego")
    document.getElementById('logo-subir-game').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-logo-game');
                const upload = document.getElementById('upload-logo-game')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                logo_juego.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

    // Premios
    // document.getElementById('logo-subir-1').addEventListener('change', function(event) {
    //     const file = event.target.files[0];
    //     if (file) {
    //         const reader = new FileReader();
            
    //         reader.onload = function(e) {
    //             const preview = document.getElementById('preview-logo-1');
    //             const upload = document.getElementById('upload-logo-1')
    //             const parentElement = preview.parentNode;
    //             preview.src = e.target.result; // Establece la fuente de la imagen
    //             preview.style.display = 'block'; // Muestra la imagen
    //             upload.classList.add("d-none")
    //             // logo_juego.src = e.target.result;
    //             recargarImagenes(e.target.result, 1)
    //         };

    //         reader.readAsDataURL(file); // Lee la imagen como una URL de datos
    //     }
    // });

</script>

<script>


    const logo_ganaste = document.getElementById("logo_ganaste")
    document.getElementById('premio-gano-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview-premio-gano');
                const upload = document.getElementById('upload-premio-gano')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")
                logo_ganaste.src = e.target.result;
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
    const btn_memoria = document.querySelectorAll(".btn_premio")

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
    $(document).ready(function () {

        var data = {!! json_encode($premioRuleta) !!};

        if (data.filter(d => d["img"] == '/storage/')) {
            data.forEach(d => {
                if(d["img"] == '/storage/') {
                    d["img"] = '{{ $imgNulo }}';
                }
            })
        }
        // var data = [
        //     {
        //         name: '2 entradas',
        //         img: '{{ $imgNulo }}'
        //     },
        //     {
        //         name: '2 sartenes',
        //         img: '{{ $imgNulo }}'
        //     },
        //     {
        //         name: '2 primor',
        //         img: '{{ $imgNulo }}'
        //     },
        //     {
        //         name: '4 oreos',
        //         img: '{{ $imgNulo }}'
        //     }
        // ]

        data.push({
            name: 'Sigue Intentando',
            img: '{{ $imgSigue }}'
        })

        function randomColor() {
            let r = Math.floor(Math.random() * 255);
            let g = Math.floor(Math.random() * 255);
            let b = Math.floor(Math.random() * 255);
            return { r, g, b };
        }
        function toRad(deg) {
            return deg * (Math.PI / 180.0);
        }
        function randomRange(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        function easeOutSine(x) {
            return Math.sin((x * Math.PI) / 2);
        }
        function getPercent(input, min, max) {
            return (((input - min) * 100) / (max - min)) / 100;
        }

        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");
        const width = canvas.width;
        const height = canvas.height;
        const centerX = width / 2;
        const centerY = height / 2;
        const radius = width / 2;

        // let items = document.getElementsByTagName("textarea")[0].value.split("\n").filter(item => item.trim() !== "");
        let items = data.map(d => d.name)
        let currentDeg = 0;
        let step = 360 / items.length;
        let colors = [];
        let itemDegs = {};
        let images = [];

        data.forEach(item => {
            const img = new Image();
            img.src = item.img == null ? '{{ $imgNulo }}' : item.img; // Ajusta la ruta de la imagen
            images.push(img);
        });

        for (let i = 0; i < items.length + 1; i++) {
            colors.push(randomColor());
        }

        function createWheel() {
            // items = document.getElementsByTagName("textarea")[0].value.split("\n").filter(item => item.trim() !== "");
            items = data.map(d => d.name)
            step = 360 / items.length;
            colors = [];
            for (let i = 0; i < items.length + 1; i++) {
                colors.push(randomColor());
            }
            draw();
        }

        // Dibuja la rueda al cargar la página
        document.addEventListener("DOMContentLoaded", createWheel);

        function draw() {
            ctx.clearRect(0, 0, width, height); // Limpiar el canvas
            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, toRad(0), toRad(360));
            ctx.lineTo(centerX, centerY);
            ctx.fill();

            let startDeg = currentDeg;
            for (let i = 0; i < items.length; i++, startDeg += step) {
                let endDeg = startDeg + step;
                const color = colors[i];
                const colorStyle = `#EAEAEA`;

                ctx.beginPath();
                ctx.arc(centerX, centerY, radius - 2, toRad(startDeg), toRad(endDeg));
                let colorStyle2 = i % 2 == 0 ? `#EAEAEA` : `#FFFFFF`;
                ctx.fillStyle = colorStyle2;
                ctx.lineTo(centerX, centerY);
                ctx.fill();

                // Draw text
                ctx.save();
                ctx.translate(centerX, centerY);
                ctx.rotate(toRad((startDeg + endDeg) / 2));
                ctx.fillStyle = "#000";
                ctx.font = 'bold 24px serif';
                ctx.restore();

                // Draw image
                const img = images[i % images.length]; // Asegúrate de tener imágenes suficientes
                ctx.save();
                ctx.translate(centerX, centerY);
                ctx.rotate(toRad((startDeg + endDeg) / 2 ));
                ctx.drawImage(img, 76, -60, 130, 130); // Ajusta las coordenadas y el tamaño de la imagen
                // ctx.drawImage(img, 100, 0,40, 40); // Ajusta la posición y tamaño
                ctx.restore();
                // Draw image

                itemDegs[items[i]] = {
                    "startDeg": startDeg,
                    "endDeg": endDeg
                };

                // // Check winner
                if (startDeg % 360 < 360 && startDeg % 360 > 270 && endDeg % 360 > 0 && endDeg % 360 < 90) {
                    document.getElementById("winner").innerHTML = items[i];
                }
            }
        }

        let speed = 0;
        let maxRotation = randomRange(360 * 3, 360 * 6);
        let pause = false;

        function animate() {
            if (pause) {
                return;
            }
            speed = easeOutSine(getPercent(currentDeg, maxRotation, 0)) * 20;
            if (speed < 0.01) {
                speed = 0;
                pause = true;
            }
            currentDeg += speed;
            draw();
            window.requestAnimationFrame(animate);
        }

        function spin() {
            if (speed != 0) {
                return;
            }
            maxRotation = 0;
            currentDeg = 0;
            createWheel(); // Llama a createWheel para asegurarte de que se dibuje antes de girar
            draw();
            const randomNum = getRandomNumber(1, 360);
            maxRotation = (360 * 8) - itemDegs[data[0].name].endDeg + randomNum;
            itemDegs = {};
            pause = false;
            window.requestAnimationFrame(animate);
        }

        function spin2() {
            console.log(data[0].name)
            maxRotation = 0;
            currentDeg = 0;
            createWheel(); // Llama a createWheel para asegurarte de que se dibuje antes de girar
            draw();

        }
        setTimeout(() => {
            spin2(); 
        },1000);
        function getRandomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function recargarImagenes(imgData, posicion) {
            images = []
            data[posicion].img = imgData
            console.log(data);
            data.forEach(item => {
                const img = new Image();
                console.log(item.img)
                img.src = item.img == null ? '{{ $imgNulo }}' : item.img; // Ajusta la ruta de la imagen
                images.push(img);
            });
            setTimeout(() => {
                spin2(); 
            },2000);
        }

        $("#btn_girar").click(function (e) { 
            e.preventDefault();
            spin();
        });

        $(document).on('click','.btn-delete-img_upload', function () {
            const premioUploadInput = $(this).parent().find('.premio_upload');
            const valor = $(this).parent().find('input[type="hidden"]');
            const valorImg = $(this).parent().find('.img-fluid');
            const upload_img = $(this).parent().find('.upload_img');
            const valor_file = $(this).parent().find('input[type="file"]');

            const orden = $(this).parent().parent().find(".input_value").val();
            const action = $(this).parent().parent().find(".action").val();
            const premio_subir_url = $(this).parent().find(".img_url_hidden").val();
            const token = $('input[name="_token"]').val();
            const method = $('input[name="_method"]').val();
            
            Swal.fire({
                icon: 'question',
                title: '¿Seguro de eliminar la imagen?',
                showConfirmButton: true,
                showCancelButton: true
            }).then((swal) => {
                if (swal.isConfirmed) {

                    const imagen = $(`#premio-subir-${orden}`)[0];

                    const formData = new FormData();
                    formData.append("_token", token)
                    formData.append("_method", method)
                    formData.append("premio_subir", null)
                    formData.append("premio_subir_url", null)
                    $.ajax({
                        url: action, // URL de la ruta
                        method: 'POST',
                        data: formData,
                        contentType: false, // Para enviar los datos como FormData
                        processData: false, // No procesar los datos
                        success: function(datas) {
                            // Procesar los datos devueltos
                            // toastr.success(data.message); 

                            // if (data) {
                            //     toastr.success('Cambios guadados correctamente'); 
                            // }
                            if (datas) {
                                valor.val("");
                                valorImg.attr('src', '')
                                upload_img.removeClass('d-none')
                                valor_file.val(null)
                                //
                                recargarImagenes(`{{ $imgNulo }}`, orden - 1)
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                            toastr.error('Ocurrió un error al procesar la solicitud.');
                        }
                    });
                }
            })
        });

        $(document).on('change','.premio_upload', function () {
            const orden = $(this).parent().parent().find(".input_value").val();
            const action = $(this).parent().parent().find(".action").val();
            const premio_subir_url = $(this).parent().find(".img_url_hidden").val();
            const token = $('input[name="_token"]').val();
            const method = $('input[name="_method"]').val();

            const imagen = $(`#premio-subir-${orden}`)[0];
            const inputImage = imagen.files[0] ? imagen.files[0] : null;

            const formData = new FormData();
            formData.append("_token", token)
            formData.append("_method", method)
            formData.append("premio_subir", inputImage)
            formData.append("premio_subir_url", premio_subir_url)
            $.ajax({
                url: action, // URL de la ruta
                method: 'POST',
                data: formData,
                contentType: false, // Para enviar los datos como FormData
                processData: false, // No procesar los datos
                success: function(datas) {
                    // Procesar los datos devueltos
                    // toastr.success(data.message); 

                    // if (data) {
                    //     toastr.success('Cambios guadados correctamente'); 
                    // }
                    if (datas) {
                        const preview = document.getElementById(`preview-premio-${orden}`);
                        const upload = document.getElementById(`upload-premio-${orden}`)
                        const parentElement = preview.parentNode;
                        preview.src = `/storage/${datas.ruta}`; // Establece la fuente de la imagen
                        preview.style.display = 'block'; // Muestra la imagen
                        upload.classList.add("d-none")
                        recargarImagenes(`/storage/${datas.ruta}`, orden - 1)
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                    toastr.error('Ocurrió un error al procesar la solicitud.');
                }
            });
        });

        $(document).on('click','.btn-delete-img_upload2', function () {
            const premioUploadInput = $(this).parent().find('.premio_upload');
            const valor = $(this).parent().find('input[type="hidden"]');
            const valorImg = $(this).parent().find('.img-fluid');
            const upload_img = $(this).parent().find('.upload_img');
            const valor_file = $(this).parent().find('input[type="file"]');

            const orden = $(this).parent().parent().find(".input_value").val();
            const action = $(this).parent().parent().find(".action").val();
            const premio_subir_url = $(this).parent().find(".img_url_hidden").val();
            const token = $('input[name="_token"]').val();
            const method = $('input[name="_method"]').val();

            const imagen = $(`#subir-premio-${orden}`)[0];
            const inputImage = imagen.files[0] ? imagen.files[0] : null;
            
            Swal.fire({
                icon: 'question',
                title: '¿Seguro de eliminar la imagen?',
                showConfirmButton: true,
                showCancelButton: true
            }).then((swal) => {
                if (swal.isConfirmed) {

                    const formData = new FormData();
                    formData.append("_token", token)
                    formData.append("_method", method)
                    formData.append("subir_premio", inputImage)
                    formData.append("subir_premio_url", premio_subir_url)
                    
                    $.ajax({
                        url: action, // URL de la ruta
                        method: 'POST',
                        data: formData,
                        contentType: false, // Para enviar los datos como FormData
                        processData: false, // No procesar los datos
                        success: function(datas) {
                            // Procesar los datos devueltos
                            // toastr.success(data.message); 

                            // if (data) {
                            //     toastr.success('Cambios guadados correctamente'); 
                            // }
                            if (datas) {
                                valor.val("");
                                valorImg.attr('src', '')
                                upload_img.removeClass('d-none')
                                valor_file.val(null)

                                const premio_first = document.getElementById('premio_first')
                                premio_first.src = `{{ $imgNulo }}`; // Establece la fuente de la imagen
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                            toastr.error('Ocurrió un error al procesar la solicitud.');
                        }
                    });
                    
                }
            })
        });

        $(document).on('change','.premio_upload_2', function () {
            const orden = $(this).parent().parent().find(".input_value").val();
            const action = $(this).parent().parent().find(".action").val();
            const premio_subir_url = $(this).parent().find(".img_url_hidden").val();
            const token = $('input[name="_token"]').val();
            const method = $('input[name="_method"]').val();

            const imagen = $(`#subir-premio-${orden}`)[0];
            const inputImage = imagen.files[0] ? imagen.files[0] : null;

            const formData = new FormData();
            formData.append("_token", token)
            formData.append("_method", method)
            formData.append("subir_premio", inputImage)
            formData.append("subir_premio_url", premio_subir_url)
            
            $.ajax({
                url: action, // URL de la ruta
                method: 'POST',
                data: formData,
                contentType: false, // Para enviar los datos como FormData
                processData: false, // No procesar los datos
                success: function(datas) {
                    // Procesar los datos devueltos
                    // toastr.success(data.message); 

                    // if (data) {
                    //     toastr.success('Cambios guadados correctamente'); 
                    // }
                    if (datas) {
                        const preview = document.getElementById(`premio-preview-${orden}`);
                        const upload = document.getElementById(`premio-upload-${orden}`)
                        const premio_first = document.getElementById('premio_first')
                        const parentElement = preview.parentNode;
                        preview.src = `/storage/${datas.ruta}`; // Establece la fuente de la imagen
                        premio_first.src = `/storage/${datas.ruta}`; // Establece la fuente de la imagen
                        preview.style.display = 'block'; // Muestra la imagen
                        upload.classList.add("d-none")
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                    toastr.error('Ocurrió un error al procesar la solicitud.');
                }
            });
        });


        $("#guardar-ruleta").on('click', function () {
            $("#form-ruleta").submit();
        });
        

        $("#form-ruleta").on('submit', function (e) {
            e.preventDefault();

            var arrayPremiosValue = []

            var formData = new FormData(this);
            
            // for (const [key, value] of formData.entries()) {
            //     console.log(`${key}: ${value}`)
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
        //
        $("#collapseTwoGame2").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseTwoGame2").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseTwoGame2").show("fast");
            }
        })
        $("#collapseThreeGame2").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseThreeGame2").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseThreeGame2").show("fast");
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

        $("#collapseFourGame2").click(function (e){
            if ($(this).hasClass("hidev")) {
                $(this).removeClass("hidev")
                $(this).addClass("showv")
                $(".collapseFourGame2").hide("fast");
            } else {
                $(this).removeClass("showv")
                $(this).addClass("hidev")
                $(".collapseFourGame2").show("fast");
            }
        })

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
    });
    $("#back_configuracion").click(function (e) { 
        e.preventDefault();
        window.location.href = '{{ $rutaCon }}'
    });
</script>
@endsection