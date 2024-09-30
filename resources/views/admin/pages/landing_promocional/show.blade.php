@extends('admin.pages.inicio.layout')

@section('header_left')
  <span>Landing Promocional > <b>Nueva Proyecto Landing</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
<button type="button" class="btn btn-inactivo">
    Inactivo
</button>
@endsection


@section('inicio_dash')

    <div class="row-show">
        <x-admin.menu-reg ruta="landing_promocional" />
        <div class="body-right">
            <h3>Overview</h3>

            <div class="row">
                <div class="col-12">
                    <div class="card-w-full">
                        <div class="info-container">
                            <a href="{{ route('landing_promocional.show.overview', 1) }}"><img class="img-fluid" src="{{asset('backend/img/thumbnail.png')}}" alt=""></a>
                            <div class="info-card">
                                <p class="title-card"><a href="{{ route('landing_promocional.show.overview', 1) }}">Nuevo Proyecto Campaña Web</a></p>
                                <p>Landing Promocional</p>
                                <p><small>Ultima actualización: 12/08/2024 16:34</small></p>
                                <p><small>Fecha creación: 12/08/2024</small></p>
                            </div>
                        </div>
                        <div class="etapas-card">
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Estado</b></span>
                                <div class="body-etapa">
                                    <div class="bage-inactivo">
                                        Inactivo
                                    </div>
                                </div>
                            </div>
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Fecha Inicio</b></span>
                                <div class="body-etapa">
                                    <span>20/08/2024</span>
                                </div>
                            </div>
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Fecha Fin</b></span>
                                <div class="body-etapa">
                                    <span>-</span>
                                </div>
                            </div>
                            <div class="item-etapa">
                                <span class="title-etapa"><b>Participantes</b></span>
                                <div class="body-etapa">
                                    <span>3500</span>
                                </div>
                            </div>
                        </div>
                        <div class="accion-card">
                            <div class="item-accion">
                                <span class="title-accion"><b>Acciones</b></span>
                                <div class="body-accion">
                                    <button class="btn btn-outline-secondary">Personalizar</button>
                                    <button class="btn btn-alicorp">Publicar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="border-card card-right">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4">Funnel</h5>

                            <div>
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
                            </div>
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
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">No Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">No Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">No Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">No Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Gano</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Gano</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 d-flex justify-content-end mt-4">
                            <a href="" class="ver_mas">
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

                            <div>
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
                            </div>
                        </div>
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="border-card card-right">
                        <h5 class="mb-4">Ultimos ganadores</h5>

                        <div class="w-100 d-flex flex-column" style="gap: 0.4rem">
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                    <small>Hoy 25/08/2024</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Articulo 1</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                    <small>Hoy 25/08/2024</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-lose">Articulo 1</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                    <small>Hoy 25/08/2024</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Articulo 1</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 name-ganador">
                                    <span>Alex Manda</span>
                                    <small>Hoy 25/08/2024</small>
                                </div>
                                <div class="col-3 documento-ganador">
                                    <span>65928421</span>
                                </div>
                                <div class="col-4 estado-ganador">
                                    <span class="estado-win">Articulo 1</span>
                                </div>
                            </div>
                           
                        </div>

                        <div class="w-100 d-flex justify-content-end mt-4">
                            <a href="" class="ver_mas">
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
            "value": 673,
            color: '#3AAAE3'
        }, {
            "name": "Participantes",
            "value": 486,
            color: '#3762D0'
        }, {
            "name": "Ganadores",
            "value": 183,
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

{{-- Chart --}}
<script>
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = document.querySelector('#areaChart').getContext('2d')

    var areaChartData = {
    labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
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
        data                : [28, 48, 40, 19, 86, 27, 90]
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
        data                : [65, 59, 80, 81, 56, 55, 40]
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