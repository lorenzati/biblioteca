@php
    use App\Models\User;        
    use App\Models\Libro;
@endphp

@php           
    $libros = Libro::all();
    $usuarios = User::all();
@endphp

<div class="grid grid-cols-1 p-6 md:grid-cols-4 gap-6">
        
    <x-cards href="{{ route('libros') }}">
        <x-slot name="color">white</x-slot>
        <x-slot name="tamanioTexto">2xl</x-slot>
        <x-slot name="icono"><i class="fa fa-search text-4xl text-white"></i></x-slot>
        <x-slot name="texto">Libros</x-slot>
        <x-slot name="contador"><p class="text-white text-4xl">{{count($libros)}}</p></x-slot>
    </x-cards>

    <x-cards href="{{ url('/user/profile') }}">
        <x-slot name="color">white</x-slot>
        <x-slot name="tamanioTexto">2xl</x-slot>
        <x-slot name="icono"><i class="fa fa-search text-4xl text-white"></i></x-slot>
        <x-slot name="texto">Usuarios</x-slot>
        <x-slot name="contador"><p class="text-white text-4xl">{{count($usuarios)}}</p></x-slot>
    </x-cards>
        
</div>