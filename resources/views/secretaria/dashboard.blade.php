<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Secretaria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Próximas citas") }}
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre del paciente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo de cita
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Médico
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Horario
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                John Doe
                            </th>
                            <td class="px-6 py-4">
                                Consulta general
                            </td>
                            <td class="px-6 py-4">
                                Dr. Smith
                            </td>
                            <td class="px-6 py-4">
                                10:00 AM
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Jane Smith
                            </th>
                            <td class="px-6 py-4">
                                Revisión general
                            </td>
                            <td class="px-6 py-4">
                                Dra. Johnson
                            </td>
                            <td class="px-6 py-4">
                                11:30 AM
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Michael Brown
                            </th>
                            <td class="px-6 py-4">
                                Chequeo médico
                            </td>
                            <td class="px-6 py-4">
                                Dr. Davis
                            </td>
                            <td class="px-6 py-4">
                                2:00 PM
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Últimas citas") }}
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre del paciente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo de cita
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Médico
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de atención
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reporte
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                John Doe
                            </th>
                            <td class="px-6 py-4">
                                Consulta general
                            </td>
                            <td class="px-6 py-4">
                                Dr. Smith
                            </td>
                            <td class="px-6 py-4">
                                2023-06-01
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ver</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Jane Smith
                            </th>
                            <td class="px-6 py-4">
                                Revisión general
                            </td>
                            <td class="px-6 py-4">
                                Dra. Johnson
                            </td>
                            <td class="px-6 py-4">
                                2023-06-01
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ver</a>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Michael Brown
                            </th>
                            <td class="px-6 py-4">
                                Chequeo médico
                            </td>
                            <td class="px-6 py-4">
                                Dr. Davis
                            </td>
                            <td class="px-6 py-4">
                                2023-06-01
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ver</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
