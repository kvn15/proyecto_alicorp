@extends('admin.pages.inicio.layout')

@section('header_left')
    @php
        $ruta = $project["landing"]->project_type->id == 1 ? "landing_promocional.index" : ($project["landing"]->project_type->id == 2 ? "admin.dashboard.juegosWeb" : "admin.dashboard.juegosCamp");
    @endphp
  <span><a href="{{ route($ruta) }}">{{ $project["landing"]->project_type->name }}</a> > <b>{{ $project["landing"]->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
@if ($project["landing"]->status == 1)
<button type="button" class="btn btn-activo" id="btn_status">
    Activo
</button>
@endif
@if ($project["landing"]->status == 0)
<button type="button" class="btn btn-inactivo" id="btn_status">
    Inactivo
</button>
@endif
@if ($project["landing"]->status == 2)
<button type="button" class="btn btn-finalizado" id="btn_status">
    Finalizado
</button>
@endif
@endsection


@section('inicio_dash')

    <div class="row-show">
        <x-admin.menu-reg ruta="{{$project['landing']->project_type->ruta_name}}" id="{{ $project['landing']->id }}" />
        <div class="body-right">
            <h3>Overview</h3>
            @php
                $imgLogoProyecto = isset($project["landing"]->ruta_img) && !empty($project["landing"]->ruta_img) ? '/storage/'.$project["landing"]->ruta_img : asset('backend/img/thumbnail.png');
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card-w-full">
                        <div class="info-container">
                            <a href="{{ route('landing_promocional.show.overview', $project["landing"]->id ) }}"><img class="img-fluid" src="{{$imgLogoProyecto}}" alt=""></a>
                            <div class="info-card">
                                <p class="title-card"><a href="{{ route('landing_promocional.show.overview', $project["landing"]->id) }}">{{ $project["landing"]->nombre_promocion }}</a></p>
                                <p>{{ $project["landing"]->desc_promocion }}</p>
                                <p><small>Ultima actualización: {{ $project["landing"]->updated_at }}</small></p>
                                <p><small>Fecha creación: {{ $project["landing"]->created_at }}</small></p>
                            </div>
                        </div>
                        <div class="etapas-card">
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Estado</b></span>
                                <div class="body-etapa">
                                    @if ($project["landing"]->status == 1)
                                    <div class="bage-activo" id="bageStatus">
                                        Activo
                                    </div>
                                    @endif
                                    @if ($project["landing"]->status == 0)
                                    <div class="bage-inactivo" id="bageStatus">
                                        Inactivo
                                    </div>
                                    @endif
                                    @if ($project["landing"]->status == 2)
                                    <div class="bage-finalizado" id="bageStatus">
                                        Finalizado
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Fecha Inicio</b></span>
                                <div class="body-etapa">
                                    <span>{{ $project["landing"]->fecha_ini_proyecto }}</span>
                                </div>
                            </div>
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Fecha Fin</b></span>
                                <div class="body-etapa">
                                    <span>{{ $project["landing"]->fecha_fin_proyecto ?? '-' }}</span>
                                </div>
                            </div>
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Participantes</b></span>
                                <div class="body-etapa">
                                    <span>{{ $project["NroParticipantes"] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="accion-card">
                            <div class="item-accion">
                                <span class="title-accion"><b>Acciones</b></span>
                                <div class="body-accion d-flex">
                                    @php
                                        $ruta = empty($project["landing"]->game_id) ? 'landing_promocional.show.personalizarLanding' : ($project["landing"]->game_id == 3 ? 'juego_campana.show.personalizarJuego' : ($project["landing"]->game_id == 1 ? 'juego_campana.show.personalizarJuego.raspagana' : 'juego_campana.show.personalizarJuego.ruleta'))
                                    @endphp
                                    <a href="{{route($ruta, $project["landing"]->id )}}" class="btn btn-outline-secondary me-2" style="align-self: flex-start;font-size: 14px;">Personalizar</a>
                                    @if ($project["landing"]->status == '0')
                                    <form id="publicar" action="{{ route('juego_web.show.publicar',$project["landing"]->id ) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" id="status" name="status" value="1">
                                        <button type="submit" class="btn btn-alicorp" id="btn_publicar">Publicar</button>
                                    </form>
                                    @endif
                                    @if (isset($project["landing"]->dominio) && !empty($project["landing"]->dominio))
                                    @php
                                        $rutaVisitar = "";
                                        if ($project["landing"]->project_type_id == 1) { //Landing
                                            $rutaVisitar = route('landing.view', $project["landing"]->dominio);
                                        } else {
                                            if ($project["landing"]->project_type_id == 2) { // Juego Web

                                                if ($project["landing"]->game_id == 1) {
                                                    $rutaVisitar = route('juegoWeb.juego.view.registro.raspagana', $project["landing"]->dominio);
                                                } else if($project["landing"]->game_id == 2) {
                                                    $rutaVisitar = route('juegoWeb.juego.view.registro.ruleta', $project["landing"]->dominio);
                                                } else {
                                                    $rutaVisitar = route('juegoWeb.juego.view.registro', $project["landing"]->dominio);
                                                }


                                            } else {

                                                if ($project["landing"]->game_id == 1) {
                                                    $rutaVisitar = route('juegoCampana.juego.view.registro.raspagana', $project["landing"]->dominio);
                                                } else if($project["landing"]->game_id == 2) {
                                                    $rutaVisitar = route('juegoCampana.juego.view.registro.ruleta', $project["landing"]->dominio);
                                                } else {
                                                    $rutaVisitar = route('juegoCampana.juego.view.registro', $project["landing"]->dominio);
                                                }

                                            }

                                        }

                                    @endphp
                                        <a href="{{ $rutaVisitar }}" class="btn btn-outline-secondary ms-2" style="align-self: flex-start;font-size: 14px;" target="_blank">Visitar</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="border-card card-right">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4">Funnel</h5>

                            {{-- <div>
                                <select class="select-chart">
                                    <option value="" selected>Todo</option>
                                    <option value="">Enero</option>
                                    <option value="">Febrero</option>
                                    <option value="">Marzo</option>
                                    <option value="">Abril</option>
                                    <option value="">Mayo</option>
                                    <option value="">Junio</option>
                                    <option value="">Julio</option>
                                    <option value="">Agosto</option>
                                    <option value="">Setiembre</option>
                                    <option value="">Octubre</option>
                                    <option value="">Noviembre</option>
                                    <option value="">Diciembre</option>
                                </select>
                            </div> --}}
                        </div>
                        <div class="chart">
                            <canvas></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="border-card card-right">
                        <h5 class="mb-4">Ultimos participantes</h5>

                        <div class="w-100 d-flex flex-column" style="gap: 0.4rem">
                            @foreach ($project["ultParticipantes"] as $ultParticipante)
                            @php
                                $name = isset($ultParticipante->user->name) ? $ultParticipante->user->name : $ultParticipante->other_participant->nombres;
                                $documento = isset($ultParticipante->user->documento) ? $ultParticipante->user->documento : $ultParticipante->other_participant->nro_documento;
                            @endphp
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>{{ $name }}</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>{{ $documento }}</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    @if ($ultParticipante->ganador == 1)
                                    <span class="estado-win">Gano</span>
                                    @else
                                    <span class="estado-lose">No Gano</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="w-100 d-flex justify-content-end mt-4">
                            <a href="{{ route("landing_promocional.show.participantes", $project["landing"]->id) }}" class="ver_mas">
                                Ver más <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="border-card card-right">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex mb-4 align-items-center" style="gap: 0.8em">
                                <h5 class="mb-0">Usuarios</h5>
                                <span class="separate">|</span>
                                <span class="leyenda">
                                    <span class="leyenda-circle leyenda-success"></span>
                                    Visitas
                                </span>
                                <span class="leyenda">
                                    <span class="leyenda-circle leyenda-danger"></span>
                                    Participantes
                                </span>
                            </div>

                            {{-- <div>
                                <select class="select-chart">
                                    <option value="" selected>Todo</option>
                                    <option value="">Enero</option>
                                    <option value="">Febrero</option>
                                    <option value="">Marzo</option>
                                    <option value="">Abril</option>
                                    <option value="">Mayo</option>
                                    <option value="">Junio</option>
                                    <option value="">Julio</option>
                                    <option value="">Agosto</option>
                                    <option value="">Setiembre</option>
                                    <option value="">Octubre</option>
                                    <option value="">Noviembre</option>
                                    <option value="">Diciembre</option>
                                </select>
                            </div> --}}
                        </div>
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="border-card card-right">
                        <h5 class="mb-4">Ultimos ganadores</h5>

                        <div class="w-100 d-flex flex-column" style="gap: 0.4rem">
                            @foreach ($project["ultGanadores"] as $ultGanadores)
                            @php
                                $name = isset($ultGanadores->user->name) ? $ultGanadores->user->name : $ultGanadores->other_participant->nombres;
                                $documento = isset($ultGanadores->user->documento) ? $ultGanadores->user->documento : $ultGanadores->other_participant->nro_documento;
                            @endphp
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>{{ $name }}</span>
                                    <small>{{ $ultGanadores->created_at }}</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>{{ $documento }}</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    @if ($ultGanadores->ganador == 1)
                                    <span class="estado-win">{{ isset($ultGanadores->award_project->nombre_premio) ? $ultGanadores->award_project->nombre_premio : "" }}</span>
                                    @else
                                    <span class="estado-lose">Articulo 1</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="w-100 d-flex justify-content-end mt-4">
                            <a href="{{ route("landing_promocional.show.ganadores", $project["landing"]->id) }}" class="ver_mas">
                                Ver más <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Chart Funnel --}}
    <script>
        const data = [{
            "name": "Visitas",
            "value": {{ $project["NroVistas"] }},
            color: '#3AAAE3'
        }, {
            "name": "Participantes",
            "value": {{ $project["NroParticipantes"] }},
            color: '#3762D0'
        }, {
            "name": "Ganadores",
            "value": {{ $project["NroGanadores"] }},
            color: '#E62020'
        }];

        const canvas = document.querySelector('canvas');
        let ctx = canvas.getContext('2d');
        let height = 250;
        let width = 850;
        canvas.style.width = "100%";
        canvas.style.height = "100%";

        let scale = window.devicePixelRatio;
        canvas.width =  width * scale;
        canvas.height = height * scale;
        ctx.scale(scale, scale);

        let graphHeight = height - 100;

        let maxValue = Math.max.apply(Math, data.map(function(o) { return o.value; })) + 200;

        data.forEach(item => {
        item['height'] = (item.value / maxValue) * graphHeight
        })

        let boxes = data.length
        ctx.strokeStyle = "#eee";
        for(let i = 0; i < boxes; i++) {
            let x = Math.round(i*(width / boxes));

            // draw separation lines
            ctx.beginPath();
            ctx.moveTo(x + 0.5, 0.5);
            ctx.lineTo(x, height - 20);
            ctx.stroke();

            // draw item area
            ctx.fillStyle = data[i].color;
            ctx.beginPath();
            ctx.moveTo(x, height - 20 - data[i].height);
            ctx.lineTo(x + (width / boxes) + 0.5, height - 20 - (data[i+1] ? data[i+1].height : data[i].height));
            ctx.lineTo(x + (width / boxes) + 0.5, height - 20);
            ctx.lineTo(x, height - 20);
            ctx.closePath();
            ctx.fill();

            // draw header
            ctx.font = "normal 15px sans-serif";
            ctx.fillStyle = "#323232";
            ctx.fillText(data[i].name, x + 10, 20);

            ctx.font = "bolder 24px sans-serif";
            ctx.fillStyle = "#000";
            ctx.fillText(data[i].value, x + 10, 60);
        }
    </script>
@endsection

@section('script')
<script src="{{ asset('backend/js/admin/Chart.min.js') }}"></script>
{{-- Chart --}}
<script>
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = document.querySelector('#areaChart').getContext('2d')

    var meses = '{{ $project["meses"] }}';
    var vistas = '{{ $project["vistas"] }}';
    var participantes = '{{ $project["participantes"] }}';

    var areaChartData = {
    labels  : meses.split('|'),
    datasets: [
        {
        label               : 'Digital Goods',
        backgroundColor     : '#FD000D1a',
        borderColor         : '#FD000D',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : participantes.split('|')
        },
        {
        label               : 'Electronics',
        backgroundColor     : '#78B92800',
        borderColor         : '#78B928',
        borderDash: [5, 5],
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : vistas.split('|')
        },
    ]
    }

    var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
        display: false
    },
    scales: {
        xAxes: [{
        gridLines : {
            display : false,
        }
        }],
        yAxes: [{
        gridLines : {
            display : false,
        }
        }]
    }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
    type: 'line',
    data: areaChartData,
    options: areaChartOptions
    })
</script>
@endsection

@section('script_jquery1')
<script>
    $(document).ready(function () {
        $("#publicar").on('submit', function (e) {
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
                    // toastr.success(data.message);
                    if (data) {
                        if ($("#status").val() == '1') {
                            $("#status").val('2');
                            $("#publicar").remove();
                            $("#btn_status").removeClass('btn-activo');
                            $("#btn_status").removeClass('btn-inactivo');
                            $("#btn_status").removeClass('btn-finalizado');
                            $("#btn_status").addClass('btn-activo');
                            $("#btn_status").html('Activo');
                            $("#bageStatus").removeClass('bage-inactivo');
                            $("#bageStatus").addClass('bage-activo');
                            $("#bageStatus").html('Activo');
                        }

                    }
                    console.log(data)
                    // if (data) {
                    //     toastr.success('Cambios guadados correctamente');
                    // }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                    toastr.error('Ocurrió un error al procesar la solicitud.');
                }
            });
        });
    });
</script>
@endsection
