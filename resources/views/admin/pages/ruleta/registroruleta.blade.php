<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/25bfdd98ec.js" crossorigin="anonymous"></script>
    <title>{{ $data["project"]->titulo_pestana }}</title>
    <link rel="icon" href="{{ '/storage/'.$data["project"]->ruta_fav }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fonts/font.css') }}">
</head>
@php
    $imgNulo = asset('backend/svg/img-null.svg');
    $fondo = isset($data["gameRuleta"]->fondo) && !empty($data["gameRuleta"]->fondo) ? '/storage/'.$data["gameRuleta"]->fondo : $imgNulo;
    $project = $data["project"];
@endphp
@php
    $estiloFont = "";
    switch ($project["tipo_letra"]) {
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

    body {
        margin: 0;
        padding: 0;
        font-family: var({{$estiloFont}}) !important;
    }

    a, b, p, h1, h2, h3, h4, h5, h6, button, li, span, input, textarea {
        font-family: var({{$estiloFont}}) !important;
    }
    .content-game {
        width: 100%;
        min-height: 100vh;
        /* padding: 1.3rem 0px; */
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position:  center;
        background-image: url({{ $fondo }});
    }
    .h-100-vh {
        min-height: 100vh;
    }

    form label {
        display: block;
        color: #fff;
        font-size: 1.3em;
    }

    .form-registro {
        border: 0;
        background-color: #fff;
        color: #181818;
        width: 90%;
        height: 35px;
        border-radius: 25px;
        padding: 0px 10px
    }

    .form-check label {
        font-size: 13px;
    }

    .btn-jugar {
        font-size: 2.2em;
        color: #000;
        background-color: #eabf2e;
        border-radius: 45px;
        padding: 0.1em 0.5em;
        font-weight: 500;
        margin-top: 0.7em;
    }

    .content_politicas_terminos {
        width: 100%;
        background-color: #ffffffec;
        color: #000 !important;
        border-radius: 25px;
    }

    .content_politicas_terminos h1 {
        font-weight: 700;
        padding-bottom: 0.3em;
        font-size: 3em;
        border-bottom: 2px solid #000;
    }

    .content_politicas_terminos p {
        font-size: 22px;
        font-weight: 400;
    }

    .btn_politicas, .btn_terminos {
        background-color: #eabf2e;
        color: #000;
        border: 0;
        font-size: 1.5em;
        font-weight: 500;
        border-radius: 35px;
        padding: 0.3em 1.5em
    }

    .btn_politicas:hover, .btn_terminos:hover {
        color: #000;
    }
</style>
<style>
    .select_punto {
        height: 80px;
        font-size: 1.5em;
        width: 200px;
        white-space: pre-wrap;
        text-align: center;
        border: 0;
        font-weight: 700;
        background-color: #e9ba17;
        line-height: 20px;
        font-style: italic;
        color: #000;
    }
    .content_left_select {
        width: 250px;
        background-color: #000;
        font-size: 1.5em;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 1em;
        text-align: center;
        color: #e9ba17;
        font-weight: 700;
    }

    .content_select {
        overflow: hidden;
        border: 2px solid #e9ba17;
        border-radius: 15px;
        line-height: 20px;
        font-style: italic;
    }
</style>

<style>
    @media (max-width: 575.98px) {
        .content_politicas_terminos  {
            padding: 1.5rem !important
        }
        h1.text_politicas_color, h1.text_terminos_color {
            font-size: 2em;
        }
        .botonera-terminos {
            flex-direction: column;
            gap: 1rem;
        }
        .botonera-terminos button,
        .botonera-terminos a {
            font-size: 1.1rem !important;
        }
    }
</style>
<body>
    @php
        $tipoJuego = $data["project"]->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';
    @endphp
    <form method="POST" action="{{ route($tipoJuego."juego.post.registro.ruleta", $data["project"]->id) }}" enctype="multipart/form-data" class="content-game" id="form_registro_game">
        @csrf
        @method('POST')
        <div class="container h-100-vh d-flex align-items-center">
            <div class="d-block w-100">
                <div class="{{ $data["project"]->project_type_id == 3 && !session('mensaje') ? 'd-flex' : 'd-none' }}  w-100 flex-column justify-content-center align-items-center h-100" id="punto_venta_content">
                    <div class="d-flex content_select mt-3">
                        <div class="content_left_select">
                            <b>Seleccionar punto de venta</b>
                        </div>
                        <select name="punto_venta" id="punto_venta" class="select_punto">
                            <option value="">Mercados o autoservicios</option>
                            @foreach ($data["puntoVenta"] as $index => $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row h-100 {{ $data["project"]->project_type_id == 3 && !session('mensaje') ? 'd-none' : '' }}" id="form-registro">
                    <div class="col-12 d-flex justify-content-center d-none">
                        <img class="img-fluid" src="{{ asset('backend/img/recurso_form.png') }}" alt="" style="max-width: 350px;">
                    </div>
                    <div class="col-12 col-lg-8 ps-5 d-flex flex-column justify-content-center mx-auto">
                        <h1 class="w-75 text-white border-bottom mb-3" style="font-weight: 700">REGISTRATE</h1>
                        <div class="col-12">
                            @if(session('mensaje'))
                            <div class="alert alert-warning">
                                {{ session('mensaje') }}
                            </div>
                            @endif
                        </div>
                        @if ($data["project"]->project_type_id != 3)
                        @php
                            $name = isset($data["user"]->name) ? $data["user"]->name : '';
                            $apellido = isset($data["user"]->apellido) ? $data["user"]->apellido : '';
                            $tipo_documento = isset($data["user"]->tipo_documento) ? $data["user"]->tipo_documento : '';
                            $documento = isset($data["user"]->documento) ? $data["user"]->documento : '';
                            $edad = isset($data["user"]->edad) ? $data["user"]->edad : '';
                            $telefono = isset($data["user"]->telefono) ? $data["user"]->telefono : '';
                            $email = isset($data["user"]->email) ? $data["user"]->email : '';
                        @endphp
                        <div action="" class="row">
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-registro" value="{{ $name }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-registro" value="{{ $apellido }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="tipo_doc">Tipo de documento</label>
                                {{-- <input type="text" name="tipo_doc" id="tipo_doc" class="form-registro"> --}}
                                <select name="tipo_doc" id="tipo_doc" class="form-registro">
                                    <option value="DNI" {{ $tipo_documento == 'DNI' ? 'selected' : '' }}>DNI</option>
                                    <option value="C.EXT" {{ $tipo_documento == 'C.EXT' ? 'selected' : '' }}>C.EXT</option>
                                    <option value="PASAPORTE" {{ $tipo_documento == 'PASAPORTE' ? 'selected' : '' }}>PASAPORTE</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="documento">N° de documento</label>
                                <input type="text" name="documento" id="documento" class="form-registro" value="{{ $documento }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="edad">Edad (*Mayores de 18 años)</label>
                                <input type="number" name="edad" id="edad" class="form-registro" min="18" value="{{ $edad }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="telefono">N° telefónico</label>
                                <input type="text" name="telefono" id="telefono" class="form-registro" value="{{ $telefono }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="email">Correo electronico</label>
                                <input type="email" name="email" id="email" class="form-registro" value="{{ $email }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="codigo">N° de Boleta + foto de producto</label>
                                <input type="text" name="codigo" id="codigo" class="form-registro">

                                {{-- <input type="file" name="imagen" id="imagen" class="form-control mt-2"> --}}

                                <input type="hidden" id="camera_foto" name="camera_foto">
                                <div class="w-100 d-flex mt-2" style="gap: 0.5rem;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Tomar Foto
                                    </button>
                                    <button type="button" class="btn btn-success d-none" id="ver_foto" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        Ver Foto
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="checkTerminos" id="checkTerminos" checked>
                                    <label class="form-check-label" for="checkTerminos">
                                    Acepto terminos y condiciones
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="checkDatos" id="checkDatos" checked>
                                    <label class="form-check-label" for="checkDatos">
                                    Deseo usar mis datos para crear un usuario en plataforma web
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="checkPoliticas" id="checkPoliticas" checked>
                                    <label class="form-check-label" for="checkPoliticas">
                                    Acepto politca de prvacidad de datos
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="button" class="btn-jugar" id="btn_jugar">JUGAR</button>
                            </div>
                        </div>
                        @else
                        <div action="" class="row">
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-registro" value="{{ old('name') }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-registro" value="{{ old('apellido') }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="tipo_doc">Tipo de documento</label>
                                {{-- <input type="text" name="tipo_doc" id="tipo_doc" class="form-registro"> --}}
                                <select name="tipo_doc" id="tipo_doc" class="form-registro">
                                    <option value="DNI" {{ old('tipo_doc') == 'DNI' ? 'selected' : '' }}>DNI</option>
                                    <option value="C.EXT" {{ old('tipo_doc') == 'C.EXT' ? 'selected' : '' }}>C.EXT</option>
                                    <option value="PASAPORTE" {{ old('tipo_doc') == 'PASAPORTE' ? 'selected' : '' }}>PASAPORTE</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="documento">N° de documento</label>
                                <input type="text" name="documento" id="documento" class="form-registro" value="{{ old('documento') }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="edad">Edad (*Mayores de 18 años)</label>
                                <input type="number" name="edad" id="edad" class="form-registro" min="18" value="{{ old('edad') }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="telefono">N° telefónico</label>
                                <input type="text" name="telefono" id="telefono" class="form-registro" value="{{ old('telefono') }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="email">Correo electronico</label>
                                <input type="email" name="email" id="email" class="form-registro" value="{{ old('email') }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="codigo">N° de Boleta + foto de producto</label>
                                <input type="text" name="codigo" id="codigo" class="form-registro" value="{{ old('codigo') }}">

                                {{-- <input type="file" name="imagen" id="imagen" class="form-control mt-2"> --}}

                                <input type="hidden" id="camera_foto" name="camera_foto">
                                <div class="w-100 d-flex mt-2" style="gap: 0.5rem;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Tomar Foto
                                    </button>
                                    <button type="button" class="btn btn-success d-none" id="ver_foto" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        Ver Foto
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="checkTerminos" id="checkTerminos" checked>
                                    <label class="form-check-label" for="checkTerminos">
                                    Acepto terminos y condiciones
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="checkDatos" id="checkDatos" checked>
                                    <label class="form-check-label" for="checkDatos">
                                    Deseo usar mis datos para crear un usuario en plataforma web
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="checkPoliticas" id="checkPoliticas" checked>
                                    <label class="form-check-label" for="checkPoliticas">
                                    Acepto politca de prvacidad de datos
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="button" class="btn-jugar" id="btn_jugar">JUGAR</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="container h-100 d-flex align-items-center d-none" id="poltica-privacidad">
                    @php
                    $gameRuleta = $data["gameRuleta"];
                    $politicas = isset($gameRuleta["politicas"]) && !empty($gameRuleta["politicas"]) && !empty(json_decode($gameRuleta["politicas"], true)['politicas_value']) ? json_decode($gameRuleta["politicas"], true)['politicas_value'] : 'Conste por el presente documento, yo ____________, identificado con _______________, (en adelante él/la "CEDENTE"), expresa su voluntad expresa de ceder de forma gratuita, a favor de ALICORP S.A.A., con RUC Nº 20100055237, con domicilio legal  en avenida Argentina 4793, Carmen de la Legua Reynoso, Callao y a sus subsidiarias (en adelante, ALICORP o la EMPRESA), los derechos de explotación y uso de su imagen, cesión que se realiza sin limitación alguna, de acuerdo al artículo 15 del código civil; en los términos que se detallan a continuación:
                            PRIMERO: OBJETO DE SESIÓN
                            <br>
                            <br>
                            1.1. Él, La CEDENTE cede y transfiere de forma total e integra, gratuita e ilimitada a nivel mundial, a LA EMPRESA todos los derechos de uso de su imagen que aparecerá en el video, fotografías y cualquier otro medio de captación de imágenes que elaborará y será de propiedad de LA EMPRESA.';
                    $colorPolitica = isset($gameRuleta["politicas"]) && !empty($gameRuleta["politicas"]) && !empty(json_decode($gameRuleta["politicas"], true)['color-politica-btn']) ? json_decode($gameRuleta["politicas"], true)['color-politica-btn'] : '#000000';
                    @endphp
                    <div class="content_politicas_terminos text-center p-5">
                        <h1 class="w-75 m-auto text_politicas_color" style="color: {{ $colorPolitica }} !important;border-color: {{ $colorPolitica }} !important;">POLÍTICA DE PRIVACIDAD</h1>
                        <p class="mt-4 text_politicas_color" id="text_politicas" style="color: {{ $colorPolitica }} !important;">
                            @php
                                echo $politicas;
                            @endphp
                        </p>
                        <div class="d-flex justify-content-between mt-5 botonera-terminos">
                            <button type="button" class="btn_politicas text-uppercase" id="aceptar_politica" style="color: {{ $colorPolitica }} !important;">ACEPTAR Y CONTINUAR</button>
                            <a href="{{ route('index') }}" class="btn_politicas text-uppercase" style="text-decoration: none; color: {{ $colorPolitica }} !important;">No Aceptar y salir</a>
                        </div>
                    </div>
                </div>
                <div class="container h-100 d-flex align-items-center d-none" id="terminos-condiciones">
                    @php
                        $terminos = isset($gameRuleta["terminos"]) && !empty($gameRuleta["terminos"]) && !empty(json_decode($gameRuleta["terminos"], true)['terminos_value']) ? json_decode($gameRuleta["terminos"], true)['terminos_value'] : "Vigencia: Lima: del 15.03.2024 al 17.05.2024, Provincia: del 22.03.2024 al 07.04.2024, los días viernes, sábados y domingos, de 9:00 a.m. a 2:00 p.m. Válida en los mercados participantes de las ciudades de Lima, Arequipa, Trujillo, Huancayo y Chiclayo. Participan solo mayores de 18 años que realicen en el mercado participante la compra mínima de: (i) de 02 pastas corta o larga Don Vittorio, en cualquiera de sus presentaciones y (ii) ubiquen a la impulsadora, quien les permitirá participar en el “Juego de la Ruleta Virtual” y según el resultado podrá llevarse o no, uno de los premios disponibles. Stock total de premios en los mercados participantes: Lima: (i) 500 kits Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450g, 01 salsa roja Don Vittorio de 200 g), (ii) 225 coladores, (iii) 500 cucharones de pasta, Provincia: (i) 180 kits N°1 Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450 g), (ii) 222 kits N°2 Don Vittorio (incluye: 01 bolso notex, 01 codito Don Vittorio de 250 g), 300 kits N°3 Don Vittorio (incluye: 01 bolso notex, 01 salsa roja Don Vittorio de 200 g). Más información en https://www.alicorp.com.pe/pe/es/promociones/ o al número 01 7089300.";
                        $colorTermino = isset($gameRuleta["terminos"]) && !empty($gameRuleta["terminos"]) && !empty(json_decode($gameRuleta["terminos"], true)['color-termino-btn']) ? json_decode($gameRuleta["terminos"], true)['color-termino-btn'] : '#000000';
                    @endphp
                    <div class="content_politicas_terminos text-center p-5">
                        <h1 class="w-75 m-auto text_terminos_color" style="color: {{ $colorTermino }} !important;border-color: {{ $colorTermino }} !important;">TÉRMINOS Y CONDICIONES</h1>
                        <p class="mt-4 text_terminos_color" id="text_terminos" style="color: {{ $colorTermino }} !important;">
                            @php
                                echo $terminos;
                            @endphp
                        </p>
                        <div class="d-flex justify-content-between mt-5 botonera-terminos">
                            <button type="submit" class="btn_terminos text-uppercase" id="aceptar_terminos" style="color: {{ $colorTermino }} !important;">ACEPTAR Y CONTINUAR</button>
                            <a href="{{ route('index') }}" class="btn_terminos text-uppercase" style="text-decoration: none; color: {{ $colorTermino }} !important;">No Aceptar y salir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tomar Foto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Selecciona un dispositivo</h5>
                <div>
                    <select class="form-control" name="listaDeDispositivos" id="listaDeDispositivos"></select>
                    <button class="btn btn-info" id="encender-camara">Reiniciar Cámara</button>
                </div>
                <br>
                <video muted="muted" id="video" style="width: 100%"></video>
                <canvas id="canvas" style="display: none;"></canvas>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="boton">Tomar Foto</button>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel2">Ver Foto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="img-thumbnail w-100" alt="" id="img_foto_tomado">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModal">Salir</button>
            </div>
          </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.22/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/script_camera.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#btn_jugar").on('click', function () {

                const nombre = $("#name").val();
                const apellido = $("#apellido").val();
                const tipo_doc = $("#tipo_doc").val();
                const documento = $("#documento").val();
                const edad = $("#edad").val();
                const telefono = $("#telefono").val();
                const email = $("#email").val();
                const lote = $("#codigo").val();
                const file = $("#imagen").val();
                const camera_foto = $("#camera_foto").val();

                if (!nombre || !apellido || !tipo_doc || !documento || !edad || !telefono || !email || !lote || !camera_foto) {
                    alert("Debe completar todos los campos para continuar");
                    return;
                }

                if (edad < 18) {
                    alert("Deben ser mayores de edad para continuar.");
                    return;
                }

                // contiinuar
                $("#form-registro").addClass('d-none');
                $("#poltica-privacidad").removeClass('d-none');
            });

            $("#aceptar_politica").on('click', function () {
                $("#poltica-privacidad").addClass('d-none');
                $("#terminos-condiciones").removeClass('d-none');
            })

            $("#punto_venta").change(function (e) {
                e.preventDefault();
                const valor = $("#punto_venta").val();

                if (!valor) {
                    alert("Deben escoger un punto de venta");
                    return;
                }

                $("#punto_venta_content").addClass('d-none');
                $("#form-registro").removeClass('d-none');
            });

            // $("#form_registro_game").submit(function (e) {
            //     e.preventDefault();

            //     var formData = new FormData(this);

            //     $.ajax({
            //         url: $(this).attr('action'), // URL de la ruta
            //         method: 'POST',
            //         data: formData,
            //         contentType: false, // Para enviar los datos como FormData
            //         processData: false, // No procesar los datos
            //         success: function(data) {
            //             // Procesar los datos devueltos
            //             toastr.success(data.message);
            //         },
            //         error: function(jqXHR, textStatus, errorThrown) {
            //             console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
            //             toastr.error('Ocurrió un error al procesar la solicitud.');
            //         }
            //     });
            // });
        });
    </script>
</body>
</html>
