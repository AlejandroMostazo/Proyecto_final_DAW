
<x-app-layout>
    <x-slot name="header"> 
        <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet" type="text/css" >
        <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script defer src="{{ mix('js/filtro.js') }}"></script>
        <script defer src="{{ mix('js/verApuntados.js') }}"></script>
    </x-slot>

    <div style="height: 82vh;">    
        @if (Auth::user()) 
            <div id="filtros" class="space-between">
                <span id="activefilters" class="btnf">
                    <i class="fa-solid fa-filter"></i>
                    <span>{{ __('Filtros')}}</span>
                </span>
                
                <div class="flex-center">
                    @if (Auth::user() && $user->publicacion_id != null)
                    <a class="btn btnspublicacion" style="text-align: center; padding:7px 12px" href="{{ route('apuntados', ['id' => Auth::user()->publicacion_id]) }}"><i class="fa-solid fa-eye"></i></a>
                    @endif
                    @if (Auth::user() && $user->publicacion_id != null && \App\Models\Publicacion::where('user_id', Auth::user()->id)->count() == 0)
                    <a  class="btn btnspublicacion" href="{{ route('publicacion.desapuntarse') }}"><i class="fa-solid fa-user-minus"></i> {{__('Desapuntarse')}}</a>
                    @endif
                    @if (Auth::user() && \App\Models\Publicacion::where('user_id', '=', $user->id)->count() > 0)
                        <a href="{{ route('publicacion.edit', ['id' => \App\Models\Publicacion::where('user_id', $user->id)->first()]) }}" class="btn btnspublicacion" type="submit"><i class="bi bi-tag-fill"></i> {{__('Mi Publicación')}}</a>
                    @endif
                </div>
            </div>
        @endif

        <!-- Filtros -->
            
        <form method="POST" id="formfiltro" action="{{ route('publicaciones.filtrar') }}">

            <div class="space-around" id="contentFiltros" style="text-align: center; padding: 20px 0">
                <div>
                    <input class="selectFiltro" type="date" name="fecha" id="fecha" min="{{ date('Y-m-d') }}">
                </div>
                <div class="flex-center">
                    <div id="selctDeportes" class="selectFiltro" >
                        <option >{{__('Deportes')}} </option>
                        <i class="fa-solid fa-angle-down"></i>
                        <div id="contentDeportes">
                            @foreach($deportes as $deporte)
                                <input class="hidden" type="checkbox" name="deportes[]" value="{{ $deporte->id }}" id="{{ $deporte->nombre }}">
                                <div>
                                    <label class="labelcheck"  for="{{ $deporte->nombre }}" >{{ $deporte->nombre }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex-center" >
                    <div id="selctUbicaciones" class="selectFiltro" >
                        <option >{{__('Ubicaciones')}} </option>
                        <i class="fa-solid fa-angle-down"></i>
                        <div id="contentUbicaciones">
                            @foreach($ubicaciones as $ubicacion)
                            <input class="hidden" type="checkbox" name="ubicaciones[]" value="{{ $ubicacion->id }}" id="{{ $ubicacion->nombre }}">
                                <div>
                                    <label class="labelcheck"  for="{{ $ubicacion->nombre }}">{{ $ubicacion->nombre }}</label>
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="flex-center">
                    <div id="selctDestreza" class="selectFiltro" >
                        <option>{{__('Destreza')}} </option>
                        <i class="fa-solid fa-angle-down"></i>
                        <div id="contentDestrezas">
                            <div>
                                <input class="hidden" type="checkbox" name="nivel[]" value="Principiante" id="Principiante">
                                <label class="labelcheck" for="Principiante">{{__('Principiante')}}</label>
                            </div>
                            <div>
                                <input class="hidden" type="checkbox" name="nivel[]" value="Intermedio" id="Intermedio">
                                <label class="labelcheck" for="Intermedio">{{__('Intermedio')}}</label>
                            </div>
                            <div>
                                <input class="hidden" type="checkbox" name="nivel[]" value="Profesional" id="Profesional">
                                <label class="labelcheck" for="Profesional">{{__('Profesional')}}</label>
                            </div>      
                        </div>
                    </div>
                </div>
                <button class="btn" style="transform: scale(0.8);" type="reset"><i class="fa-solid fa-broom"></i> {{__('Limpiar')}}</button>
            </div>
        </form>

        
        <table id="tablaPublicaciones">
            <tbody>
                @foreach($publicaciones as $publicacion)
                    <tr class="border-publicaciones">
                        <td class="tdpublicaciones">
                            <i style="color: {{ $publicacion->deporte->color }}" class="{{ $publicacion->deporte->icono }} iconosDeportes"></i>
                            <div class="content-text-publicacion">
                                <p class="title-publicacion">{{ $publicacion->deporte->nombre }}</p>
                                <a class="verapuntados" href="{{ route('apuntados', ['id' => $publicacion->id]) }}"></a>
                                <p class="text-publicacion"><i class="fa-solid fa-location-dot"></i> {{ $publicacion->ubicacion->calle }}, {{ $publicacion->ubicacion->localidad }}</p>
                                <p class="text-publicacion"><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $publicacion->fecha_hora)->formatLocalized('%d  %b  %Y, %H:%I') }}</p>
                            </div>
                        </td>
                        <td class="contentnivel" style="text-align: center;" >          
                            <p style="font-weight: normal;" class="nivel_publicacion">{{ $publicacion->nivel }}</p>
                        </td>
                        <td class="jugadores">
                            {{ $publicacion->ac_apuntados }}
                            /
                            {{ $publicacion->num_max_apuntados }}
                        </td>
                        @if (Auth::user() && $user->publicacion_id == null && $publicacion->user_id != $user->id && $publicacion->ac_apuntados < $publicacion->num_max_apuntados)
                            <td>
                                <form method="POST" action="{{ route('publicacion.apuntarse', ['id' => $publicacion->id]) }}">
                                    @csrf
                                    <button class="icons iconoapuntarse" type="submit"><i style="font-size: xxx-large;" class="fa-solid fa-plus"></i></button>
                                </form>
                            </td>
                        @endif    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if($publicaciones->hasPages())
        <div id="paginacion">
            {{ $publicaciones->links() }}
        </div>
    @endif
</x-app-layout>


