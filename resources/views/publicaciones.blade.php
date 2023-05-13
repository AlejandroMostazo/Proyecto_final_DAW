<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Publicaciones:</h2>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Deporte</th>
                                <th class="px-4 py-2">Nivel</th>
                                <th class="px-4 py-2">Fecha y Hora</th>
                                <th class="px-4 py-2">Ubicación</th>
                                <th class="px-4 py-2">Apuntados</th>
                                <th class="px-4 py-2">Max. Apuntados</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publicaciones as $publicacion)
                                <tr>
                                    <td class="border px-4 py-2">{{ $publicacion->deporte->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->nivel }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->fecha_hora }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->ubicacion->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->ac_apuntados }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->num_max_apuntados }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
