<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <p>{{ Auth::user()->nacimiento }}</p>
                    <p>{{ Auth::user()->genero }}</p>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Deportes favoritos:</h2>
                        <ul class="mt-2 text-gray-600">
                            @forelse (Auth::user()->deportesFav as $deporte)
                                <li>{{ $deporte->nombre }}</li>
                            @empty
                                <li>No se han añadido deportes favoritos</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>
