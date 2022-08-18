<a {{ $attributes }}>
    <div class="p-6 bg-gray-900 rounded-lg shadow text-{{ $color }}">
        <div class="flex items-center" style="display: inline-block">
            @if ( !empty($icono) )
                {{ $icono }}
            @endif
            <div class="mt-2 text-{{ $tamanioTexto }} leading-7 font-semibold">
                {{ $texto }}
            </div>
        </div>
        <div class="ml-12 text-right" style="float:right">
            <div>
                {{ $contador }}
            </div>
        </div>
    </div>
</a>
