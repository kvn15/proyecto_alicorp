@extends('admin.pages.inicio.layout')

@php
    $tipoPX = request('type') ?? "pc";
    $styleTipo = $tipoPX == 'movil' ? 'style_movile' : 'w-100';
@endphp

@php
    $project = $data["project"];
    $gameRaspaGana = $data["gameRaspaGana"];
    $projectPremio = $data["projectPremio"];
    $premioSelect = $data["premio"];
    $sigueIntentando = $data["sigueIntentando"];

    $urlSigue = isset($sigueIntentando["imagen"]) && !empty($sigueIntentando["imagen"]) ? '/storage/'.$sigueIntentando["imagen"] : '';
@endphp

@section('header_left')
  <span>{{ $project->project_type->name }} > <b>{{ $project->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex" style="gap: 0.8rem;">
    <button type="button" class="btn {{ $tipoPX == 'pc' ? 'btn-secondary' : 'btn-outline-secondary' }}" onclick="loadTipoFrame('pc')">
        <i class="fas fa-desktop"></i>
    </button>
    <button type="button" class="btn {{ $tipoPX == 'pc' ? 'btn-outline-secondary' : 'btn-secondary' }}" onclick="loadTipoFrame('movil')">
        <i class="fas fa-mobile-alt"></i>
    </button>
</div>
@endsection

@section('header_right')
<button type="submit" class="btn btn-alicorp" id="guardar-raspa-gana">
    Guardar
</button>
@endsection


@section('inicio_dash')
@php
$estiloFont = "";
switch ($project->tipo_letra) {
    case 'Times New Roman':
        $estiloFont = '--times';
        break;
    case 'Poppins':
        $estiloFont = '--popins';
        break;
    case 'Arial':
        $estiloFont = '--arial';
        break;
    case 'Verdana':
        $estiloFont = '--verdana';
        break;
    case 'Roboto':
        $estiloFont = '--roboto';
        break;
    case 'Courier New':
        $estiloFont = '--courier';
        break;
    case 'Montserrat':
        $estiloFont = '--Montserrat';
        break;
    case 'Bolivar':
        $estiloFont = '--bolivar';
        break;
    case 'Casino':
        $estiloFont = '--casino';
        break;
    case 'Casino2':
        $estiloFont = '--casino2';
        break;
    case 'Casino3':
        $estiloFont = '--casino3';
        break;
    case 'Alacena':
        $estiloFont = '--alacena';
        break;
    case 'Alacena2':
        $estiloFont = '--alacena2';
        break;
    case 'DV':
        $estiloFont = '--dv';
        break;
    case 'DV2':
        $estiloFont = '--dv2';
        break;
    default:
        $estiloFont = '--popins';
        break;
}
@endphp
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    :root {
        --popins: "Poppins", sans-serif;
        --arial: Arial, sans-serif;
        --courier: "Courier New", monospace;
        --verdana: Verdana, sans-serif;
        --times: 'Times New Roman', serif;
        --roboto: "Roboto", sans-serif;
        --montserrat: "Montserrat", sans-serif;
        --bolivar: 'VastagoGrotesk', sans-serif;
        --casino: 'Tungsten', sans-serif;
        --casino2: 'TungstenComp', sans-serif;
        --casino3: 'TungstenCondensed', sans-serif;
        --alacena: 'AlaFuente', sans-serif;
        --alacena2: 'BuenosAires', sans-serif;
        -dv: 'BrandonGrotesque', sans-serif;
        -dv2: 'Sansita', sans-serif;
    }
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body {
        height: 100vh;
    }
    .juego_casino_raspa{
        font-family: var({{$estiloFont}}) !important;
    }
    .container {
        /* width: 31em;
        height: 31em;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%; */
        /* border-radius: 0.6em; */
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 0.5rem;
    }
    .base,
    #scratch {
        height: 490px;
        width: 450px;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 60%;
        left: 50%;
        text-align: center;
        cursor: grabbing;
        border-radius: 0.3em;
    }

    .base {
        height: 72% !important;
        width: 89% !important;
        transform: rotate(-368deg);
        top: 20%;
        left: 5%;
    }

    .base {
        background-color: transparent;
        font-family: "Poppins", sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 0 1.2em 2.5em rgba(16, 2, 96, 0.15);
    }
    .base h3 {
        font-weight: 600;
        font-size: 1.5em;
        color: #17013b;
    }
    .base h4 {
        font-weight: 400;
        color: #746e7e;
    }
    #scratch {
        -webkit-tap-highlight-color: transparent;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        user-select: none;
        overflow: hidden;
    }

    .img-premio {
        width: 80%;
        height: 70%;
        margin: auto;
    }

    .text-header {
        text-align: center;
        /* padding: 2em; */
    }

    .text-header img  {
        width: 100%;
        /* min-width: 300px; */
        /* max-width: 500px; */
    }

    .btn-memoria {
        border: 0;
        padding: 0.5em 1em;
        color: #6661f5;
        font-weight: 600;
        font-size: 13px !important;
        border-radius: 36px;
        font-size: 1rem;
        margin: 10px 0.2em;
        text-decoration: none;
    }

    .btn-memoria:hover {
        color: #6661f5;
    }

    .btn_content {
        position: absolute;
        bottom: -3%;
        left: 50%;
        transform: translate(-50%, 50%);
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
            background-color: #ffffffec;
            color: #005adc !important;
            border-radius: 25px;
        }

        .content_politicas_terminos h1 {
            font-weight: 700;
            padding-bottom: 0.3em;
            font-size: 3em;
            border-bottom: 2px solid #005adc;
        }

        .content_politicas_terminos p {
            font-size: 22px;
            font-weight: 400;
        }

        .btn_politicas, .btn_terminos {
            background-color: #005adc;
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

        #cardRaspa {
            width: 450px;
            height: 450px;
            position: relative;
            user-select: none;
        }

        .style_movile {
            width: 450px;
            height: 850px;
            margin: 20px 0px;
            border: 8px solid #444444;
            border-radius: 20px;
            overflow: hidden;
        }

        .style_movile .height_game {
            height: 100%;
        }

        .style_movile #cardRaspa {
            width: 340px !important;
            height: 340px !important;
        }

        .style_movile .text-header {
            padding: 5% 0px;
        }

        .height_game {
            height: 100vh;
        }

        #card-raspa {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 1rem;
        }

        .style_movile #card-raspa {
            min-height: 100% !important;
        }

        .style_movile .content_politicas_terminos  {
            overflow: auto;
            padding: 1.5rem !important
        }
        .style_movile h1.text_politicas_color, .style_movile h1.text_terminos_color {
            font-size: 2em;
        }
        .style_movile .botonera-terminos {
            flex-direction: column;
            gap: 1rem;
        }
        .style_movile .botonera-terminos button,
        .style_movile .botonera-terminos a {
            font-size: 1.1rem !important;
        }

        .style_movile #poltica-privacidad, .style_movile #terminos-condiciones {
            padding-top: 10px;
            padding-bottom: 10px;
        }
