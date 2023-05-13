<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar ubicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Editar ubicación:</h2>
                    <form method="POST" action="{{ route('ubicaciones.update', $ubicacion->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $ubicacion->nombre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="calle" class="block text-gray-700 font-bold mb-2">Calle:</label>
                            <input type="text" name="calle" id="calle" value="{{ $ubicacion->calle }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="localidad" class="block text-gray-700 font-bold mb-2">Localidad:</label>
                            <input type="text" name="localidad" id="localidad" value="{{ $ubicacion->localidad }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" style="background-color: orange;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
