<x-app-layout>
    <x-slot name="header">
        <link href="{{ asset('css/perfil.css') }}" rel="stylesheet" type="text/css" >
    </x-slot>
    <div class="flex-center" style="flex-direction:column">
        <div style="position:relative" >
            @if( Auth::user()->foto )
                <img class="iconouser" src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de ubicación">
            @else
                <i class="fa-solid fa-user iconouser"></i>
            @endif
            <a href="{{ route('editarusuario') }}" id="iconoedit"><i class="fa-solid fa-pen"></i></a>
        </div>
        <h1 style="font-weight: bold; font-size:xx-large">{{ Auth::user()->name }}</h1>
        <div id="tablaUsuario">
            <div class="datosuser space-around">
                <span>Genero</span>
                <span>{{ Auth::user()->genero }}</span>
            </div>
            <div class="datosuser space-around">
                <span>Edad</span>
                <span>{{ \Carbon\Carbon::parse(Auth::user()->nacimiento)->age }}</span>
            </div>
            <div class="titulo-fav space-around">
                <span>Deportes favoritos</span>
            </div>
                @forelse (Auth::user()->deportesFav as $deporte)
                    <div class="deporte-fav">
                        <span>{{ $deporte->nombre }}</span>
                        <i style="color:{{ $deporte->color }};" class="{{ $deporte->icono }}"></i>
                    </div>
                @empty
                    <div class="deporte-fav">
                        <span class="no-grid">No se han añadido deportes favoritos</span>
                    </div>
                @endforelse
        </div>
    </div>
</x-app-layout>