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
                    @if($user->foto)
                        <img class="imgperfil" src="{{ asset('storage/' . $user->foto) }}" alt="Foto de usuario">
                    @else
                        <i class="fa-solid fa-user iconouser" style="margin: auto;"></i>
                    @endif
                    <h1 class="title-publicacion" style="font-weight: bold; font-size:xx-large">{{ $user->name }}</h1>
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
                                <span an class="no-grid">Sin deporte Favoritos</span>
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
