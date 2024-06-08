<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendar cita') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('agendas.store') }}">
                @csrf

                <!-- Nombre del Paciente -->
                <div class="mt-4">
                    <x-input-label for="id_paciente_agenda" :value="__('Nombre del Paciente')" />
                    <select id="id_paciente_agenda" name="id_paciente_agenda" class="block mt-1 w-full">
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nombre_completo }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_paciente_agenda')" class="mt-2" />
                </div>

                <!-- Fecha -->
                <div class="mt-4">
                    <x-input-label for="fecha" :value="__('Fecha')" />
                    <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')" required />
                    <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
                </div>

                <!-- Teléfono -->
                <div class="mt-4">
                    <x-input-label for="telefono" :value="__('Teléfono')" />
                    <x-text-input id="telefono" class="block mt-1 w-full" type="tel" name="telefono" :value="old('telefono')" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Registrar cita') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
