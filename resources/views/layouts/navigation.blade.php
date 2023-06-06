<nav class="flex-center nav-pading nav-color">
    <!-- Logo -->
    <div class="nav-pading-contents">
        <a href="{{ route('publicaciones') }}">
            <x-application-logo/>
        </a>
    </div>

    <!-- Buscador -->
    <div  class="nav-pading-contents">
        <form method="GET" action="{{ route('publicacion.buscar') }}">
            <div class="relative">
                <input class="search" type="text" id="buscador" name="buscador" placeholder="Encontrar partido ...">
                <button class="btn-lupa icons" type="submit"><i class="bi bi-search"></i></button>
            </div>
                
        </form>
    </div>

    <!-- Icon user and dropdown -->
    <div style="text-align: center;">
        <x-dropdown >
            <x-slot name="trigger">
                <button class="icon-user">
                    <i style="font-size:xxx-large;" class="bi bi-person-fill icons"></i>
                    <!-- <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div> -->
                    @if (Auth::user()) 
                        <p class="icon-user">{{ Auth::user()->name}}</p>
                    @endif
                </button>
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>

</nav>