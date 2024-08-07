<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nueva Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('citas.store') }}" method="POST" novalidate>
                    @csrf

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <div class="grid gap-6 mb-6 w-1/2 mx-auto">
                            <h1 class="flex items-center text-5xl font-extrabold dark:text-white">Datos</h1>
                            <div>
                                <label for="paciente_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paciente</label>
                                <select name="paciente_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="cuenta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cuenta</label>
                                <input name="cuenta" type="number" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <div class="flex items-center mb-4">
                                    <input name="factura" value="si" id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="factura" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Factura</label>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center mb-4">
                                    <input name="pagado" value="si" id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="pagado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pagado</label>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center mb-4">
                                    <input name="estado" value="En curso" id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="estado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">En curso / Pendiente</label>
                                </div>
                            </div>
                            <div>
                                <label for="motivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivo</label>
                                <input name="motivo" type="text" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="retroalimentacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Retroalimentación</label>
                                <input name="retroalimentacion" type="text" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <h1 class="flex items-center text-5xl font-extrabold dark:text-white">Tratamiento</h1>
                            <button type="button" id="nuevo" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">+</button>
                            <div class="" id="tratamientos">
                                <div class="grid gap-6 mb-6 md:grid-cols-3">
                                    <label for="retroalimentacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tomar hasta</label>
                                    <label for="retroalimentacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descipción</label>
                                    <label for="retroalimentacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medicamento</label>
                                </div>
                            </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
document.getElementById('nuevo').addEventListener('click', function() {
    // Crear el nuevo div
    var nuevoDiv = document.createElement('div');
    nuevoDiv.classList.add('grid', 'gap-6', 'mb-6', 'md:grid-cols-3');

    // Crear el input para la fecha de tratamiento
    var fechaTratamiento = document.createElement('input');
    fechaTratamiento.setAttribute('name', 'fecha_tratamiento[]');
    fechaTratamiento.setAttribute('type', 'date');
    fechaTratamiento.setAttribute('class', 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500');
    fechaTratamiento.setAttribute('placeholder', 'Paracetamil');
    fechaTratamiento.required = true;

    // Crear el input para la descripción del tratamiento
    var descTratamiento = document.createElement('input');
    descTratamiento.setAttribute('name', 'desc_tratamiento[]');
    descTratamiento.setAttribute('type', 'text');
    descTratamiento.setAttribute('class', 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500');
    descTratamiento.setAttribute('placeholder', 'Tomar cada 8h');
    descTratamiento.required = true;

    var selectMedicamento = document.createElement('select');
    selectMedicamento.setAttribute('name', 'medicamento_id[]');
    selectMedicamento.setAttribute('class', 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500');

    // Añadir opciones al select
    @foreach($medicamentos as $medicamento)
        var option = document.createElement('option');
        option.value = '{{ $medicamento->id }}';
        option.text = '{{ $medicamento->nombre }}';
        selectMedicamento.appendChild(option);
    @endforeach

    // Añadir los inputs al nuevo div
    nuevoDiv.appendChild(fechaTratamiento);
    nuevoDiv.appendChild(descTratamiento);
    nuevoDiv.appendChild(selectMedicamento);

    // Añadir el nuevo div al div con id tratamientos
    document.getElementById('tratamientos').appendChild(nuevoDiv);
});
</script>
