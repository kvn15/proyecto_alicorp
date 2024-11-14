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
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }
    .content-game {
        width: 100%;
        min-height: 100vh;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position:  center;
        background-image: url({{ '/storage/'.$data["gameRaspaGana"]->fondo }});
    }
    .h-100-vh {
        height: 100vh;
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
        color: #005adc;
        background-color: #eff0f1;
        border-radius: 45px;
        padding: 0.1em 0.5em;
        font-weight: 500;
        margin-top: 1.4em;
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

    .btn_politicas {
        background-color: #005adc;
        color: #fff;
        border: 0;
        font-size: 1.5em;
        font-weight: 500;
        border-radius: 35px;
        padding: 0.3em 1.5em
    }

    .btn_politicas:hover {
        color: #fff;
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
        color: #4637ee;
        line-height: 20px;
        font-style: italic;
    }
    .content_left_select {
        width: 250px;
        background-color: #4637ee;
        font-size: 1.5em;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 1em;
        text-align: center;
        color: #fff;
        font-weight: 700;
    }

    .content_select {
        overflow: hidden;
        border: 2px solid #fff;
        border-radius: 15px;
        line-height: 20px;
        font-style: italic;
    }
</style>
<body>
    @php
        $tipoJuego = $data["project"]->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';
    @endphp
    <form method="POST" action="{{ route($tipoJuego."juego.post.registro.raspagana", $data["project"]->id) }}" enctype="multipart/form-data" class="content-game" id="form_registro_game">
        @csrf
        @method('POST')
        <div class="container h-100-vh ">
            <div class="{{ $data["project"]->project_type_id == 3 ? 'd-flex' : 'd-none' }} flex-column justify-content-center align-items-center h-100" id="punto_venta_content">
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
            <div class="row h-100 {{ $data["project"]->project_type_id == 3 ? 'd-none' : '' }}" id="form-registro">
                <div class="col-12 col-lg-4 d-flex flex-column justify-content-center">
                </div>
                <div class="col-12 col-lg-8 ps-5 d-flex flex-column justify-content-center">
                    <h1 class="w-75 text-white border-bottom mb-5" style="font-weight: 700">REGISTRATE</h1>
                    <div class="col-12">
                        @if(session('mensaje'))
                        <div class="alert alert-warning">
                            {{ session('mensaje') }}
                        </div>
                        @endif
                    </div>
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
                            <label for="codigo">N° de LOTE + foto de producto</label>
                            <input type="text" name="codigo" id="codigo" class="form-registro">

                            <input type="file" name="imagen" id="imagen" class="form-control mt-2">
                        </div>
                        <div class="col-12 d-flex justify-content-between my-2">
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
                </div>
            </div>
            <div class="container h-100 d-flex align-items-center d-none" id="poltica-privacidad">
                <div class="content_politicas_terminos text-center p-5">
                    <h1 class="w-75 m-auto">POLÍTICA DE PRIVACIDAD</h1>
                    <p class="mt-4">
                        Conste por el presente documento, yo ____________, identificado con _______________, (en adelante él/la "CEDENTE"), expresa su voluntad expresa de ceder de forma gratuita, a favor de ALICORP S.A.A., con RUC Nº 20100055237, con domicilio legal  en avenida Argentina 4793, Carmen de la Legua Reynoso, Callao y a sus subsidiarias (en adelante, ALICORP o la EMPRESA), los derechos de explotación y uso de su imagen, cesión que se realiza sin limitación alguna, de acuerdo al artículo 15 del código civil; en los términos que se detallan a continuación:
                        PRIMERO: OBJETO DE SESIÓN
                        <br>
                        <br>
                        1.1. Él, La CEDENTE cede y transfiere de forma total e integra, gratuita e ilimitada a nivel mundial, a LA EMPRESA todos los derechos de uso de su imagen que aparecerá en el video, fotografías y cualquier otro medio de captación de imágenes que elaborará y será de propiedad de LA EMPRESA.
                    </p>
                    <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn_politicas text-uppercase" id="aceptar_politica">Aceptar y contnuar</button>
                        <a href="{{ route('index') }}" class="btn_politicas text-uppercase" style="text-decoration: none">No Aceptar y salir</a>
                    </div>
                </div>
            </div>
            <div class="container h-100 d-flex align-items-center d-none" id="terminos-condiciones">
                <div class="content_politicas_terminos text-center p-5">
                    <h1 class="w-75 m-auto">TÉRMINOS Y CONDICIONES</h1>
                    <p class="mt-4">
                        Vigencia: Lima: del 15.03.2024 al 17.05.2024, Provincia: del 22.03.2024 al 07.04.2024, los días viernes, sábados y domingos, de 9:00 a.m. a 2:00 p.m. Válida en los mercados participantes de las ciudades de Lima, Arequipa, Trujillo, Huancayo y Chiclayo. Participan solo mayores de 18 años que realicen en el mercado participante la compra mínima de: (i) de 02 pastas corta o larga Don Vittorio, en cualquiera de sus presentaciones y (ii) ubiquen a la impulsadora, quien les permitirá participar en el “Juego de la Ruleta Virtual” y según el resultado podrá llevarse o no, uno de los premios disponibles. Stock total de premios en los mercados participantes: Lima: (i) 500 kits Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450g, 01 salsa roja Don Vittorio de 200 g), (ii) 225 coladores, (iii) 500 cucharones de pasta, Provincia: (i) 180 kits N°1 Don Vittorio (incluye: 01 bolso notex, 01 spaguetti Don Vittorio de 450 g), (ii) 222 kits N°2 Don Vittorio (incluye: 01 bolso notex, 01 codito Don Vittorio de 250 g), 300 kits N°3 Don Vittorio (incluye: 01 bolso notex, 01 salsa roja Don Vittorio de 200 g). Más información en https://www.alicorp.com.pe/pe/es/promociones/ o al número 01 7089300.
                    </p>
                    <div class="d-flex justify-content-between mt-5">
                        <button type="submit" class="btn_politicas text-uppercase" id="aceptar_terminos">Aceptar y contnuar</button>
                        <a href="{{ route('index') }}" class="btn_politicas text-uppercase" style="text-decoration: none">No Aceptar y salir</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

                if (!nombre || !apellido || !tipo_doc || !documento || !edad || !telefono || !email || !lote || !file) {
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