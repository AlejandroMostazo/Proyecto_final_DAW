
<x-app-layout>
    <x-slot name="header"> 
        <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet" type="text/css" >
        <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script defer src="{{ mix('js/filtro.js') }}"></script>
        <script defer src="{{ mix('js/verApuntados.js') }}"></script>
    </x-slot>
    <div>    
        @if (Auth::user()) 
            <div id="filtros" class="space-between">
                <span id="activefilters" class="btnf">
                    <i class="fa-solid fa-filter"></i>
                    <span>Filtros</span>
                </span>
                
                <div class="flex-center">
                    @if (Auth::user() && $user->publicacion_id != null)
                    <a  class="btn btnspublicacion" href="{{ route('publicacion.desapuntarse') }}"><i class="fa-solid fa-user-minus"></i> Desapuntarse</a>
                    @endif
                    
                    @if (Auth::user() && \App\Models\Publicacion::where('user_id', '=', $user->id)->count() > 0)
                        @php
                            $publicacion = \App\Models\Publicacion::where('user_id', $user->id)->first();
                        @endphp
                        <a href="{{ route('apuntados', ['id' => $publicacion->id]) }}" class="btn btnspublicacion" type="submit"><i class="bi bi-tag-fill"></i> Mi Publicación</a>
                        <form action="{{ route('publicacion.delete')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btnspublicacion" type="submit"><i class="bi bi-trash3-fill"></i> Eliminar Publicacción</button>
                        </form>
                    @endif
                </div>
            </div>
        @endif

        <!-- Filtros -->
            
        <form method="POST" id="formfiltro" action="{{ route('publicaciones.filtrar') }}">

            <div class="space-around" style="text-align: center; padding: 20px 0">
                <div>
                    <input class="selectFiltro" type="date" name="fecha" id="fecha" min="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <div id="selctDeportes" class="selectFiltro" >
                        <option >Deportes </option>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div id="contentDeportes">
                        @foreach($deportes as $deporte)
                            <input class="hidden" type="checkbox" name="deportes[]" value="{{ $deporte->id }}" id="{{ $deporte->nombre }}">
                            <div>
                                <label class="labelcheck"  for="{{ $deporte->nombre }}" >{{ $deporte->nombre }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <div id="selctUbicaciones" class="selectFiltro" >
                        <option >Ubicaciones </option>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div id="contentUbicaciones">
                        @foreach($ubicaciones as $ubicacion)
                        <input class="hidden" type="checkbox" name="ubicaciones[]" value="{{ $ubicacion->id }}" id="{{ $ubicacion->nombre }}">
                            <div>
                                <label class="labelcheck"  for="{{ $ubicacion->nombre }}">{{ $ubicacion->nombre }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <div id="selctDestreza" class="selectFiltro" >
                        <option>Destreza </option>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div id="contentDestrezas">
                        <div>
                            <input class="hidden" type="checkbox" name="nivel[]" value="Principiante" id="Principiante">
                            <label class="labelcheck" for="Principiante">Principiante</label>
                        </div>
                        <div>
                            <input class="hidden" type="checkbox" name="nivel[]" value="Intermedio" id="Intermedio">
                            <label class="labelcheck" for="Intermedio">Intermedio</label>
                        </div>
                        <div>
                            <input class="hidden" type="checkbox" name="nivel[]" value="Profesional" id="Profesional">
                            <label class="labelcheck" for="Profesional">Profesional</label>
                        </div>      
                    </div>
                </div>
                <button class="btn" style="transform: scale(0.8);" type="reset"><i class="fa-solid fa-broom"></i> Limpiar</button>
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
                        <td class="contentnivel" style="text-align: center;" >          
                            <p class="nivel_publicacion">{{ $publicacion->nivel }}</p>
                        </td>
                        <td>
                            {{ $publicacion->ac_apuntados }}
                            /
                            {{ $publicacion->num_max_apuntados }}
                        </td>
                        @if (Auth::user() && $user->publicacion_id == null && $publicacion->user_id != $user->id && $publicacion->ac_apuntados < $publicacion->num_max_apuntados)
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


