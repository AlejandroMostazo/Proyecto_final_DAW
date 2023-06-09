<x-app-layout>
    <x-slot name="header">
        <script defer src="{{ mix('js/tags.js') }}"></script>
    </x-slot>

    <div class="flex-center" style="margin: 80px;">
        <div class="cardmain flex-center">
            <form method="POST" class="flex-center" style="flex-direction: column;" action="{{ route('deportes.store') }}">
                @csrf
                <div style="padding: 10px;">
                    <label for="nombre" class="block" >Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="inputText" required placeholder="Nombre*">
                </div>
                <div style="padding: 10px;">
                    <label for="icono" class="block">Icono:</label>
                    <input type="text" name="icono" class="inputText" required placeholder="Calse FW o B*">
                </div>
                <div style="padding: 10px;">
                    <label for="color" class="block">Color:</label>
                    <input type="color" name="color" id="color" class="inputText">
                </div>
                <button type="submit" style="float: none;" class="btnf">Crear</button>
            </form>
        </div>
    </div>
</x-app-layout>
