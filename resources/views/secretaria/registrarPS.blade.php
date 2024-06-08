<!-- resources/views/secretaria/registrarP.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registro de pacientes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('patients.store') }}">
                @csrf

                <!-- Nombre -->
                <div>
                    <x-input-label for="name" :value="__('Nombre completo')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Fecha de Nacimiento -->
                <div class="mt-4">
                    <x-input-label for="birthdate" :value="__('Fecha de nacimiento')" />
                    <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
                    <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                </div>

                <!-- Género -->
                <div class="mt-4">
                    <x-input-label for="sex" :value="__('Género')" />
                    <select id="sex" name="sex" class="block mt-1 w-full">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                </div>

                <!-- Teléfono -->
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Teléfono')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
