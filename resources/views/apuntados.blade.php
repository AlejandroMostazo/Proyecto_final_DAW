<x-app-layout>
    <x-slot name="header">
        <link href="{{ asset('css/cards.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/perfil.css') }}" rel="stylesheet" type="text/css">
    </x-slot>

    <div id="contenedorCards" class="flex-center">
        @foreach($users as $user)
            <div class="card ">
                <div class="flex-center cardusuarios" style="flex-direction:column">
                    <img class="imgperfil" src="{{ asset('storage/' . $user->foto) }}" alt="Foto de ubicación">
                    <p class="title-publicacion" style="font-weight: bold; font-size:xx-large">{{ $user->name }}</p>
                    <div class="cardusuarios space-around">
                        <span>Genero</span>
                        <span>{{ $user->genero }}</span>
                    </div>
                    <div class="space-around cardusuarios">
                        <span>Edad</span>
                        <span>{{ \Carbon\Carbon::parse($user->nacimiento)->age }}</span>
                    </div>
                    <div>
                        <span class="flex-center">Favoritos:</span>
                        @forelse ($user->deportesFav as $deporte)
                            <div class="deporte-fav space-around">
                                <span>{{ $deporte->nombre }}</span>
                                <i style="color:{{ $deporte->color }};" class="{{ $deporte->icono }}"></i>
                            </div>
                        @empty
                            <div class="deporte-fav">
                                <sp an class="no-grid">Sin deporte Favoritos</sp>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
