<x-app-layout>
    <x-slot name="header">
        <link href="{{ asset('css/cards.css') }}" rel="stylesheet" type="text/css" >
        <script defer src="{{ mix('js/dragAndDrop.js') }}"></script>
    </x-slot>
    <div class="flex-center" style="margin: 80px;">
        <div class="cardmain flex-center">
            <form method="POST" class="flex-center" style="flex-direction: column;" action="{{ route('ubicaciones.store') }}" enctype="multipart/form-data">
                @csrf
                <div style="padding: 10px;">
                    <label for="nombre" class="block" >Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="inputText" required placeholder="Nombre*">
                </div>
                <div style="padding: 10px;">
                    <label for="calle" class="block">Calle:</label>
                    <input type="text" name="calle" id="calle" class="inputText" required placeholder="Dirección*">
                </div>
                <div style="padding: 10px;">
                    <label for="localidad" class="block">Localidad:</label>
                    <input type="text" name="localidad" id="localidad" class="inputText" required placeholder="Localidad*">
                </div>
                <div style="padding: 10px;">
                    <label for="url" class="block">URL Ubicación:</label>
                    <input type="text" name="url" id="url" class="inputText" required placeholder="https://www.google.co . . .">
                </div>
                <div style="padding: 10px;">
                    <label for="foto" class="block">Imágen:</label>
                    <div id="dropZone" class="drop-zone"><i class="fa-solid fa-image"></i></div>
                    <input type="file" id="fotoInput" name="foto" style="display: none;">
                </div>
                <button type="submit" style="float: none;" class="btnf">Crear</button>
            </form>
        </div>
    </div>
</x-app-layout>
