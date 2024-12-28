@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600" style="color: black; font-size: 20px">
            {{ __('Ups! Algo salió mal.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600" style="color: black; font-size: 15px">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
