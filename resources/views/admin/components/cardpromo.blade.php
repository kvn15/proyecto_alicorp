
<a href="{{ $ruta_name }}" class="card-promo">
    
    <div class="card-promo-header">
        <div class="img-promo" style="background-image: url({{$img_promo}})"></div>
    </div>
    <div class="card-body">
        <p class="m-0"><b>{{ $name_promo }}</b></p>
        <p class="m-0">Fecha: {{ $fecha_promo }}</p>
    </div>
    
    @if ($status_promo == '1')
    <div class="bage-activo">
        Activo
    </div>
    @endif
    @if ($status_promo == '0')
    <div class="bage-inactivo">
        Inactivo
    </div>
    @endif
    @if ($status_promo == '2')
    <div class="bage-finalizado">
        Finalizado
    </div>
    @endif

</a>