
<x-app-layout>
    <x-slot name="header"> 
    </x-slot>
    <div>
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

        @if ($user->publicacion_id != null)
                <a style="background-color:salmon;" class="px-4 py-2" href="{{ route('publicacion.desapuntarse') }}">Desapuntarse</a>
        @endif
        @if ($publicaciones->where('user_id', '=', $user->id)->count() > 0)
                <form action="{{ route('publicacion.delete')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="background-color:tomato;" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded bg-blue-700" type="submit">Eliminar Publicaccion</button>
                </form>
        @endif
        <table id="tablaPublicaciones" class="table-auto w-full">
            <tbody>
                @foreach($publicaciones as $publicacion)
                    <tr class="border-publicaciones">
                        <td>
                            <a href="{{ route('apuntados', ['id' => $publicacion->id]) }}">VER</a>
                        </td>
                        <td class="title-publicacion" >{{ $publicacion->deporte->nombre }}
                            <p class="text-publicacion"><i class="fa-solid fa-location-dot"></i> {{ $publicacion->ubicacion->calle }}</p>
                            <p class="text-publicacion"><i class="fa-regular fa-clock"></i> {{ $publicacion->fecha_hora }}</p>
                        </td>
                        <td style="text-align: center;">
                                <div class="principiante inline-flex"></div>
                                <div class="intermedio inline-flex"></div>
                                <div class="profesional inline-block"></div>             
                                <p>{{ $publicacion->nivel }}</p> 
                        </td>
                        <td >{{ $publicacion->ac_apuntados }}</td>
                        <td >{{ $publicacion->num_max_apuntados }}</td>
                        @if ($user->publicacion_id == null && $publicacion->user_id != $user->id)
                            <td>
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
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ mix('js/filtro.js') }}"></script>

