
<a href="{{ $ruta_name }}" class="card-promo">
    
    <div class="card-promo-header">
        <div class="img-promo" style="background-image: url({{$img_promo}})"></div>
    </div>
    <div class="card-body">
        <p class="m-0"><b>{{ $name_promo }}</b></p>
        <p class="m-0">Fecha: {{ $fecha_promo }}</p>
    </div>
    @if (!isset($status_promo) || $status_promo != '1')
    <div class="card-footer">
        <div class="bage-inactivo">
            Inactivo
        </div>
    </div>
    @else
    <div class="card-footer">
        <div class="bage-activo">
            Activo
        </div>
    </div>
    @endif

</a>