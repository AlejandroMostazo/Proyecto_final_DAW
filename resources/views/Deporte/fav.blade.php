<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('deportes.fav.store') }}">
            @csrf
            
            <!-- Deportes -->
            <div>
                <x-label for="deportes" :value="__('Deportes Favoritos')" />
                <select id="deportes" class="block mt-1 w-full" name="deportes">
                    <option value="">No especificado</option>
                    @foreach ($deportes as $deporte)
                    <option value="{{ $deporte->id }}">{{ $deporte->nombre }}</option>
                    @endforeach
                </select>
            </div>
         

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Guardar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
