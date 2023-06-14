<x-app-layout>
    <x-slot name="header">
        <link href="{{ asset('css/perfil.css') }}" rel="stylesheet" type="text/css" >
        <script defer src="{{ mix('js/dragAndDrop.js') }}"></script>
    </x-slot>
    <div class="flex-center" style="flex-direction:column; position:relative; padding-bottom: 50px">
        <a href="{{ route('perfil') }}" id="iconovolver"><i class="fa-solid fa-xmark"></i></a>
        <div style="position:relative" >
            <form method="POST" action="{{ route('eliminarusuario', ['id' => $user->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" id="iconodelete">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </form>
            <form id="fotoPerfil" action="{{ route('subirFoto',  ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div style="padding: 10px;">
                    <i id="dropZone" class="fa-solid fa-user iconouser drop-zone"></i>
                    <input type="file" id="fotoInput" name="foto" style="display: none;">
                </div>
            </form>
        </div>
        <form method="POST" action="{{ route('actualizarusuario',  ['id' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div style="margin-top: 20px;" class="space-around">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input class="inputText" type="text" name="name" id="name" value="{{ auth()->user()->name }}">
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div id="tablaUsuario">
                <div class="datosuser space-around">
                    <span>Genero</span>
                    <select id="genero" class="inputText" name="genero">
                        <option></option>
                        <option value="Male" {{ auth()->user()->genero == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ auth()->user()->genero == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="datosuser space-around">
                    <span>Edad</span>
                    <input class="inputText" type="date" name="nacimiento" id="nacimiento" max="{{ \Carbon\Carbon::now()->subYears(3)->format('Y-m-d') }}" value="{{ auth()->user()->nacimiento }}">
                </div>
                <div class="titulo-fav space-around">
                    <span>Deportes favoritos</span>
                </div>
                <div class="deporte-fav">
                    @forelse (Auth::user()->deportesFav as $deporte)
                        <span>{{ $deporte->nombre }}</span>
                        <i style="color:{{ $deporte->color }};" class="{{ $deporte->icono }}"></i>
                    @empty
                        <span class="no-grid">No se han añadido deportes favoritos</span>
                    @endforelse
                </div>
            </div>
            <div id="otroscampos">
                <div class="divinput">
                    <label for="email">Correo electrónico:</label>
                    <input class="inputText" type="email" name="email" id="email" value="{{ auth()->user()->email }}">
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="divinput">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password" placeholder="Nuena Contraseña" class="inputText" value="{{ old('password') }}">
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="divinput">
                    <label for="password_confirmation">Confirmar contraseña:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña" class="inputText" value="{{ old('password') }}">
                    @error('password_confirmation')
                         <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div id="divbtnactualizar">
                <button type="submit" class="btnf"> Guardar</button>
            </div>
        </form>
        <ul id="deportes-favoritos">
            <p style="margin-bottom: 15px; font-weight: bold">Eliminar deportes favoritos</p>
            @forelse (Auth::user()->deportesFav as $deporte)
            <form action="{{ route('deportes-fav.delete', $deporte->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <li>
                    {{ $deporte->nombre }}
                    <button class="icons" type="submit"><i class="fa-solid fa-circle-xmark"></i></button>
                </li>
            </form>
            @empty
            <a>Añade Deportes a Favoritos</a>
            @endforelse
        </ul>
        <form method="POST" action="{{ route('deportes.fav.store') }}">
        @csrf
        
        <div id="deportes-favoritos">         
        <p style="margin-bottom: 15px; font-weight: bold">Añadir a deportes favoritos</p>
            @foreach ($deportes as $deporte)
                @if(!Auth::user()->deportesFav->contains('id', $deporte->id))
                    <span style="margin: 5px;" for="deporte_{{ $deporte->id }}">
                        <input type="checkbox" id="deporte_{{ $deporte->id }}" name="deportes[]" value="{{ $deporte->id }}">
                        {{ $deporte->nombre }}
                    </span>
                @endif
            @endforeach
            <button style="float: none;" class="btn">Añadir</button>
        </div>
    </form>

    </div>
</x-app-layout>