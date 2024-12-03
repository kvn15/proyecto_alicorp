@php
    $project = $landingPage["project"];
    $landing = $landingPage["landing"];
    $ganadoresArray = $landingPage["ganadores"];
    // dd($ganadores);
@endphp
@php
    $imgNulo = asset('backend/svg/img-null.svg');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $landingPage["project"]->titulo_pestana }}</title>
    <link rel="icon" href="{{ '/storage/'.$landingPage["project"]->ruta_fav }}" type="image/x-icon">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/25bfdd98ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

@php
$encabezado = isset($landing->encabezado) && !empty($landing->encabezado) ? json_decode($landing->encabezado) : null;
$color_menu = $encabezado ? $encabezado->color_menu : '#000000';
$logo_subir = $encabezado ? '/storage/'.$encabezado->logo_subir : $imgNulo;

$bold_menu = $encabezado && $encabezado->bold_menu == 1 ? "checked" : "";
$bold_menu_style = $encabezado && $encabezado->bold_menu == 1 ? "fw-bold" : "";
$italic_menu = $encabezado && $encabezado->italic_menu == 1 ? "checked" : "";
$italic_menu_style = $encabezado && $encabezado->italic_menu == 1 ? "fst-italic" : "";

$tamanoMenu1 = $encabezado && $encabezado->tamanoMenu == 1 ? 'checked' : '';
$tamanoMenu2 = $encabezado && $encabezado->tamanoMenu == 2 ? 'checked' : '';
$tamanoMenu3 = $encabezado && $encabezado->tamanoMenu == 3 ? 'checked' : '';
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

@php
$pagina_principal = isset($landing->pagina_principal) && !empty($landing->pagina_principal) ? json_decode($landing->pagina_principal, true) : null;
$banner_subir = $pagina_principal && !empty($pagina_principal["banner_subir"]) ? '/storage/'.$pagina_principal["banner_subir"] : $imgNulo;
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
$participar_2 = $como_participar && $como_participar["participar_2"] ? '/storage/'.$como_participar["participar_2"] : $imgNulo;
$participar_3 = $como_participar && $como_participar["participar_3"] ? '/storage/'.$como_participar["participar_3"] : $imgNulo;

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

@php
$preguntas_frecuentes = isset($landing->preguntas_frecuentes) && !empty($landing->preguntas_frecuentes) ? json_decode($landing->preguntas_frecuentes, true) : null;
$border_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["border-pregunta"] ? $preguntas_frecuentes["border-pregunta"] : '#fbbb01';

$bold_titulo_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["bold-titulo-pregunta"] == 1 ? "checked" : "";
$bold_titulo_pregunta_style = $preguntas_frecuentes && $preguntas_frecuentes["bold-titulo-pregunta"] == 1 ? "fw-bold" : "";
$italic_titulo_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["italic-titulo-pregunta"] == 1 ? "checked" : "";
$italic_titulo_pregunta_style = $preguntas_frecuentes && $preguntas_frecuentes["italic-titulo-pregunta"] == 1 ? "fst-italic" : "";

$input_titulo_pregunta = $preguntas_frecuentes && $preguntas_frecuentes["input-titulo-pregunta"] ? $preguntas_frecuentes["input-titulo-pregunta"] : 'preguntas_frecuentes';

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

    $redes_sociales_array = $redes_sociales && $redes_sociales["redes_sociales"] ? $redes_sociales["redes_sociales"] : '[]';
    
