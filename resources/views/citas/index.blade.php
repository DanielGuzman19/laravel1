<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="mr-5">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Citas') }}
                </h2>
            </div>
            <a href="{{ route('citas.create') }}" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Crear</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="grid gap-6 md:grid-cols-2">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                Nombre del paciente
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                Estado
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                        @forelse($citas as $cita)
                                            <td class="px-6 py-4">
                                                {{ $cita->paciente->nombre }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $cita->estado }}
                                            </td>
                                            <td class="px-6">
                                                <div class="inline-flex rounded-md shadow-s">
                                                    <a href="{{ route('citas.edit', $cita->id) }}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editar</a>
                                                    <form action="{{ route('citas.destroy', $cita->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Eliminar</button>
                                                    </form>
                                                    <a href="{{ route('citas.show', $cita->id) }}" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Mostrar</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                            <span>No se encontraron pacientes</span>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        {{-- mostrar los botones de la paginacion --}}
                        <div class="mt-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
