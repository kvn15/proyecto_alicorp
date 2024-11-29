@php
    $project = $data["project"]; 
    $gameRaspaGana = $data["gameRaspaGana"]; 
    $projectPremio = $data["projectPremio"]; 
    $premioSelect = $data["premio"]; 
    $idParticipante = $data["idParticipante"]; 
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $project->titulo_pestana }}</title>
    <link rel="icon" href="{{ '/storage/'.$project->ruta_fav }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/25bfdd98ec.js" crossorigin="anonymous"></script>
</head>

@php
$tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';
@endphp
@php
    $principal = isset($gameRaspaGana) ? $gameRaspaGana->titulo : '';
    $premio = isset($gameRaspaGana) ? $gameRaspaGana->boton_premios : '';
    $principalData = json_decode($principal, true);
    $premioData = json_decode($premio, true);
    $imgNulo = asset('backend/svg/img-null.svg');
    
    $fondo = isset($gameRaspaGana) && !empty($gameRaspaGana->fondo) ? "/storage/".$gameRaspaGana->fondo : $imgNulo;
    $logo_principal = isset($gameRaspaGana) && !empty($gameRaspaGana->logo_principal) ? "/storage/".$gameRaspaGana->logo_principal : $imgNulo;
    $imagen_raspar = isset($gameRaspaGana) && !empty($gameRaspaGana->imagen_raspar) ? "/storage/".$gameRaspaGana->imagen_raspar : $imgNulo;
    $titulo_subir = isset($gameRaspaGana) && !empty($gameRaspaGana->titulo_subir) ? "/storage/".$gameRaspaGana->titulo_subir : $imgNulo;

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
        --color-text1: #fff;
        --popins: "Poppins", sans-serif;
        --arial: Arial, sans-serif;
        --courier: "Courier New", monospace;
        --verdana: Verdana, sans-serif;
        --times: 'Times New Roman', serif;
        --roboto: "Roboto", sans-serif;
        --montserrat: "Montserrat", sans-serif;
    }
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: var({{$estiloFont}}) !important;
    }
    body {
        height: 100vh;
    }
    button, p, b, a, span, div {
        font-family: var({{$estiloFont}}) !important;
    }
    .container {
        width: 31em;
        height: 31em;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 57%;
        left: 50%;
        border-radius: 0.6em;
    }
    .base,
    #scratch {
        height: 450px;
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
        width: 82% !important;
        transform: rotate(-368deg);
        top: 20%;
        left: 8%;
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
        padding: 2em;
    }

    .text-header img  {
        width: 100%;
        min-width: 300px;
        max-width: 500px;
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
</style>
<body>
    @php
        $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';
    @endphp
    <form action="{{ route($tipoJuego.'juego.ganador.raspagana', $project->id) }}" method="POST" id="form_ganador">
        @csrf
        @method('POST')
        <input type="hidden" id="idParticipante" name="idParticipante" value="{{ $idParticipante }}">
        <input type="hidden" id="premio_id" name="premio_id" value="{{ $premioSelect['premio_id'] }}">
    </form>

    <div id="juego_casino_raspa" style="background-image: url('{{ $fondo }}'); background-size: cover; height: 100vh; position: relative;">
        <div id="card-raspa">
            <div class="text-header">
                {{-- <p id="parrafo-header {{ $styleBold }} {{  $italicTitulo }} {{ $styleTamano }} {{ $styleAlineacion }}" style="color: #fff;">{{ $tituloTexto }}</p> --}}
                <img id="logo_casino" src="{{ $logo_principal }}" alt="" style="max-width: 250px;">
            </div>
            <div class="container">
                <div class="base">
                    <img id="img-premio" class="img-premio" src="{{ $imgPremio }}" alt="">
                </div>
                <canvas id="scratch" height="450"></canvas>
                <div class="btn_content">
                    <button type="button" class="btn-memoria d-none" style="background-color: #fff;" id="continar_casino">Continuar</button>
                </div>
            </div>
        </div>
        <div id="card-premio" class="d-none">
            <div class="d-flex justify-content-center pt-4 w-100 pb-4">
                <img class="img-fluid" src="{{ $titulo_subir }}" alt="" id="img-header-premio"  style="max-width: 350px;">
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center w-100">
                <img class="img-fluid" src="{{ $imgPremio }}" alt="" id="premio_img"  style="max-width: 400px;">
                <h4 class="text-white my-2" style="font-weight: 700;">{{ $namePremio }}</h4>
            </div>
            <div class="{{ $styleBotones }} justify-content-center" id="btn_content">
                <a href="{{ route($tipoJuego."juego.view.registro.raspagana", $project->dominio) }}" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">IR A REGISTRO</a>
                <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">IR A HOME</a>
                <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">VOLVER A JUGAR</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>
</html>

<script>
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
        
            if (continar_casino.classList.contains('d-none')) {
                // Ejcutar ajax
                ganador();
            }

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
    context.arc(x, y, 22,-20, 0);
    context.fill();
    };

    window.onload = init();

    function ganador() { 
        $('#form_ganador').submit();
    }

    $('#form_ganador').submit(function (e) { 
        e.preventDefault();
        
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // URL de la ruta
            method: 'POST',
            data: formData,
            contentType: false, // Para enviar los datos como FormData
            processData: false, // No procesar los datos
            success: function(data) {
                // Procesar los datos devueltos
                console.log(data)
                $("#img-header-premio").remove();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                toastr.error('Ocurrió un error al procesar la solicitud.');
            }
        });
    });
</script>
<script>
    $('#continar_casino').on('click', function () {
        $("#card-premio").removeClass("d-none").addClass('d-block');
        $("#card-raspa").removeClass("d-block").addClass('d-none');
    });
</script>