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
</head>
<body style="padding: 5em; text-align: center;">
    <style>
        body {
            margin: 0;
            padding: 0;
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