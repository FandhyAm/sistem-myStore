@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-danger">
            {{ __('Masukan kelengkapan data dengan valid dan lengkap') }}
        </div>

    </div>
@endif
