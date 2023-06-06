<a id="logout" {{ $attributes->merge(['class' => 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>Cerrar sesión</a>
@if (Auth::user() && Auth::user()->admin)
    <a href="{{ route('deporte.create') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">New Deporte</a>
@endif
<a href="{{ route('deportes.fav') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Deporte Favorito</a>
@if (Auth::user() && Auth::user()->admin)
    <a href="{{ route('ubicaciones.create') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">New Ubicacion</a>
@endif
<a href="{{ route('editarusuario') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Editar Cuenta</a>
<a href="{{ route('perfil') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Perfil</a>

<script>
    logout.addEventListener('click', function () {
        localStorage.setItem('clave_logeado', 'false');
    });
</script>