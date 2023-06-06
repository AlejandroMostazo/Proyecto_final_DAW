<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('deportes.store') }}">
            @csrf
            <div id="contenedor-tags"></div>
            <!-- Nombre -->
            <div>
                <x-label for="nombre" :value="__('Nombre')" />
                
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
            </div>     
            <div>
                <x-label for="icono" :value="__('icono')" />
                
                <x-input id="icono" class="block mt-1 w-full" type="text" name="icono" :value="old('icono')" autofocus />
            </div>
            
            <div>
                <x-label for="color" :value="__('color')" />
                
                <x-input id="color" class="block mt-1 w-full" type="color" name="color" :value="old('color')" autofocus />
            </div> 

            <div class="flex items-center justify-end mt-4">

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('deportes.mostrar') }}">
                    {{ __('Cancel') }}
                </a>

                
                <x-button class="ml-4">
                    {{ __('Agregar Deporte') }}
                </x-button>
            </div>
        </form>
        <a class="ml-4" id="addtag">Agregar Deporte</a>
    </x-auth-card>
</x-guest-layout>
<script src="{{ mix('js/tags.js') }}"></script>