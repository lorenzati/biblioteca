<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center pt-8 px-4 pb-20 text-center">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left
            overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div>
                        <div class="mb-6">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                Gestión de libros
                            </h2>
                        </div>
                        
                        <div class="mb-4">
                            <label for="titulo"
                                class="block text-gray-700 text-sm font-bold mb-2"><strong>Titulo</strong><span class="text-red-500">*</span></label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="titulo" placeholder="Ingrese el titulo" wire:model="titulo">
                            @error('titulo') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>                        

                        <div class="mb-4">
                            <label for="descripcion"
                                class="block text-gray-700 text-sm font-bold mb-2"><strong>Descripcion</strong><span class="text-red-500">*</span></label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="descripcion" placeholder="Ingrese el descripcion" wire:model="descripcion">
                            @error('descripcion') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="cantidad_paginas"
                                class="block text-gray-700 text-sm font-bold mb-2"><strong>Cantidad Pag.</strong><span class="text-red-500">*</span></label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="cantidad_paginas" placeholder="Ingrese el cantidad_paginas" wire:model="cantidad_paginas">
                            @error('cantidad_paginas') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="autor"
                                class="block text-gray-700 text-sm font-bold mb-2"><strong>Autor</strong><span class="text-red-500">*</span></label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="autor" placeholder="Ingrese el autor" wire:model="autor">
                            @error('autor') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="editorial"
                                class="block text-gray-700 text-sm font-bold mb-2"><strong>Editorial</strong><span class="text-red-500">*</span></label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="editorial" placeholder="Ingrese el editorial" wire:model="editorial">
                            @error('editorial') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="fecha_publicacion"
                                class="block text-gray-700 text-sm font-bold mb-2"><strong>Fecha de Publicacion</strong><span class="text-red-500">*</span></label>
                            <input type="date"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="fecha_publicacion" placeholder="Ingrese el fecha_publicacion" wire:model="fecha_publicacion">
                            @error('fecha_publicacion') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <input type="checkbox"
                                class="inline-block shadow appearance-none border rounded text-blue-500 leading-tight focus:outline-none focus:shadow-outline"
                                id="activa" wire:model="activa"><strong> Activa</strong>
                            @error('activa') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-4 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-2 mr-2 sm:w-auto">
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-500 text-base leading-6 font-bold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-500 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Guardar
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-red-600 px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:text-white focus:outline-none focus:border-red-600 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancelar
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
