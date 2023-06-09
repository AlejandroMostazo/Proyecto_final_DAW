<x-app-layout>
    <x-slot name="header">
        <link href="{{ asset('css/perfil.css') }}" rel="stylesheet" type="text/css" >
    </x-slot>
    <div class="flex-center" style="flex-direction:column">
        <div style="position:relative" >
            <i class="fa-solid fa-user iconouser"></i>
            <a href="{{ route('editarusuario') }}" id="iconoedit"><i class="fa-solid fa-pen"></i></a>
        </div>
        <p style="font-weight: bold; font-size:xx-large">{{ Auth::user()->name }}</p>
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
            <div class="deporte-fav">
                @forelse (Auth::user()->deportesFav as $deporte)
                    <span>{{ $deporte->nombre }}</span>
                    <i style="color:{{ $deporte->color }};" class="{{ $deporte->icono }}"></i>
                @empty
                    <span class="no-grid">No se han añadido deportes favoritos</span>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