</style>

<script>
    function subirImagenPremio (event, orden) {
        const premio_img = document.getElementById("premio_img")
        const premio_img_2 = document.getElementById("img-premio")
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
                    premio_img_2.src = e.target.result;
                }
            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    }
</script>

@php
    $rutaCon = route($project->project_type->ruta_name.'.show.overview', $project->id );

    $principal = isset($gameRaspaGana) ? $gameRaspaGana->titulo : '';
    $premio = isset($gameRaspaGana) ? $gameRaspaGana->boton_premios : '';
    $principalData = json_decode($principal, true);
    $premioData = json_decode($premio, true);
    $imgNulo = asset('backend/svg/img-null.svg');

    $fondo = isset($gameRaspaGana) && !empty($gameRaspaGana->fondo) ? "/storage/".$gameRaspaGana->fondo : $imgNulo;
    $fondo_url = isset($gameRaspaGana) && !empty($gameRaspaGana->fondo) ? '/storage/'.$gameRaspaGana->fondo : "" ;

    $logo_principal = isset($gameRaspaGana) && !empty($gameRaspaGana->logo_principal) ? "/storage/".$gameRaspaGana->logo_principal : $imgNulo;
    $logo_principal_url = isset($gameRaspaGana) && !empty($gameRaspaGana->logo_principal) ? '/storage/'.$gameRaspaGana->logo_principal : "" ;


    $imagen_raspar = isset($gameRaspaGana) && !empty($gameRaspaGana->imagen_raspar) ? "/storage/".$gameRaspaGana->imagen_raspar : $imgNulo;
    $imagen_raspar_url = isset($gameRaspaGana) && !empty($gameRaspaGana->imagen_raspar) ? '/storage/'.$gameRaspaGana->imagen_raspar : "" ;

    $titulo_subir = isset($gameRaspaGana) && !empty($gameRaspaGana->titulo_subir) ? "/storage/".$gameRaspaGana->titulo_subir : $imgNulo;
    $titulo_subir_url = isset($gameRaspaGana) && !empty($gameRaspaGana->titulo_subir) ? '/storage/'.$gameRaspaGana->titulo_subir : "" ;

    $titulo_ganastes = isset($gameRaspaGana) && !empty($gameRaspaGana->titulo_ganastes) ? "/storage/".$gameRaspaGana->titulo_ganastes : $imgNulo;
    $titulo_ganastes_url = isset($gameRaspaGana) && !empty($gameRaspaGana->titulo_ganastes) ? '/storage/'.$gameRaspaGana->titulo_ganastes : "" ;

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

    $styleTamano = $tamanoTexto == 1 ? "fs-6" : ($tamanoTexto == 2 ? "fs-3"  :  ($tamanoTexto == 3 ? "fs-1"  : ""));
    $styleAlineacion = $alineacion == 1 ? "text-start" : ($alineacion == 2 ? "text-center"  :  ($alineacion == 3 ? "text-end"  : "text-center"));

    // Premios BOTONES
    $verBotones = isset($premioData["verBoton"]) ? $premioData["verBoton"] : "";
    $verBotones1 = $verBotones == 1 ? 'checked' : "";
    $verBotones2 = $verBotones == 2 ? 'checked' : "";
    $styleBotones =  $verBotones == 1 ? 'd-none' : 'd-flex';

    $btnBg = isset($premioData["color-btn-bg-input"]) ? $premioData["color-btn-bg-input"] : "#fffff";
    $btnColor = isset($premioData["color-texto-btn"]) ? $premioData["color-texto-btn"] : "#d5542e";

    // premios img
    $imgPremio = isset($premioSelect["imagen"]) && !empty($premioSelect["imagen"]) ? "/storage/".$premioSelect["imagen"] : $imgNulo;
    $namePremio = isset($premioSelect["premio_nombre"]) && !empty($premioSelect["premio_nombre"]) ? $premioSelect["premio_nombre"] : '';
