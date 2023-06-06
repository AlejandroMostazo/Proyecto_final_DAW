<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('ubicaciones.store') }}">
            @csrf

            <!-- nombre -->
            <div>
                <x-label for="nombre" :value="__('Nombre')" />

                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
            </div>

            <!-- Dirección -->
            <div class="mt-4">
                <x-label for="calle" :value="__('Dirección')" />

                <x-input id="calle" class="block mt-1 w-full" type="text" name="calle" :value="old('calle')" required />
            </div>

            <!-- localidad -->
            <div class="mt-4">
                <x-label for="localidad" :value="__('Localidad')" />

                <x-input id="localidad" class="block mt-1 w-full" type="text" name="localidad" :value="old('localidad')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('publicaciones') }}">
                    {{ __('Cancel') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
