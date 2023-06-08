<a id="logout" {{ $attributes->merge(['class' => 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>Cerrar sesión</a>

<a href="{{ route('perfil') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Perfil</a>

<script>
    logout.addEventListener('click', function () {
        localStorage.clear();
    });
</script>