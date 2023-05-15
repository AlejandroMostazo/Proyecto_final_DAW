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

                     <!-- Filtros -->
                     <form method="GET" action="{{ route('publicaciones.filtrar') }}">
                        <div class="flex items-center space-x-4 mb-4">
                            <div>
                                <label class="text-gray-700" for="deporte">Deporte:</label>
                                <select name="deporte_id" id="deporte_id" class="block w-full mt-1">
                                    <option value="">Todos</option>
                                    @foreach($deportes as $deporte)
                                        <option value="{{ $deporte->id }}">{{ $deporte->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700" for="ubicacion">Ubicación:</label>
                                <select name="ubicacion" id="ubicacion" class="block w-full mt-1">
                                    <option value="">Todas</option>
                                    @foreach($ubicaciones as $ubicacion)
                                        <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700" for="nivel">Nivel:</label>
                                <select name="nivel" id="nivel" class="block w-full mt-1">
                                    <option value="">Todos</option>
                                    <option value="Principiante">Principiante</option>
                                    <option value="Intermedio">Intermedio</option>
                                    <option value="Profesional">Profesional</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700" for="fecha">Fecha:</label>
                                <input type="date" name="fecha" id="fecha" class="block w-full mt-1">
                            </div>
                            <div>
                                <button style="background-color: teal;" type="submit" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded bg-blue-700">Filtrar</button>
                            </div>
                        </div>
                    </form>

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
                                    @if(!($publicacion->ac_apuntados >= $publicacion->num_max_apuntados))
                                        <td class="border px-4 py-2">
                                            <form method="POST" action="{{ route('publicacion.apuntarse', ['id' => $publicacion->id]) }}">
                                                @csrf
                                                <button type="submit">Apuntarse</button>
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
