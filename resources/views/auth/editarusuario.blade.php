<x-app-layout>
    <x-slot name="header">  
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Actualizar información:</h2>
                    <form method="POST" action="{{ route('actualizarusuario',  ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nombre de usuario:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') ?? auth()->user()->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Correo electrónico:</label>
                            <input type="email" name="email" id="email" value="{{ old('email') ?? auth()->user()->email }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="new_password" class="block text-gray-700 font-bold mb-2">Contraseña:</label>
                            <input type="password" name="new_password" id="new_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('password')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar contraseña:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('password_confirmation')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <ul id="deportes-favoritos">
                            @forelse (Auth::user()->deportesFav as $deporte)
                                <li  draggable="true" data-id="{{ $deporte->id }}">{{ $deporte->nombre }}</li>
                                <form action="{{ route('deportes-fav.delete', $deporte->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete {{ $deporte->nombre }}</button>
                                </form>
                            @empty
                                <a href="{{ route('deportes.fav') }}">Añadir Deporte Favorito</a>
                            @endforelse
                        </ul>
                    <button type="submit" style="background-color: orange;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Actualizar información
                        </button>
                    </form>
                    <form method="POST" action="{{ route('eliminarusuario', ['id' => $user->id]) }}" class="mb-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: red;" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Eliminar cuenta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
