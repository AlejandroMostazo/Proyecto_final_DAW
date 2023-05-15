<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        
           <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('publicacion.store') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <!-- Nivel -->
            <div>
                <x-label for="nivel" :value="__('Nivel')" />

                <select id="nivel" class="block mt-1 w-full" name="nivel" required autofocus>
                    <option value="principiante" {{ old('nivel') == 'principiante' ? 'selected' : '' }}>Principiante</option>
                    <option value="intermedio" {{ old('nivel') == 'intermedio' ? 'selected' : '' }}>Intermedio</option>
                    <option value="profesional" {{ old('nivel') == 'profesional' ? 'selected' : '' }}>Profesional</option>
                </select>
            </div>


            <!-- Num_max_apuntados -->
            <div class="mt-4">
                <x-label for="num_max_apuntados" :value="__('Número máximo de apuntados')" />

                <x-input id="num_max_apuntados" class="block mt-1 w-full" type="number" name="num_max_apuntados" :value="old('num_max_apuntados')" required />
            </div>

            <!-- Ac_apuntados -->
            <div class="mt-4">
                <x-label for="ac_apuntados" :value="__('Número actual de apuntados')" />

                <x-input id="ac_apuntados" class="block mt-1 w-full" type="number" name="ac_apuntados" :value="old('ac_apuntados')" required />
            </div>

            <!-- Fecha y hora -->
            <div class="mt-4">
                <x-label for="fecha_hora" :value="__('Fecha y hora')" />

                <x-input id="fecha_hora" class="block mt-1 w-full" type="datetime-local" name="fecha_hora" :value="old('fecha_hora')" required />
            </div>

            <!-- Deporte -->
            <div class="mt-4">
                <x-label for="deporte_id" :value="__('Deporte')" />

                <select id="deporte_id" class="block mt-1 w-full" name="deporte_id" :value="old('deporte_id')" required>
                    <option value="" disabled selected>--Seleccione un deporte--</option>
                    @foreach($deportes as $deporte)
                        <option value="{{ $deporte->id }}">{{ $deporte->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Ubicación -->
            <div class="mt-4">
                <x-label for="ubicacion_id" :value="__('Ubicación')" />

                <select id="ubicacion_id" class="block mt-1 w-full" name="ubicacion_id" :value="old('ubicacion_id')" required>
                    <option value="" disabled selected>--Seleccione una ubicación--</option>
                    @foreach($ubicaciones as $ubicacion)
                        <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Crear publicación') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

</x-guest-layout>
