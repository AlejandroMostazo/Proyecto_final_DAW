<x-app-layout >
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Deportes:</h2>
                    <table class="table-auto w-full">
                        <tbody>
                            @foreach($deportes as $deporte)
                                <tr>
                                    <td class="border px-4 py-2">{{ $deporte->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $deporte->icono }}</td>
                                    <td class="border px-4 py-2">{{ $deporte->color }}</td>
                                    @if (Auth::user()->admin)
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('deportes.edit', $deporte->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                            <form action="{{ route('deportes.delete', $deporte->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: red;" class="bg-red hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $deportes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
