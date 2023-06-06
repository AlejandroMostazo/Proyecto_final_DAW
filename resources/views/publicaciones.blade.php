
<x-app-layout>
    <x-slot name="header"> 
        <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet" type="text/css" >
        <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script defer src="{{ mix('js/filtro.js') }}"></script>
        <script defer src="{{ mix('js/verApuntados.js') }}"></script>
    </x-slot>
    <div>    
        @if (Auth::user())
            <div id="filtros" class="links ">
                    <span id="activefilters">
                        <i class="fa-solid fa-filter"></i>
                        <span>Filtros</span>
                    </span>
                
                    
                @if (Auth::user() && $user->publicacion_id != null)
                    <a style="background-color: tomato;" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded bg-blue-700" href="{{ route('publicacion.desapuntarse') }}"><i class="fa-solid fa-user-minus"></i> Desapuntarse</a>
                @endif

                @if (Auth::user() && \App\Models\Publicacion::where('user_id', '=', $user->id)->count() > 0)
                    @php
                        $publicacion = \App\Models\Publicacion::where('user_id', $user->id)->first();
                    @endphp
                    <form action="{{ route('publicacion.delete')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="background-color:firebrick;" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded bg-blue-700" type="submit"><i class="fa-solid fa-trash"></i> Eliminar Publicacción</button>
                        <a href="{{ route('apuntados', ['id' => $publicacion->id]) }}" style="background-color:firebrick;" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded bg-blue-700" type="submit"> Mi Publicación</a>
                    </form>
                @endif
            </div>
        @endif

        <!-- Filtros -->
            
        <form method="POST" id="formfiltro" action="{{ route('publicaciones.filtrar') }}">
            <div class="flex items-center space-x-4 mb-4 ">
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

        
        <table id="tablaPublicaciones">
            <tbody>
                @foreach($publicaciones as $publicacion)
                    <tr class="border-publicaciones">
                        <td class="tdpublicaciones">
                            <i style="color: {{ $publicacion->deporte->color }}" class="{{ $publicacion->deporte->icono }} iconosDeportes"></i>
                            <div>
                                <p class="title-publicacion">{{ $publicacion->deporte->nombre }}</p>
                                <a class="verapuntados" href="{{ route('apuntados', ['id' => $publicacion->id]) }}"></a>
                                <p class="text-publicacion"><i class="fa-solid fa-location-dot"></i> {{ $publicacion->ubicacion->calle }}, {{ $publicacion->ubicacion->localidad }}</p>
                                <p class="text-publicacion"><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $publicacion->fecha_hora)->formatLocalized('%d  %b  %Y, %H:%I') }}</p>
                            </div>
                        </td>
                        <td style="text-align: center;" >
                            <div class="principiante inline-flex"></div>
                            <div class="intermedio inline-flex"></div>
                            <div class="profesional inline-flex"></div>             
                            <p>{{ $publicacion->nivel }}</p> 
                        </td>
                        <td>
                            {{ $publicacion->ac_apuntados }}
                            /
                            {{ $publicacion->num_max_apuntados }}
                        </td>
                        @if (Auth::user() && $user->publicacion_id == null && $publicacion->user_id != $user->id)
                            <td>
                                <form method="POST" action="{{ route('publicacion.apuntarse', ['id' => $publicacion->id]) }}">
                                    @csrf
                                    <button class="icons iconoapuntarse" type="submit"><i style="font-size: xx-large;" class="fa-solid fa-plus"></i></button>
                                </form>
                            </td>
                        @endif    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


