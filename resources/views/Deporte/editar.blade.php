<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Editar deporte:</h2>
                    <form method="POST" action="{{ route('deportes.update', $deporte->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $deporte->nombre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="icono" class="block text-gray-700 font-bold mb-2">icono:</label>
                            <input type="text" name="icono" id="icono" value="{{ $deporte->icono }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="color" class="block text-gray-700 font-bold mb-2">color:</label>
                            <input type="color" name="color" id="color" value="{{ $deporte->color }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
