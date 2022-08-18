@section('title')
    Gestión de libros
@endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de libros
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session()->has('message'))
        <div class="max-w-7xl mx-auto mb-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-lg px-4 py-4">
                <div class="text-gray-900" role="alert">
                    <div class="text-xl">
                        <div class="relative">
                            <span class="left-0"><i class="fa fa-info"></i> {{ session('message') }}</span>
                            <fom>
                            <button wire:click.prevent="render()" type="button" class="absolute right-0">
                                <i class="fa fa-times"></i>
                            </button>
                            </fom>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="max-w-7xl mx-auto mb-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-lg px-4 py-4">
                <div class="text-gray-900" role="alert">
                    <div class="text-xl">

                        
                            <button wire:click="create()"
                            class="rounded border-b px-4 py-1 bg-green-500 text-white cursor-pointer">
                                Crear
                            </button>
                        

                        <button wire:click="clearFilters()"
                        class="rounded border-b px-4 py-1 bg-gray-900 text-white cursor-pointer">
                            Sync
                        </button>

                        <select wire:model="cantPag" class="mt-2 shadow appearance-none border rounded py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="20">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>

                        <input type="text" wire:keyup="render()"
                            class="mt-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="buscar" placeholder="Buscar..." wire:model="buscar" autofocus autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-lg px-4 py-4 relative">
                @if($isModalOpen)
                    @include('livewire.libro.create')
                @endif
                <div class="shadow border-b border-gray-200" style="overflow-x:scroll">
                    <table class="w-full bg-white">
                        <thead class="bg-gray-900 text-white rounded">                            
                            <tr>
                                <th wire:click="sortBy('libros.id')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Nro @if($campo === 'libros.id') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th wire:click="sortBy('libros.titulo')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Titulo @if($campo === 'libros.titulo') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th wire:click="sortBy('libros.descripcion')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Descripcion @if($campo === 'libros.descripcion') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th wire:click="sortBy('libros.cantidad_paginas')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Cant. Pag. @if($campo === 'libros.cantidad_paginas') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th wire:click="sortBy('libros.autor')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Autor @if($campo === 'libros.autor') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th wire:click="sortBy('libros.editorial')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Editorial @if($campo === 'libros.editorial') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th wire:click="sortBy('libros.fecha_publicacion')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Fecha Publicacion @if($campo === 'libros.fecha_publicacion') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th wire:click="sortBy('libros.activa')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Estado @if($campo === 'libros.activa') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th wire:click="sortBy('libros.deleted_at')" class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm">Status @if($campo === 'libros.deleted_at') <i class="fa fa-chevron-{{$simbolo}}"></i>@endif </th>
                                <th class="w-1/6 text-left py-4 px-4 uppercase font-semibold text-sm"></td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @if(count($libros)>0)
                                @foreach($libros as $libro)
                                <tr class="even:bg-white odd:bg-gray-100">
                                    <td class="w-1/6 text-left py-3 px-4">{{ $libro->id }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $libro->titulo }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $libro->descripcion }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $libro->cantidad_paginas }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $libro->autor }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $libro->editorial }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $libro->fecha_publicacion }}</td>                                

                                    <td class="w-1/6 text-left py-3 px-4">
                                        @if($libro->activa==1)
                                            <div class="text-green-500">Activa</div>
                                        @else
                                            <div class="text-red-500">Inactiva</div>
                                        @endif
                                    </td>

                                    <td class="w-1/6 text-left py-3 px-4">
                                        @if($libro->deleted_at=='')
                                            <div class="text-green-500">Ok</div>
                                        @else
                                            <div class="text-red-500">Borrada</div>
                                        @endif
                                    </td>

                                    <td class="w-1/6 text-left py-3 px-4">
                                        
                                            <button wire:click="edit({{ $libro->id }})" class="rounded border-b px-4 py-2 mr-2 bg-green-500 text-white cursor-pointer">
                                                Editar
                                            </button>
                                        
                                            @if($libro->deleted_at=='')
                                            <button wire:click="delete({{ $libro->id }})" class="rounded border-b px-4 py-2 bg-red-600 text-white cursor-pointer">
                                                Borrar
                                            </button>
                                            @elseif($libro->deleted_at!='')
                                                <button wire:click="restaurar({{ $libro->id }})" class="rounded border-b px-4 py-2 bg-yellow-500 text-white cursor-pointer">
                                                    Restaurar
                                                </button>
                                            @endif
                                        
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="w-6/6 text-left py-3 px-4 text-center">No se encontraron resultados</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="px-4 py-3">
                        {{ $libros->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

