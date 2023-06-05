
<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Ubicaciones:</h2>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Calle</th>
                                <th class="px-4 py-2">Localidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ubicaciones as $ubicacion)
                                <tr>
                                    <td class="border px-4 py-2">{{ $ubicacion->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $ubicacion->calle }}</td>
                                    <td class="border px-4 py-2">{{ $ubicacion->localidad }}</td>
                                    @if (Auth::user()->admin)
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('ubicaciones.edit', $ubicacion->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                            <form action="{{ route('ubicaciones.delete', $ubicacion->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: red;" class="bg-red hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
