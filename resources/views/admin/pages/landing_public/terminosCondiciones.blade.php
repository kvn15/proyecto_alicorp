@php
    $project = $landingPage["project"];
    $landing = $landingPage["landing"];
    $ganadoresArray = $landingPage["ganadores"];
    // dd($ganadores);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Términos y Condiciones</title>
    <link rel="stylesheet" href="{{ asset('css/fonts/font.css') }}">
</head>
<body style="padding: 5em; text-align: center;">
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
        .h-100-vh {
            height: 100vh;
        }
        a {
            text-decoration: none
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
            margin-top: 1.4em;
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
    <div class="content_politicas_terminos text-center p-5">
        <h1 class="w-75 m-auto text_politicas_color">TÉRMINOS Y CONDICIONES</h1>
        <p class="mt-4 text_politicas_color" id="text_politicas" >
            Vigencia: Lima: del 15.03.2024 al 17.05.2024, Provincia: del 22.03.2024 al 07.04.2024, los días viernes, sábados y domingos, de 9:00 a.m. a 2:00 p.m. Válida en los mercados participantes de las ciudades de Lima, Arequipa, Trujillo, Huancayo y Chiclayo. Participan solo mayores de 18 años que realicen en el mercado participante la compra mínima de: (i) de 02 pastas corta o larga Don Vittorio, en cualquiera de sus presentaciones y (ii) ubiquen a la impulsadora, quien les permitirá participar en el “Juego de la Ruleta Virtual” y según el resultado podrá llevarse o no, uno de los premios disponibles. Stock total de premios en los mercados participantes: Lima: (i) 500 kits Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450g, 01 salsa roja Don Vittorio de 200 g), (ii) 225 coladores, (iii) 500 cucharones de pasta, Provincia: (i) 180 kits N°1 Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450 g), (ii) 222 kits N°2 Don Vittorio (incluye: 01 bolso notex, 01 codito Don Vittorio de 250 g), 300 kits N°3 Don Vittorio (incluye: 01 bolso notex, 01 salsa roja Don Vittorio de 200 g). Más información en https://www.alicorp.com.pe/pe/es/promociones/ o al número 01 7089300.
        </p>
        <div class="d-flex justify-content-between mt-5">
            <a href="{{ route('landing.view', $project->dominio) }}" class="btn_politicas text-uppercase">Aceptar y continuar</a>
        </div>
    </div>
</body>
</html>
