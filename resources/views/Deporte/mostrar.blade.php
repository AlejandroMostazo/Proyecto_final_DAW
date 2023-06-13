<x-app-layout >
    <x-slot name="header">
        <link href="{{ asset('css/cards.css') }}" rel="stylesheet" type="text/css" >
    </x-slot>

    <div id="contenedorCards" class="flex-center">
        @foreach($deportes as $deporte)
            <div class="card">
                <div class="contenticon">
                    <p class="titles">{{ $deporte->nombre }}</p>
                    <i style="color: {{ $deporte->color }} " class="{{$deporte->icono}}"></i> 
                </div>
                @if (Auth::user() && Auth::user()->admin)
                    <div class="space-around">
                        <a href="{{ route('deportes.edit', $deporte->id) }}" class="btn" style="font-size: 20px;" ><i class="fa-solid fa-pen"></i> Editar</a>
                        <form action="{{ route('deportes.delete', $deporte->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn" style="font-size: 20px;" type="submit"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
        @if (Auth::user() && Auth::user()->admin)
            <a href="{{ route('deporte.create') }}" class="btn new"><i class="fa-solid fa-circle-plus"></i></a>
        @endif
    </div>
    @if($deportes->hasPages())
        <div id="paginacion">
            {{ $deportes->links() }}
        </div>
    @endif
</x-app-layout>
