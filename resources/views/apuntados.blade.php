<x-app-layout>
    <x-slot name="header">
        <link href="{{ asset('css/cards.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/perfil.css') }}" rel="stylesheet" type="text/css">
    </x-slot>

<div>
    <table id="tablaPublicaciones">
        <tbody>
            <tr class="border-publicaciones">
                <td class="tdpublicaciones">
                    <i style="color: {{ $publicacion->deporte->color }}" class="{{ $publicacion->deporte->icono }} iconosDeportes"></i>
                    <div class="content-text-publicacion">
                        <p class="title-publicacion">{{ $publicacion->deporte->nombre }}</p>
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
            </tr>
        </tbody>
    </table>
</div>

    <div id="contenedorCards" class="flex-center" style="padding-bottom: 50px;">
        @foreach($users as $user)
            <div class="card ">
                <div class="flex-center cardusuarios" style="flex-direction:column">
                    @if($user->foto)
                        <img class="imgperfil" src="{{ asset('storage/' . $user->foto) }}" alt="Foto de usuario">
                    @else
                        <i class="fa-solid fa-user iconouser" style="margin: auto;"></i>
                    @endif
                    <h1 class="title-publicacion" style="font-weight: bold; font-size:xx-large">{{ $user->name }}</h1>
                    <div class="cardusuarios space-around">
                        <span>{{__('Género')}}</span>
                        <span>{{ $user->genero }}</span>
                    </div>
                    <div class="space-around cardusuarios">
                        <span>{{__('Edad')}}</span>
                        <span>{{ \Carbon\Carbon::parse($user->nacimiento)->age }}</span>
                    </div>
                    <div>
                        <span class="flex-center">{{__('Favoritos')}}:</span>
                        @forelse ($user->deportesFav as $deporte)
                            <div class="deporte-fav space-around">
                                <span>{{ $deporte->nombre }}</span>
                                <i style="color:{{ $deporte->color }};" class="{{ $deporte->icono }}"></i>
                            </div>
                        @empty
                            <div class="deporte-fav">
                                <span an class="no-grid">{{__('Sin deporte Favoritos')}}</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if($users->hasPages())
        <div id="paginacion">
            {{ $users->links() }}
        </div>
    @endif
</x-app-layout>
