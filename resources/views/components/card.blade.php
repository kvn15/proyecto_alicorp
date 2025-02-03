<div class="col" id="card-{{ $id }}">
    <div {{ $attributes->merge(['class' => 'card']) }}>
        <div class="d-flex flex-column align-items-center imagenes-card">
            <img src="{{ asset($image1) }}" alt="" class="img-pro-1">
            <img src="{{ asset($image2) }}" alt="" class="img-pro-3">
            <img src="{{ asset($image3) }}" alt="" class="position-absolute img-pro-2">
            <img src="{{ asset($image4) }}" alt="" class="img-pro-4">
            <img src="{{ asset($image5) }}" alt="" class="img-pro-5">
            <img src="{{ asset($image6) }}" alt="" class="img-pro-6">
        </div>

        <div class="card-body text-center">
            <h5 class="card-title">{!! $title !!}</h5>
            <button class="btn-open" data-modal="modal-{{ $id }}">VER MÁS</button>            
        </div>
    </div>
    <div class="modal" id="modal-{{ $id }}">
        <div class="modal-content">
            <img src="{{ asset($modalImage) }}" alt="">
            <div class="d-flex justify-content-around mt-5">
                <p><i class="fa fa-calendar me-2"></i> <span class="calendar">{{ $eventDate }}</span> </p>
                <p><i class="fa fa-map-marker me-2"></i><span class="map">{{ $eventLocation }}</span></p>
            </div>
            <h2 class="mt-0">{{ $modalTitle }}</h2>
            <p>{{ $modalDescription }}</p>
            <button class="btn-close"><i class="fa fa-times"></i></button>
            <div class="mt-4">
                <button class="btn btn-danger vm">VER MÁS</button>
            </div>
        </div>
    </div>
</div>