@endphp
@php
    $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';
@endphp

<div class="container-fluid">
    <div class="row">
        <form id="form-raspa-gana" action="{{ route($tipoJuego."juego2.post.registro.personalizar", $project->id) }}" method="POST" enctype="multipart/form-data" class="col-3 border-end" style="overflow-y: scroll; height: calc(100vh - 57px);">
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
                            <img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg imagen">
                            <small>Imagen a Raspar</small>
                        </li>
                        <li>
                            <img src="{{asset('backend/svg/boton.svg')}}" alt="svg imagen">
                            <small>Botón</small>
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
                    <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_principal"><i class="fas fa-chevron-left"></i> Pagina Principal</button>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseOneGame">
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
                                            <p>PNG, JPG (max. 1,500x1,060px)</p>
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
                            <input type="text" class="form-control p-2" name="texto-header" id="texto-header" value="{{ $tituloTexto }}">
                        </li>
                        <li class="my-2">
                            <p class="my-1">Tamaño Texto</p>

                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto1" autocomplete="off" {{ $tamano1 }}>
                                <label class="btn btn-outline-text" for="tamanoTexto1"><small><b>Chico</b></small></label>

                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto2" autocomplete="off" {{ $tamano2 }}>
                                <label class="btn btn-outline-text" for="tamanoTexto2"><small><b>Mediano</b></small></label>

                                <input type="radio" class="btn-check" name="tamanoTexto" id="tamanoTexto3" autocomplete="off" {{ $tamano3 }}>
                                <label class="btn btn-outline-text" for="tamanoTexto3"><small><b>Grande</b></small></label>
                            </div>

                        </li>
                        <li class="my-2">
                            <p class="my-1">Alineación</p>

                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto1" autocomplete="off" {{ $alineacion1 }}>
                                <label class="btn btn-outline-text" for="alineacionTexto1"><small><b><i class="fas fa-align-left"></i></b></small></label>

                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto2" autocomplete="off" {{ $alineacion2 }}>
                                <label class="btn btn-outline-text" for="alineacionTexto2"><small><b><i class="fas fa-align-center"></i></b></small></label>

                                <input type="radio" class="btn-check" name="alineacionTexto" id="alineacionTexto3" autocomplete="off" {{ $alineacion3 }}>
                                <label class="btn btn-outline-text" for="alineacionTexto3"><small><b><i class="fas fa-align-right"></i></b></small></label>
                            </div>

                        </li>
                        <li class="my-2">
                            <p class="my-1">Color</p>

                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-texto-input" name="color-texto-input" value="{{ $color }}">
                                <input type="color" class="form-control form-control-color p-0" name="color-texto" id="color-texto" value="{{ $color }}">
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
                                        <div id="upload-logo" class="{{ isset($logo_principal_url) && !empty($logo_principal_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 200x200px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-logo" src="{{ $logo_principal_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="logo-subir" id="logo-subir">
                                <input type="hidden" name="logo-subir-url" id="logo-subir-url" value="{{ $logo_principal_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseFourGame" >
                        <p class="mb-0"><b><img src="{{asset('backend/svg/logo-imagen.svg')}}" alt="svg seccion"> <small>Imagen a Raspar</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 d-none-2 collapseFourGame">
                        <li>
                            <p class="mb-2">Imagen</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="raspar-subir">
                                    <div class="cursor">
                                        <div id="upload-raspar" class="{{ isset($imagen_raspar_url) && !empty($imagen_raspar_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 1,000x1,000px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-raspar" src="{{ $imagen_raspar_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="raspar-subir" id="raspar-subir">
                                <input type="hidden" name="raspar-subir-url" id="raspar-subir-url" value="{{ $imagen_raspar_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-none" id="encabezado">
                <div class="border-bottom py-2">
                    <button type="button" class="border-0 w-100 text-start" style="background-color: #fff;" id="back_encabezado"><i class="fas fa-chevron-left"></i> Vista Premiación</button>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseOnePremio">
                        <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Premiación</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 collapseOnePremio" >
                        <li>
                            <p class="mb-2">Titulo Principal</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="gano-subir">
                                    <div class="cursor">
                                        <div id="upload-gano" class="{{ isset($titulo_subir_url) && !empty($titulo_subir_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 300x300px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-gano" src="{{ $titulo_subir_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="gano-subir" id="gano-subir">
                                <input type="hidden" name="gano-subir-url" id="gano-subir-url" value="{{ $titulo_subir_url }}">
                            </div>
                        </li>
                        <li>
                            <p class="mb-2">Titulo Ganastes</p>
                            <div class="img-subir">
                                <button type="button" class="btn-delete-img">X</button>
                                <label for="titulo-ganastes">
                                    <div class="cursor">
                                        <div id="upload-ganastes" class="{{ isset($titulo_ganastes_url) && !empty($titulo_ganastes_url) ? 'd-none' : '' }} upload_img">
                                            <img src="{{asset('backend/svg/ssubir.svg')}}" alt="">
                                            <h6>Click para Actualizar</h6>
                                            <p>PNG, JPG (max. 300x300px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-ganastes" src="{{ $titulo_ganastes_url }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="titulo-ganastes" id="titulo-ganastes">
                                <input type="hidden" name="titulo-ganastes-url" id="titulo-ganastes-url" value="{{ $titulo_ganastes_url }}">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseTwoPremio" >
                        <p class="mb-0"><b><img src="{{asset('backend/svg/boton.svg')}}" alt="svg seccion"> <small>Botón</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 d-none-2 collapseTwoPremio">
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
                                <input type="color" class="form-control form-control-color p-0" name="color-btn" id="color-btn" value="{{ $btnColor }}">
                            </div>

                        </li>
                        <li class="my-2">
                            <p class="my-1">Color Fondo</p>

                            <div class="d-flex" role="group" style="gap: 0.4em;">
                                <input type="text" class="form-control" id="color-btn-bg-input" name="color-btn-bg-input" value="{{ $btnBg }}">
                                <input type="color" class="form-control form-control-color p-0" name="color-btn-bg" id="color-btn-bg" value="{{ $btnBg }}">
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="py-2 border-bottom">
                    <button class="header-edit-web" type="button" id="collapseThreePremio" >
                        <p class="mb-0"><b><img src="{{asset('backend/svg/cuadro-titulo.svg')}}" alt="svg seccion"> <small>Bloque Premiación</small></b></p>
                    </button>

                    <ul class="list-unstyled ps-4 mt-2 d-none-2 collapseThreePremio">
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
                                            <p>PNG, JPG (max. 300x300px)</p>
                                        </div>
                                        <div>
                                            <img class="img-fluid" id="preview-premio-{{ $value->orden }}" src="{{ $imgUrl }}">
                                        </div>
                                    </div>
                                </label>
                                <input hidden type="file" name="premio-subir-{{ $value->orden }}" id="premio-subir-{{ $value->orden }}" onchange="subirImagenPremio(event, {{ $value->orden }})">
                                <input type="text" hidden name="premio_id_{{ $value->orden }}" id="premio_id_{{ $value->orden }}" value="{{ $value->orden }}|{{ $value->id }}">
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
                                            <p>PNG, JPG (max. 300x300px)</p>
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
                $politicas = isset($gameRaspaGana["politicas"]) && !empty($gameRaspaGana["politicas"]) && !empty(json_decode($gameRaspaGana["politicas"], true)['politicas_value']) ? json_decode($gameRaspaGana["politicas"], true)['politicas_value'] : 'Conste por el presente documento, yo ____________, identificado con _______________, (en adelante él/la "CEDENTE"), expresa su voluntad expresa de ceder de forma gratuita, a favor de ALICORP S.A.A., con RUC Nº 20100055237, con domicilio legal  en avenida Argentina 4793, Carmen de la Legua Reynoso, Callao y a sus subsidiarias (en adelante, ALICORP o la EMPRESA), los derechos de explotación y uso de su imagen, cesión que se realiza sin limitación alguna, de acuerdo al artículo 15 del código civil; en los términos que se detallan a continuación:
                        PRIMERO: OBJETO DE SESIÓN
                        <br>
                        <br>
                        1.1. Él, La CEDENTE cede y transfiere de forma total e integra, gratuita e ilimitada a nivel mundial, a LA EMPRESA todos los derechos de uso de su imagen que aparecerá en el video, fotografías y cualquier otro medio de captación de imágenes que elaborará y será de propiedad de LA EMPRESA.';
                $colorPolitica = isset($gameRaspaGana["politicas"]) && !empty($gameRaspaGana["politicas"]) && !empty(json_decode($gameRaspaGana["politicas"], true)['color-politica-btn']) ? json_decode($gameRaspaGana["politicas"], true)['color-politica-btn'] : '#2347fb';
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
                    $terminos = isset($gameRaspaGana["terminos"]) && !empty($gameRaspaGana["terminos"]) && !empty(json_decode($gameRaspaGana["terminos"], true)['terminos_value']) ? json_decode($gameRaspaGana["terminos"], true)['terminos_value'] : "Vigencia: Lima: del 15.03.2024 al 17.05.2024, Provincia: del 22.03.2024 al 07.04.2024, los días viernes, sábados y domingos, de 9:00 a.m. a 2:00 p.m. Válida en los mercados participantes de las ciudades de Lima, Arequipa, Trujillo, Huancayo y Chiclayo. Participan solo mayores de 18 años que realicen en el mercado participante la compra mínima de: (i) de 02 pastas corta o larga Don Vittorio, en cualquiera de sus presentaciones y (ii) ubiquen a la impulsadora, quien les permitirá participar en el “Juego de la Ruleta Virtual” y según el resultado podrá llevarse o no, uno de los premios disponibles. Stock total de premios en los mercados participantes: Lima: (i) 500 kits Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450g, 01 salsa roja Don Vittorio de 200 g), (ii) 225 coladores, (iii) 500 cucharones de pasta, Provincia: (i) 180 kits N°1 Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450 g), (ii) 222 kits N°2 Don Vittorio (incluye: 01 bolso notex, 01 codito Don Vittorio de 250 g), 300 kits N°3 Don Vittorio (incluye: 01 bolso notex, 01 salsa roja Don Vittorio de 200 g). Más información en https://www.alicorp.com.pe/pe/es/promociones/ o al número 01 7089300.";
                    $colorTermino = isset($gameRaspaGana["terminos"]) && !empty($gameRaspaGana["terminos"]) && !empty(json_decode($gameRaspaGana["terminos"], true)['color-termino-btn']) ? json_decode($gameRaspaGana["terminos"], true)['color-termino-btn'] : '#2347fb';
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
        <div class="col-9 p-0 d-flex justify-content-center" id="game">
            <div class="{{ $styleTipo }}">
                <div id="juego_casino_raspa" class="juego_casino_raspa height_game" style="background-image: url('{{ $fondo }}'); background-size: cover; position: relative;">
                    <div id="card-raspa">
                        <div class="text-header">
                            <p id="parrafo-header" class="{{ $styleBold }} {{  $italicTitulo }} {{ $styleTamano }} {{ $styleAlineacion }} d-none" style="color: #fff;">{{ $tituloTexto }}</p>
                            <img id="logo_casino" src="{{ $logo_principal }}" alt=""  style="max-width: 285px; width: 100%;">
                        </div>
                        <div class="container">
                            {{-- <div class="base">
                                <img id="img-premio" class="img-premio" src="{{ $imgPremio }}" alt="">
                            </div>
                            <canvas id="scratch" height="450"></canvas> --}}
                            <div id="cardRaspa"></div>
                            <div class="btn_content">
                                <button type="button" class="btn-memoria d-none" style="background-color: #fff;" id="continar_casino">Continuar</button>
                            </div>
                        </div>
                    </div>
                    <div id="card-premio" class="d-none flex-column align-items-center justify-content-center h-100" style="gap: 1rem;">
                        <div class="d-flex justify-content-center w-100">
                            <img class="img-fluid" src="{{ $titulo_subir }}" alt="" id="img-header-premio" style="max-width: 285px; width: 100%;">
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center w-100">
                            <img class="img-fluid " src="{{ $imgPremio }}" alt="" id="premio_img" style="max-width: 400px;">
                            <h4 class="text-white my-2 d-none" style="font-weight: 700;">{{ $namePremio }}</h4>
                        </div>
                        <div class="{{ $styleBotones }} justify-content-center" id="btn_content">
                            <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }};">IR A REGISTRO</a>
                            <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">IR A HOME</a>
                            {{-- <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">VOLVER A JUGAR</a> --}}
                        </div>
                    </div>
                    <div class="container w-100 h-100 d-flex align-items-center d-none" id="poltica-privacidad">
                        <div class="content_politicas_terminos text-center p-5">
                            <h1 class="w-75 m-auto text_politicas_color" style="color: {{ $colorPolitica }} !important;border-color: {{ $colorPolitica }} !important;">POLÍTICA DE PRIVACIDAD</h1>
                            <p class="mt-4 text_politicas_color" id="text_politicas" style="color: {{ $colorPolitica }} !important;">
                                @php
                                    echo $politicas;
                                @endphp
                            </p>
                            <div class="d-flex justify-content-between mt-5 botonera-terminos">
                                <button type="button" class="btn_politicas text-uppercase" id="aceptar_politica" style="background-color: {{ $colorPolitica }} !important;">Aceptar y contnuar</button>
                                <a href="{{ route('index') }}" class="btn_politicas text-uppercase" style="text-decoration: none; background-color: {{ $colorPolitica }} !important;">No Aceptar y salir</a>
                            </div>
                        </div>
                    </div>
                    <div class="container w-100 h-100 d-flex align-items-center d-none" id="terminos-condiciones">
                        <div class="content_politicas_terminos text-center p-5">
                            <h1 class="w-75 m-auto text_terminos_color" style="color: {{ $colorTermino }} !important;border-color: {{ $colorTermino }} !important;">TÉRMINOS Y CONDICIONES</h1>
                            <p class="mt-4 text_terminos_color" id="text_terminos" style="color: {{ $colorTermino }} !important;">
                                @php
                                    echo $terminos;
                                @endphp
                            </p>
                            <div class="d-flex justify-content-between mt-5 botonera-terminos">
                                <button type="submit" class="btn_terminos text-uppercase" id="aceptar_terminos" style="background-color: {{ $colorTermino }} !important;">Aceptar y contnuar</button>
                                <a href="{{ route('index') }}" class="btn_terminos text-uppercase" style="text-decoration: none; background-color: {{ $colorTermino }} !important;">No Aceptar y salir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function loadTipoFrame(tipo) {
        const urlCompleta = window.location.href;
        window.location.href = urlCompleta.split('?')[0] + "?type=" + tipo;
    }
</script>

{{-- <script>
    let canvas = document.getElementById("scratch");
    let context = canvas.getContext("2d");

    const init = () => {
        var background = new Image();
        background.src = "{{ $imagen_raspar }}";
    //   let gradientColor = context.createLinearGradient(0, 0, 135, 135);
    //   gradientColor.addColorStop(0, "#c3a3f1");
    //   gradientColor.addColorStop(1, "#6414e9");
    //   context.fillStyle = gradientColor;
    //   context.fillRect(0, 0, 200, 200);
        // Make sure the image is loaded first otherwise nothing will draw.
        canvas.width = canvas.parentElement.clientWidth;
        canvas.height = canvas.parentElement.clientHeight;
        background.onload = function(){
            context.drawImage(background,0,0,canvas.width,450);
        }
    };

    //initially mouse X and mouse Y positions are 0
    let mouseX = 0;
    let mouseY = 0;
    let isDragged = false;

    //Events for touch and mouse
    let events = {
    mouse: {
        down: "mousedown",
        move: "mousemove",
        up: "mouseup",
    },
    touch: {
        down: "touchstart",
        move: "touchmove",
        up: "touchend",
    },
    };

    let deviceType = "";

    //Detech touch device
    const isTouchDevice = () => {
    try {
        //We try to create TouchEvent. It would fail for desktops and throw error.
        document.createEvent("TouchEvent");
        deviceType = "touch";
        return true;
    } catch (e) {
        deviceType = "mouse";
        return false;
    }
    };

    //Get left and top of canvas
    let rectLeft = canvas.getBoundingClientRect().left;
    let rectTop = canvas.getBoundingClientRect().top;

    //Exact x and y position of mouse/touch
    const getXY = (e) => {
    mouseX = (!isTouchDevice() ? e.pageX : e.touches[0].pageX) - rectLeft;
    mouseY = (!isTouchDevice() ? e.pageY : e.touches[0].pageY) - rectTop;
    };

    isTouchDevice();
    //Start Scratch
    canvas.addEventListener(events[deviceType].down, (event) => {
    isDragged = true;
    //Get x and y position
    getXY(event);
    scratch(mouseX, mouseY);
    });

    //mousemove/touchmove
    canvas.addEventListener(events[deviceType].move, (event) => {
        if (!isTouchDevice()) {
            event.preventDefault();
        }
        if (isDragged) {
            const continar_casino = document.getElementById('continar_casino')
            continar_casino.classList.remove('d-none')
            getXY(event);
            scratch(mouseX, mouseY);
        }
    });

    //stop drawing
    canvas.addEventListener(events[deviceType].up, () => {
    isDragged = false;
    });


    const scratch = (x, y) => {
    //destination-out draws new shapes behind the existing canvas content
    context.globalCompositeOperation = "destination-out";
    context.beginPath();
    //arc makes circle - x,y,radius,start angle,end angle
    context.arc(x, y, 30,-20, 0);
    context.fill();
    };

    window.onload = init();
</script> --}}

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

    const card_premio = document.getElementById("card-premio");
    const card_raspa = document.getElementById("card-raspa");

    encabezado_menu.addEventListener('click', function() {
        retornoMenuEditNone();
        encabezado.classList.add('d-block');
        encabezado.classList.remove('d-none');


        card_raspa.classList.remove('d-flex');
        card_raspa.classList.add('d-none');
        card_premio.classList.add('d-flex');
        card_premio.classList.remove('d-none');
    })
    back_encabezado.addEventListener('click', () => {
        encabezado.classList.remove('d-block');
        encabezado.classList.add('d-none');

        card_premio.classList.remove('d-flex');
        card_premio.classList.add('d-none');
        card_raspa.classList.add('d-flex');
        card_raspa.classList.remove('d-none');
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

        card_raspa.classList.remove('d-flex');
        card_raspa.classList.add('d-none');
    })
    back_politicas.addEventListener('click', () => {
        politicas.classList.remove('d-block');
        politicas.classList.add('d-none');
        poltica_privacidad.classList.add('d-none');

        card_raspa.classList.add('d-flex');
        card_raspa.classList.remove('d-none');
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

        card_raspa.classList.remove('d-flex');
        card_raspa.classList.add('d-none');
    })
    back_terminos.addEventListener('click', () => {
        terminos.classList.remove('d-block');
        terminos.classList.add('d-none');
        terminos_condiciones.classList.add('d-none');

        card_raspa.classList.add('d-flex');
        card_raspa.classList.remove('d-none');
        retornoMenuEdit();
    })
</script>
<script>

    const juego_casino_raspa = document.getElementById("juego_casino_raspa")
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
                juego_casino_raspa.style.backgroundImage = `url(${e.target.result})`;
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

    const logo_casino = document.getElementById("logo_casino")
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
                logo_casino.src = e.target.result;
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

    document.getElementById('titulo-ganastes').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('preview-ganastes');
                const upload = document.getElementById('upload-ganastes')
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




@section('script_jquery1')
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"
></script>
<script src="{{ asset('js/wScratchpad.min.js') }}"></script>
<script>
    var scratchPad =  $("#cardRaspa").wScratchPad({
        size: 50, // The size of the brush/scratch.
        bg: `{{ $imgPremio }}`, // Background (image path or hex color).
        fg: `{{ $imagen_raspar }}`, // Foreground (image path or hex color).
        cursor: "pointer", // Set cursor.
        scratchDown: function(e, percent){ console.log(percent, 1); },
        scratchMove: function(e, percent){ console.log(percent, 2); },
        scratchUp: function(e, percent){ console.log(percent, 3); }
    });


    document.getElementById('raspar-subir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('preview-raspar');
                const upload = document.getElementById('upload-raspar')
                const parentElement = preview.parentNode;
                preview.src = e.target.result; // Establece la fuente de la imagen
                preview.style.display = 'block'; // Muestra la imagen
                upload.classList.add("d-none")

                scratchPad.wScratchPad('clear');


                scratchPad.wScratchPad('fg', e.target.result)

            };

            reader.readAsDataURL(file); // Lee la imagen como una URL de datos
        }
    });

</script>
<script>
    $(document).ready(function () {
        $("#guardar-raspa-gana").on('click', function () {
            $("#form-raspa-gana").submit();
        });

        $("#form-raspa-gana").on('submit', function (e) {
            e.preventDefault();

            var arrayPremiosValue = []

            var formData = new FormData(this);
            for (const [key, value] of formData.entries()) {
                if (key.includes('premio_id')) {
                    arrayPremiosValue.push(`${value}`);
                }
            }
            formData.append('arrayPremiosValue', arrayPremiosValue);


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

        $('#continar_casino').on('click', function () {
            $("#card-premio").removeClass("d-none").addClass('d-flex');
            $("#card-raspa").removeClass("d-flex").addClass('d-none');
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
    });

    $("#back_configuracion").click(function (e) {
        e.preventDefault();
        window.location.href = '{{ $rutaCon }}'
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
