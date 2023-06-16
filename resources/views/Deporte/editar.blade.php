<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="flex-center" style="margin: 80px;">
        <div class="cardmain flex-center">
            <form method="POST" class="flex-center" style="flex-direction: column;" action="{{ route('deportes.update', $deporte->id) }}">
                @csrf
                @method('PUT')
                <div style="padding: 10px;">
                    <label for="nombre" class="block" >{{__('Nombre')}}:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $deporte->nombre }}" class="inputText">
                </div>
                <div style="padding: 10px;">
                    <label for="calle" class="block">{{__('Clase del Icono')}}:</label>
                    <input type="text" name="icono" id="icono" value="{{ $deporte->icono }}" class="inputText">
                </div>
                <div style="padding: 10px;">
                    <label for="color" class="block">{{__('Color')}}:</label>
                    <input  type="color" name="color" id="color" value="{{ $deporte->color }}" class="inputText">
                </div>
                <button type="submit" style="float: none;" class="btnf">{{__('Guardar')}}</button>
            </form>
        </div>
    </div>
</x-app-layout>
