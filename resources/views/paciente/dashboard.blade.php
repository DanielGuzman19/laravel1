<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-blue-700 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-6">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-white uppercase bg-blue-600">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nombre Paciente</th>
                            <th scope="col" class="px-6 py-3">Correo</th>
                            <th scope="col" class="px-6 py-3">Teléfono</th>
                            <th scope="col" class="px-6 py-3">Fecha Nacimiento</th>
                            <th scope="col" class="px-6 py-3">Género</th>
                            <th scope="col" class="px-6 py-3">Edad</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pacientes as $paciente)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->apellido_m }}
                                </td>
                                <td class="px-6 py-4">{{ $paciente->correo }}</td>
                                <td class="px-6 py-4">{{ $paciente->telefono }}</td>
                                <td class="px-6 py-4">{{ $paciente->fecha_nacimiento }}</td>
                                <td class="px-6 py-4">{{ $paciente->genero_biologico }}</td>
                                <td class="px-6 py-4">{{ $paciente->age }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('paciente.edit', $paciente->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
                <div class="mt-6 flex justify-end space-x-4">
                    <button onclick="window.location.href='cita/agendar'" type="button" class="text-white bg-gradient-to-r from-green-400 to-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fas fa-calendar-plus mr-2"></i>Agendar Cita
                    </button>
                    
                    <button onclick="window.location.href='pacientes/registrar_pacientes'" type="button" class="text-white bg-gradient-to-r from-green-400 to-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fas fa-user-plus mr-2"></i>Registrar Nuevo Paciente
                    </button>
                </div>
                
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</x-app-layout>
