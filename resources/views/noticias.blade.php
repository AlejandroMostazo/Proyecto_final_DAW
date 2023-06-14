
<x-app-layout>
    <x-slot name="header">
        <link href="{{ asset('css/cards.css') }}" rel="stylesheet" type="text/css" >
    </x-slot>
    <div id="contenedorCards" style="margin-top: auto; padding-bottom: 50px" class="flex-center">
        <div id="cargando" class="flex-center">
                <i id="pelotabotando" class="fa-solid fa-volleyball"></i>
        </div>
    </div>
</x-app-layout>

<script defer src="{{ mix('js/newsapi.js') }}"></script>

