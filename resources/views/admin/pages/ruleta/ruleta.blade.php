@php
    $project = $data["project"]; 
    $gameRuleta = $data["gameRuleta"]; 
    $projectPremio = $data["projectPremio"]; 
    $premioSelect = $data["premio"]; 
    $premioRuleta = $data["premioRuleta"];
    $idParticipante = $data["idParticipante"];
    $sigueIntentando = $data["sigueIntentando"];

    $urlSigue = isset($sigueIntentando["imagen"]) && !empty($sigueIntentando["imagen"]) ? '/storage/'.$sigueIntentando["imagen"] : '';
    $urlSigue2 = isset($sigueIntentando["imagen_no_premio"]) && !empty($sigueIntentando["imagen_no_premio"]) ? '/storage/'.$sigueIntentando["imagen_no_premio"] : '';
    $imgSigue = isset($sigueIntentando["imagen"]) && !empty($sigueIntentando["imagen"]) ? '/storage/'.$sigueIntentando["imagen"] : asset('backend/svg/img-null.svg');
    $imgSigue2 = isset($sigueIntentando["imagen_no_premio"]) && !empty($sigueIntentando["imagen_no_premio"]) ? '/storage/'.$sigueIntentando["imagen_no_premio"] : asset('backend/svg/img-null.svg');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/25bfdd98ec.js" crossorigin="anonymous"></script>
    <title>{{ $project->titulo_pestana }}</title>
    <link rel="icon" href="{{ '/storage/'.$project->ruta_fav }}" type="image/x-icon">
</head>
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
        font-family: var({{$estiloFont}}) !important;
    }
    button, p, b, a, span, div {
        font-family: var({{$estiloFont}}) !important;
    }

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
    body{
        min-height: 100vh;
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
            left: 50%;
            top: 50%;
            width: 100%;
            max-width: 300px;
            transform: translate(-50%, -50%);
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
            display: block;
            text-decoration: none;
        }
        #fin_juego {
            height: 100%;
            display: flex;
            align-items: center;
        }
</style>
<body>
    
    @php
    $imgNulo = asset('backend/svg/img-null.svg');
    $gameRuleta = $data["gameRuleta"];
    $principalData = json_decode($gameRuleta["titulo_inicio"], true);
    $principalData2 = json_decode($gameRuleta["titulo_juego"], true);
    $principalData3 = json_decode($gameRuleta["boton_premio"], true);

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
    $logo_inicio = isset($gameRuleta["logo_inicio"]) && !empty($gameRuleta["logo_inicio"]) ? '/storage/'.$gameRuleta["logo_inicio"] : $imgNulo;
    $logo_juego = isset($gameRuleta["logo_juego"]) && !empty($gameRuleta["logo_juego"]) ? '/storage/'.$gameRuleta["logo_juego"] : $imgNulo;
    $titulo_premio = isset($gameRuleta["titulo_premio"]) && !empty($gameRuleta["titulo_premio"]) ? '/storage/'.$gameRuleta["titulo_premio"] : $imgNulo;
    @endphp

 
    
    @php
        $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';
    @endphp
    <div class="h-100 d-flex flex-column justify-content-center" style="background-image: url({{ $fondo }}); background-size: cover; min-height: 100vh;" id="juego_ruleta">
        <div id="inicio_juego" class=" d-block">
            <div class="text-center ctn-data">
                <h1 class="{{ $styleTamano }} mb-4 {{ $styleBold }} {{ $italicTitulo }} {{ $styleAlineacion }}" id="titulo_header" style="color: #fff;">GIRA Y GANA CON</h1>
                <img style="width: 300px;" src="{{ $logo_inicio }}" alt="" id="logo_header">
            </div>
            <div class="w-100 d-flex justify-content-center">
                <button class="btn-jugar" id="btn_header">JUGAR</button>
            </div>
        </div>
        <div class="content-game d-none" id="juego">
            <div class="header text-center">
                <h1 class="{{ $styleTamanoGame }} {{ $styleBoldGame }} {{ $italicTituloGame }} {{ $styleAlineacionGame }} d-none" id="titulo_juego" style="color: #fff;">GIRA Y GANA CON</h1>
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
                    $urlImagenPremio = isset($projectPremio[0]["imagen_premio"]) && !empty($projectPremio[0]["imagen_premio"]) ? '/storage/'.$projectPremio[0]["imagen_premio"] : $imgNulo;
                @endphp
                <div class="content_premio_img">
                    <img class="img-fluid" src="{{ $urlImagenPremio }}" alt="" id="premio_first" style="max-width: 400px;">
                </div>
                <h5 id="title_premio">{{ $projectPremio[0]["nombre_premio"] }}</h5>
                <div class="{{ $styleBotones }} justify-content-center" style="gap: 0.4em;" id="btn_content">
                    <a href="{{ route($tipoJuego."juego.view.registro.ruleta", $project->dominio) }}" class="btn_premio" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">IR A REGISTRO</a>
                    <a href="{{ route("index") }}" class="btn_premio" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">IR A HOME</a>
                    {{-- <a href="" class="btn_premio" style="background-color: {{ $btnBg }}; color: {{ $btnColor }} !important;">VOLVER A JUGAR</a> --}}
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route("post.ganador", $idParticipante) }}" method="POST" id="ganador_form">
        @csrf
        @method('POST')
        <input type="hidden" name="idPremio" id="idPremio" value="0">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" defer
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>
</html>
<script>
    $(document).ready(function () {
        $("#inicio_juego").click(function (e) { 
            e.preventDefault();
            $("#juego").removeClass('d-none');
            $("#inicio_juego").removeClass('d-block');
            $("#inicio_juego").addClass('d-none');
        });
    });
</script>
<script>
    $(document).ready(function () {

        var data = {!! json_encode($premioRuleta) !!};;
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
            "id": 0,
            "name": 'Sigue Intentando',
            "img": '{{ $imgSigue }}'
        })

        let index = 0;

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
                if (startDeg % 360 < 360 && startDeg % 360 > (360/items.length) && endDeg % 360 > 0 && endDeg % 360 < (360/items.length) ) {
                    index = items[i]
                    console.log(index)
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
        //3174.0301937599493 3294.0301937599493
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
            console.log(index)
            setTimeout(() => {
                sectionRuletaSelect(index)
            }, 14500);
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

        function sectionRuletaSelect(posicion) {  
            const premio = data.find(d => d.name == posicion);
            console.log(premio, posicion)
            // Agregar id
            $("#idPremio").val(premio.id);
            if (premio.name == "Sigue Intentando") {
                alert("Sigue intentado.")
                location.reload(true);
            } else {
                $("#premio_first").attr('src', `${premio.img}`);
                $("#title_premio").html(premio.name);
                $("#fin_juego").removeClass('d-none');
                $("#juego").removeClass('d-block');
                $("#juego").addClass('d-none');
            }

            $('#ganador_form').submit();
        }

        $('#ganador_form').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'), // URL de la ruta
                method: 'POST',
                data: formData,
                contentType: false, // Para enviar los datos como FormData
                processData: false, // No procesar los datos
                success: function(data) {
                    console.log(data)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                    toastr.error('Ocurrió un error al procesar la solicitud.');
                }
            });
        });
    });
</script>
