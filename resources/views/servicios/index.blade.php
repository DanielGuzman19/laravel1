<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Servicios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Nombre del servicio
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Descripción
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Precio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                @forelse($servicios as $servicio)
                                    <td class="px-6 py-4">
                                        {{ $servicio->nombre }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $servicio->descripcion }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{ $servicio->precio }}
                                    </td>
                                    <td class="px-6">
                                        <div class="inline-flex rounded-md shadow-s">
                                            <a href="{{ route('servicios.edit', $servicio->id) }}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editar</a>
                                            <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <span>No se encontraron servicios</span>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- mostrar los botones de la paginacion --}}
                        <div class="mt-4">
                            {{ $servicios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
