@extends('admin.pages.inicio.layout')

@section('header_left')
  <span>{{ $project["landing"]->project_type->name }} > <b>{{ $project["landing"]->nombre_promocion }}</b></span>
@endsection

@section('header_center')
<div class="d-flex">
</div>
@endsection

@section('header_right')
@if ($project["landing"]->status)
<button type="button" class="btn btn-inactivo">
    Activo
</button>
@else
<button type="button" class="btn btn-inactivo">
    Inactivo
</button>
@endif
@endsection

@section('inicio_dash')
<div class="row-show">
    <x-admin.menu-reg ruta="{{$project['landing']->project_type->ruta_name}}"  id="{{ $project['landing']->id }}" />
    <div class="body-right">
        <h3>Indicadores</h3>

        {{-- Indicadores card --}}
        <div class="row indicador">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box"> 
                    <span class="info-box-icon"> 
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="28" cy="28" r="28" fill="#F4F7FE"/>
                            <g clip-path="url(#clip0_110_2307)">
                            <path d="M41.631 24.0399H35.0763L29.0827 15.0631C28.8227 14.68 28.3848 14.4884 27.947 14.4884C27.5091 14.4884 27.0712 14.68 26.8112 15.0768L20.8176 24.0399H14.2629C13.5103 24.0399 12.8945 24.6556 12.8945 25.4083C12.8945 25.5314 12.9082 25.6546 12.9493 25.7777L16.425 38.4628C16.7397 39.6123 17.7934 40.4607 19.0523 40.4607H36.8416C38.1005 40.4607 39.1542 39.6123 39.4826 38.4628L42.9583 25.7777L42.9994 25.4083C42.9994 24.6556 42.3836 24.0399 41.631 24.0399ZM27.947 18.2926L31.7785 24.0399H24.1154L27.947 18.2926ZM36.8416 37.7239L19.066 37.7376L16.0555 26.7767H39.8521L36.8416 37.7239ZM27.947 29.5135C26.4417 29.5135 25.2102 30.745 25.2102 32.2503C25.2102 33.7555 26.4417 34.9871 27.947 34.9871C29.4522 34.9871 30.6838 33.7555 30.6838 32.2503C30.6838 30.745 29.4522 29.5135 27.947 29.5135Z" fill="#E62020"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_110_2307">
                            <rect width="32.8417" height="32.8417" fill="white" transform="translate(11.5264 11.7242)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <div class="info-box-content"> 
                        <span class="info-box-text">Vistas</span> 
                        <span class="info-box-number">
                            {{ $project["NroVistas"] }}
                        </span> 
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box"> 
                    <div class="info-box-content"> <span class="info-box-text">Participantes</span> <span class="info-box-number">
                        {{ $project["NroParticipantes"] }}</span> </div>
                    <span class="info-box-icon"> 
                        <svg width="64" height="46" viewBox="0 0 64 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="58.0737" y="45.5704" width="45.5705" height="5.33286" rx="2.66643" transform="rotate(-90 58.0737 45.5704)" fill="#E9EDF7"/>
                            <rect x="58.0737" y="45.5704" width="10.8668" height="5.33286" rx="2.66643" transform="rotate(-90 58.0737 45.5704)" fill="#E62020"/>
                            <rect x="43.5547" y="45.5704" width="45.5705" height="5.33281" rx="2.66641" transform="rotate(-90 43.5547 45.5704)" fill="#E9EDF7"/>
                            <rect x="43.5547" y="45.5704" width="41.364" height="5.33287" rx="2.66643" transform="rotate(-90 43.5547 45.5704)" fill="#E62020"/>
                            <rect x="29.0366" y="45.5704" width="45.5705" height="5.33286" rx="2.66643" transform="rotate(-90 29.0366 45.5704)" fill="#E9EDF7"/>
                            <rect x="29.0366" y="45.5704" width="31.5488" height="5.33287" rx="2.66643" transform="rotate(-90 29.0366 45.5704)" fill="#E62020"/>
                            <rect x="14.5186" y="45.5704" width="45.5705" height="5.33287" rx="2.66644" transform="rotate(-90 14.5186 45.5704)" fill="#E9EDF7"/>
                            <rect x="14.5186" y="45.5704" width="23.4863" height="5.33287" rx="2.66643" transform="rotate(-90 14.5186 45.5704)" fill="#E62020"/>
                            <rect y="45.5704" width="45.5705" height="5.33287" rx="2.66644" transform="rotate(-90 0 45.5704)" fill="#E9EDF7"/>
                            <rect y="45.5704" width="37.508" height="5.33288" rx="2.66644" transform="rotate(-90 0 45.5704)" fill="#E62020"/>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box"> 
                    <span class="info-box-icon">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="28" cy="28" r="28" fill="#F4F7FE"/>
                            <g clip-path="url(#clip0_110_2313)">
                            <path d="M20.2844 24.3136H20.5581C21.6118 24.3136 22.4739 25.1757 22.4739 26.2293V35.8082C22.4739 36.8618 21.6118 37.7239 20.5581 37.7239H20.2844C19.2307 37.7239 18.3687 36.8618 18.3687 35.8082V26.2293C18.3687 25.1757 19.2307 24.3136 20.2844 24.3136ZM27.9475 18.5663C29.0011 18.5663 29.8632 19.4284 29.8632 20.482V35.8082C29.8632 36.8618 29.0011 37.7239 27.9475 37.7239C26.8938 37.7239 26.0317 36.8618 26.0317 35.8082V20.482C26.0317 19.4284 26.8938 18.5663 27.9475 18.5663ZM35.6105 29.5135C36.6642 29.5135 37.5263 30.3756 37.5263 31.4293V35.8082C37.5263 36.8618 36.6642 37.7239 35.6105 37.7239C34.5569 37.7239 33.6948 36.8618 33.6948 35.8082V31.4293C33.6948 30.3756 34.5569 29.5135 35.6105 29.5135Z" fill="#E62020"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_110_2313">
                            <rect width="32.8417" height="32.8417" fill="white" transform="translate(11.5264 11.7242)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <div class="info-box-content"> <span class="info-box-text">Ganadores</span> <span class="info-box-number">{{ $project["NroGanadores"] }}</span> </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="28" cy="28" r="28" fill="#F4F7FE"/>
                            <g clip-path="url(#clip0_110_2313)">
                            <path d="M20.2844 24.3136H20.5581C21.6118 24.3136 22.4739 25.1757 22.4739 26.2293V35.8082C22.4739 36.8618 21.6118 37.7239 20.5581 37.7239H20.2844C19.2307 37.7239 18.3687 36.8618 18.3687 35.8082V26.2293C18.3687 25.1757 19.2307 24.3136 20.2844 24.3136ZM27.9475 18.5663C29.0011 18.5663 29.8632 19.4284 29.8632 20.482V35.8082C29.8632 36.8618 29.0011 37.7239 27.9475 37.7239C26.8938 37.7239 26.0317 36.8618 26.0317 35.8082V20.482C26.0317 19.4284 26.8938 18.5663 27.9475 18.5663ZM35.6105 29.5135C36.6642 29.5135 37.5263 30.3756 37.5263 31.4293V35.8082C37.5263 36.8618 36.6642 37.7239 35.6105 37.7239C34.5569 37.7239 33.6948 36.8618 33.6948 35.8082V31.4293C33.6948 30.3756 34.5569 29.5135 35.6105 29.5135Z" fill="#E62020"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_110_2313">
                            <rect width="32.8417" height="32.8417" fill="white" transform="translate(11.5264 11.7242)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <div class="info-box-content"> <span class="info-box-text">Días promoción</span> <span class="info-box-number">{{ $project["diasPromocion"] }}</span> </div>
                </div>
            </div>
        </div>

        <div class="row">
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
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="progress-titulo">Visitas últimos 7 días</span>
                            <br>
                            <span class="progress-cantidad">{{ $project["total7Dias"] }}</span>
                        </div>
                        <div>
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="33" height="33" rx="7" fill="#F4F7FE"/>
                                <g clip-path="url(#clip0_112_2191)">
                                <path d="M11.4 14.2H11.6C12.37 14.2 13 14.83 13 15.6V22.6C13 23.37 12.37 24 11.6 24H11.4C10.63 24 10 23.37 10 22.6V15.6C10 14.83 10.63 14.2 11.4 14.2ZM17 10C17.77 10 18.4 10.63 18.4 11.4V22.6C18.4 23.37 17.77 24 17 24C16.23 24 15.6 23.37 15.6 22.6V11.4C15.6 10.63 16.23 10 17 10ZM22.6 18C23.37 18 24 18.63 24 19.4V22.6C24 23.37 23.37 24 22.6 24C21.83 24 21.2 23.37 21.2 22.6V19.4C21.2 18.63 21.83 18 22.6 18Z" fill="#FD000D"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_112_2191">
                                    <rect width="24" height="24" fill="white" transform="translate(5 5)"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="indicador-progress">
                        <div class="text-center d-flex justify-content-between">
                            @foreach ($project["ultimos7Dias"] as $ultimos7Dias)
                            @php
                                $porcentaje = ($ultimos7Dias / 2000) * 100;
                                $porcentaje = $porcentaje > 100 ? 100 : $porcentaje;
                            @endphp
                            <div class="progress vertical">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $porcentaje }}" aria-valuemin="0"
                                    aria-valuemax="100" style="height: {{ $porcentaje }}%">
                                    <span class="sr-only">{{ $porcentaje }}%</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="border-card card-right">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex mb-2 align-items-center" style="gap: 0.8em">
                            <h5 class="mb-0">Participantes</h5> 
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
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="border-card card-right">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h5 class="mb-0">KPis</h5> 
                        </div>
                        <div>
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="33" height="33" rx="7" fill="#F4F7FE"/>
                                <g clip-path="url(#clip0_112_2191)">
                                <path d="M11.4 14.2H11.6C12.37 14.2 13 14.83 13 15.6V22.6C13 23.37 12.37 24 11.6 24H11.4C10.63 24 10 23.37 10 22.6V15.6C10 14.83 10.63 14.2 11.4 14.2ZM17 10C17.77 10 18.4 10.63 18.4 11.4V22.6C18.4 23.37 17.77 24 17 24C16.23 24 15.6 23.37 15.6 22.6V11.4C15.6 10.63 16.23 10 17 10ZM22.6 18C23.37 18 24 18.63 24 19.4V22.6C24 23.37 23.37 24 22.6 24C21.83 24 21.2 23.37 21.2 22.6V19.4C21.2 18.63 21.83 18 22.6 18Z" fill="#FD000D"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_112_2191">
                                    <rect width="24" height="24" fill="white" transform="translate(5 5)"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="w-100" style="font-size: 14px; font-weight: 500">
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 1</span>
                            <span>12,200</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 2</span>
                            <span>12,200</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 3</span>
                            <span>12,200</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 4</span>
                            <span>12,200</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 5</span>
                            <span>12,200</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 6</span>
                            <span>12,200</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 7</span>
                            <span>12,200</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 8</span>
                            <span>12,200</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>KPI nro 9</span>
                            <span>12,200</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.0.2"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    var meses = '{{ $project["meses"] }}';
    var participantes = '{{ $project["participantes"] }}';
    // Datos del gráfico
    const data = {
        labels: meses.split('|'),
        datasets: [{
            label: 'Participantes',
            data: participantes.split('|'), // Datos para cada mes
            backgroundColor: [
                '#E9EDF7', '#E9EDF7', '#E9EDF7', '#E9EDF7', '#E9EDF7', '#E9EDF7', 
                '#E9EDF7', '#E9EDF7', '#E9EDF7', '#E9EDF7', '#E9EDF7', '#E9EDF7'
            ],
            borderWidth: 1,
            borderRadius: 8 // Esquinas redondeadas de 8px
        }]
    };

    // Configuración inicial del gráfico
    const config = {
        type: 'bar',
        data: data,
        options: {
            barPercentage: 0.9, // Ajustar el ancho de las barras
            categoryPercentage: 0.5, // Ajustar el ancho de las categorías
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100, // Máximo del eje Y para ajustar la escala
                    grid: {
                        display: false // Desactivar las cuadrículas en el eje Y
                    },
                    display: false // Desactivar el eje Y
                },
                x: {
                    grid: {
                        display: false // Desactivar las cuadrículas en el eje X
                    }
                }
            },
            plugins: {
                annotation: {
                    annotations: {
                        line1: {
                            type: 'line',
                            display: false, // Mostrar la línea al inicio
                            borderColor: '#FD000D', // Color de la línea
                            borderWidth: 2,
                            borderDash: [5, 5],
                            label: {
                                enabled: true, // Habilitar la etiqueta
                                content: '0', // Contenido de la etiqueta
                                position: 'end',
                                color: '#FD000D', // Color de la etiqueta
                                backgroundColor: 'rgba(0,0,0,0)',
                                xAdjust: 22, // Ajustar la posición de la etiqueta hacia la derecha
                                yAdjust: -0 // Ajustar la posición vertical de la etiqueta
                            },
                            yMin: 90.5, // Posición de la línea un poco más abajo de la barra de junio
                            yMax: 90.5, // Mantener la línea horizontal un poco más abajo
                            xMin: 0, // Iniciar en el borde izquierdo
                            xMax: data.labels.length - 1 // Terminar en el borde derecho
                        }
                    }
                },
                legend: {
                    display: false // Esto oculta la leyenda
                }
            },
            onClick: (e, elements) => {
                // Reiniciar el color de todas las barras
                data.datasets[0].backgroundColor = Array(data.labels.length).fill('#E9EDF7');
                
                if (elements.length > 0) {
                    // Obtener el índice de la barra seleccionada
                    const index = elements[0].index;
                    // Obtener el valor de la barra seleccionada
                    const barValue = data.datasets[0].data[index];

                    // Activar la barra seleccionada
                    data.datasets[0].backgroundColor[index] = '#FD000D'; // Pintar de rojo la barra seleccionada
                    
                    // Configurar la posición de la línea horizontal centrada en la barra seleccionada
                    config.options.plugins.annotation.annotations.line1.display = true; // Hacer visible la línea
                    config.options.plugins.annotation.annotations.line1.xMin = 0; // Iniciar en el borde izquierdo
                    config.options.plugins.annotation.annotations.line1.xMax = data.labels.length - 1; // Terminar en el borde derecho
                    config.options.plugins.annotation.annotations.line1.yMin = barValue - 10; // Mantener en el valor de la barra seleccionada menos un margen
                    config.options.plugins.annotation.annotations.line1.yMax = barValue - 10; // Asegurar que sea horizontal
                    
                    // Habilitar la etiqueta y asignar el número correspondiente a la derecha de la línea
                    config.options.plugins.annotation.annotations.line1.label.enabled = true;
                    config.options.plugins.annotation.annotations.line1.label.content = barValue;

                    // Actualizar el gráfico para mostrar la línea y cambiar colores
                    myChart.update();
                }
            }
        }
    };

    // Crear gráfico
    const myChart = new Chart(ctx, config);
</script>
@endsection