@endphp
<body>

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
            --landing: @php echo $fondo_landing @endphp;
            --color-text1: #fff;
            --color-active-nav: @php echo $color_navegacion_input_hover @endphp;
            --popins: "Poppins", sans-serif;
            --arial: Arial, sans-serif;
            --courier: "Courier New", monospace;
            --verdana: Verdana, sans-serif;
            --times: 'Times New Roman', serif;
            --roboto: "Roboto", sans-serif;
            --montserrat: "Montserrat", sans-serif;
            --bg-nav: #080808;
            --buttom-header: #cd0a10;
            --color-buttom-header: #fff;
            --border-participar: @php $border_input_como @endphp;
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
            font-family: var(@php echo $estiloFont @endphp) !important;
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
                                        <a class="nav-link active item_landing_menu {{ $bold_menu_style }} {{ $italic_menu_style }} {{ $styleTamanoMenu }}" aria-current="page" href="#participar" id="{{ $direccionar_1 }}">{{ $navegacion_1 }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link item_landing_menu {{ $bold_menu_style }} {{ $italic_menu_style }} {{ $styleTamanoMenu }}" href="#preguntas-frecuentes" id="{{ $direccionar_2 }}">{{ $navegacion_2 }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link item_landing_menu {{ $bold_menu_style }} {{ $italic_menu_style }} {{ $styleTamanoMenu }}"  target="_blank"  href="{{ route("terminos", $project->dominio) }}" id="{{ $direccionar_3 }}">{{ $navegacion_3 }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link item_landing_menu {{ $bold_menu_style }} {{ $italic_menu_style }} {{ $styleTamanoMenu }}" href="#ganadores" id="{{ $direccionar_4 }}">{{ $navegacion_4 }}</a>
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
                <a href="{{ $direccionar_boton_header }}" class="btns btn-landing mt-5 {{ $styletamanoBotonHeader }} {{ $bold_boton_parrafo_style }} {{ $italic_boton_parrafo_style }}" id="btn_participar_header" style="background-color: {{ $color_boton_header }};">{{ $titulo_boton_header }}</a>
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
                    <a href="{{ route("terminos", $project->dominio) }}" target="_blank" class="btns btn-landing {{ $styletamanoBotonComo }} {{ $bold_boton_como_style }} {{ $italic_boton_como_style }}" id="btn-como" style="background-color: {{ $color_boton_como }} !important;">{{ $input_buttom_como }}</a>
                </section>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    @if (session('mensajeError'))
                        Swal.fire({
                            icon: 'error',
                            title: {{ session('mensajeError') }}
                        })
                    @endif
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    @if (session('mensajeSuccess'))
                        Swal.fire({
                            icon: 'success',
                            title: "{{ session('mensajeSuccess') }}"
                        });
                    @endif
                });
            </script>
            <div class="mt-5" id="formulario-participar">
                <section style="border-color: {{ $border_formulario }} !important;">
                    <h1 class="text-center title-participar {{ $styletamanoTituloFormulario }} {{ $bold_titulo_formulario_style }} {{ $italic_titulo_formulario_style }}" id="title_formulario_participar" style="color: {{ $color_titulo_formulario }};">{{ $input_titulo_formulario }}</h1>
                    <form method="POST" action="{{ route("landing.post.register", $landingPage["project"]->id) }}"  class="row" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">Nombre</label>
                            <input type="text" class="form-control input-text" name="name" value="{{ isset($landingPage["user"]) && $landingPage["user"]->name }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="apellido" class="label_form" style="color: {{ $color_label_formulario }} !important;">Apellido</label>
                            <input type="text" class="form-control input-text" name="apellido" id="apellido" value="{{ isset($landingPage["user"]) &&  $landingPage["user"]->apellido }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="tipo_doc" class="label_form" style="color: {{ $color_label_formulario }} !important;">Tipo de documento</label>
                            <select name="tipo_doc" id="tipo_doc" class="form-select input-text" required>
                                <option value="DNI" {{  isset($landingPage["user"]) && $landingPage["user"]->tipo_documento == 'DNI' ? 'selected' : '' }}>DNI</option>
                                <option value="C.EXT" {{ isset($landingPage["user"]) &&  $landingPage["user"]->tipo_documento == 'C.EXT' ? 'selected' : '' }}>C.EXT</option>
                                <option value="PASAPORTE" {{  isset($landingPage["user"]) && $landingPage["user"]->tipo_documento == 'PASAPORTE' ? 'selected' : '' }}>PASAPORTE</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="documento" class="label_form" style="color: {{ $color_label_formulario }} !important;">N° de documento</label>
                            <input type="text" class="form-control input-text" name="documento" id="documento" value="{{ isset($landingPage["user"]) &&  $landingPage["user"]->documento }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="edad" class="label_form" style="color: {{ $color_label_formulario }} !important;">Edad (*Mayores de 18 años)</label>
                            <input type="text" class="form-control input-text" name="edad" id="edad" min="18" value="{{ isset($landingPage["user"]) &&  $landingPage["user"]->edad }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">N° telefónico</label>
                            <input type="text" name="telefono" id="telefono" class="form-control input-text" value="{{ isset($landingPage["user"]) &&  $landingPage["user"]->telefono }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name" class="label_form" style="color: {{ $color_label_formulario }} !important;">Correo Electronico</label>
                            <input type="email" name="email" id="email" class="form-control input-text" value="{{ isset($landingPage["user"]) &&  $landingPage["user"]->email }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="codigo" class="label_form" style="color: {{ $color_label_formulario }} !important;">N° de LOTE + foto de producto</label>
                            <input type="text" class="form-control input-text" name="codigo" id="codigo" required>
                            <input type="file" name="imagen" id="imagen" class="form-control mt-2" required>
                        </div>

                        <div class="col-12 row mt-3">
                            <div class="form-check col-12 col-md-6 col-lg-4">
                                <input class="form-check-input" type="checkbox" name="checkTerminos" id="checkTerminos" checked>
                                <label class="form-check-label label_form" for="checkTerminos " style="color: {{ $color_label_formulario }} !important;">
                                    Acepto terminos y condiciones
                                </label>
                            </div>
                            <div class="form-check col-12 col-md-6 col-lg-4">
                                <input class="form-check-input" type="checkbox" name="checkDatos" id="checkDatos" checked>
                                <label class="form-check-label label_form" for="checkDatos" style="color: {{ $color_label_formulario }} !important;">
                                    Deseo usar mis datos para crear un usuario en plataforma web
                                </label>
                            </div>
                            <div class="form-check col-12 col-md-6 col-lg-4">
                                <input class="form-check-input" type="checkbox" name="checkPoliticas" id="checkPoliticas" checked>
                                <label class="form-check-label label_form" for="checkPoliticas" style="color: {{ $color_label_formulario }} !important;">
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
                                @foreach ($ganadoresArray as $item)
                                <tr>
                                    <td>{{ $item->user->documento }}</td>
                                    <td>{{ $item->user->name }} {{ $item->user->apellido }}</td>
                                    <td>{{ $item->award_project->nombre_premio }}</td>
                                </tr>
                                @endforeach
                                
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
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
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
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        var arrayRedes = {!! json_encode($redes_sociales_array) !!};
        function addRedesLanding() {

            var html = ``;

            arrayRedes.forEach(a => {
                html += `
                    <a href="${a.enlace}">
                        <i class="fab fa-${a.name} redes_icon" style="font-size: 3.2rem;color: {{ $color_icon_redes }};"></i>
                    </a>
                `;
            })

            $("#landing_redes").html(html)
        }
        addRedesLanding();
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
</body>
</html>