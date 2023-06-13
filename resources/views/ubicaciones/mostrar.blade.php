
<x-app-layout>
    <x-slot name="header">
      <link href="{{ asset('css/cards.css') }}" rel="stylesheet" type="text/css" >
    </x-slot>
    <div id="contenedorCards" class="flex-center">
        @foreach($ubicaciones as $ubicacion)
            <div class="cardsmall">
                <img class="imgubicacion" src="{{ asset('storage/' . $ubicacion->foto) }}" alt="Foto de ubicación">
                
                <h1 class="titles">{{ $ubicacion->nombre }}</h1>
                <p><span class="bi bi-geo-alt-fill"></span> {{ $ubicacion->calle }}</p>
                <p>{{ $ubicacion->localidad }}</p>
                @if (Auth::user() && Auth::user()->admin)
                    <div class="space-around">
                        <a href="{{ route('ubicaciones.edit', $ubicacion->id) }}" class="btn" style="font-size: 20px;" ><i class="fa-solid fa-pen"></i> Editar</a>
                        <form action="{{ route('ubicaciones.delete', $ubicacion->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn" style="font-size: 20px;" type="submit"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                        </form>
                    </div>
                @else 
                    <a href="{{ $ubicacion->url }}" class="btn" target="_blank">+ Info</a>
                @endif
            </div>
        @endforeach
        @if (Auth::user() && Auth::user()->admin)
        <a href="{{ route('ubicaciones.create') }}" class="btn new"><i class="fa-solid fa-circle-plus"></i></a>
        @endif
    </div>
    @if($ubicaciones->hasPages())
        <div id="paginacion">
            {{ $ubicaciones->links() }}
        </div>
    @endif
</x-app-layout>
