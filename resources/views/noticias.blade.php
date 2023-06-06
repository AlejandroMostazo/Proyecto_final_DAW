
<x-app-layout>
    <x-slot name="header">
        <link href="{{ asset('css/noticias.css') }}" rel="stylesheet" type="text/css" >
    </x-slot>

        
        <div id="contenedorNoticias" class="flex-center">
            <div id="cargando" class="flex-center">
                 <i id="pelotabotando" class="fa-solid fa-volleyball"></i>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ mix('js/newsapi.js') }}"></script>

