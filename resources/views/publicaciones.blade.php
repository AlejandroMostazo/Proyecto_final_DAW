
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
                     <form method="POST" id="formfiltro" action="{{ route('publicaciones.filtrar') }}">
                        <div class="flex items-center space-x-4 mb-4">
                            <div>
                                <label class="text-gray-700" for="deporte">Deporte:</label>
                                    @foreach($deportes as $deporte)
                                        <div>
                                            <input type="checkbox" name="deportes[]" value="{{ $deporte->id }}" id=" $deporte->id ">
                                            <label for="checkbox{{ $deporte->id }}" >{{ $deporte->nombre }}</label>
                                        </div>
                                    @endforeach


                                <!-- </select> -->
                            </div>
                            <div>
                                <label class="text-gray-700" for="ubicacion">Ubicación:</label>
                                @foreach($ubicaciones as $ubicacion)
                                    <div>
                                        <input type="checkbox" name="ubicaciones[]" value="{{ $ubicacion->id }}" id=" $ubicacion->id">
                                        <label for="checkbox{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <label class="text-gray-700" for="nivel">Nivel:</label>
                                <div>
                                    <input type="checkbox" name="nivel[]" value="Principiante" id="Principiante">
                                    <label for="Principiante">Principiante</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="nivel[]" value="Intermedio" id="Intermedio">
                                    <label for="Intermedio">Intermedio</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="nivel[]" value="Profesional" id="Profesional">
                                    <label for="Profesional">Profesional</label>
                                </div>      
                            </div>
                            <div>
                                <label class="text-gray-700" for="fecha">Fecha:</label>
                                <input type="date" name="fecha" id="fecha" class="block w-full mt-1">
                            </div>
                        </div>
                    </form>

                    <table id="tablaPublicaciones" class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2">Deporte</th>
                                <th class="px-4 py-2">Nivel</th>
                                <th class="px-4 py-2">Fecha y Hora</th>
                                <th class="px-4 py-2">Ubicación</th>
                                <th class="px-4 py-2">Apuntados</th>
                                <th class="px-4 py-2">Max. Apuntados</th>
                                @if ($user->publicacion_id != null)
                                    <th style="background-color:salmon;" class="px-4 py-2">
                                        <a href="{{ route('publicacion.desapuntarse') }}">Desapuntarse</a>
                                    </th>
                                @endif
                                @if ($publicaciones->where('user_id', '=', $user->id)->count() > 0)
                                    <th>
                                        <form action="{{ route('publicacion.delete')}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="background-color:tomato;" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded bg-blue-700" type="submit">Eliminar Publicaccion</button>
                                        </form>
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publicaciones as $publicacion)
                                <tr>
                                    <td>
                                        <a href="{{ route('apuntados', ['id' => $publicacion->id]) }}">VER</a>
                                    </td>
                                    <td class="border px-4 py-2">{{ $publicacion->deporte->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->nivel }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->fecha_hora }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->ubicacion->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->ac_apuntados }}</td>
                                    <td class="border px-4 py-2">{{ $publicacion->num_max_apuntados }}</td>
                                    @if ($user->publicacion_id == null && $publicacion->user_id != $user->id)
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ mix('js/filtro.js') }}"></script>

