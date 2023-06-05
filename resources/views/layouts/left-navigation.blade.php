<nav class="left-nav left-nav-common-styles ">

    <i class="fa-solid fa-circle-chevron-left back icons"></i>

    <!-- Navigation Links -->
    <div class="links">
        <x-nav-link :href="route('publicaciones')" :active="request()->routeIs('publicaciones')">
            <i class="fa-solid fa-map-pin"></i>
            {{ __('Publicaciones') }}
        </x-nav-link>
    </div>
    
    <div class="links">
        <x-nav-link :href="route('auth.publicacion.create')" :active="request()->routeIs('auth.publicacion.create')">
            <i class="fa-solid fa-users"></i>
            {{ __('Crear Equipo') }}
        </x-nav-link>
    </div>
    @if (Auth::user()->admin)
        <div class="links">
            <x-nav-link :href="route('ubicaciones')" :active="request()->routeIs('ubicaciones')">
                <i class="fa-solid fa-map-location-dot"></i>
                {{ __('Ubicaciones') }}
            </x-nav-link>
        </div>
    @endif

    @if (Auth::user()->admin)
        <div class="links">
            <x-nav-link :href="route('deportes.mostrar')" :active="request()->routeIs('deportes.mostrar')">
               <span><i class="fa-solid fa-volleyball"></i></span> 
                {{ __('Deportes') }}
            </x-nav-link>
        </div>
    @endif

    <div class="links">
        <x-nav-link :href="route('noticias')" :active="request()->routeIs('noticias')">
       <i class="fa-solid fa-newspaper"></i>
            {{ __('Noticias') }}
        </x-nav-link>
    </div>

</nav>
<footer class="social-media left-nav-common-styles">
    <a class="icons" target="_blank" href="https://github.com/AlejandroMostazo?tab=repositories"><i class="bi bi-github"></i></a>
    <a class="icons" target="_blank" href="mailto:alejandromostazo39@gmail.com?Subject=Contacto%20por%20web%20SportMeetUp"><i class="bi bi-envelope-fill"></i></a>
    <a class="icons" target="_blank" href="https://www.linkedin.com/in/alejandro-mostazo-94a1a2184/"><i class="bi bi-linkedin"></i></a>
    <a class="icons" target="_blank" href="https://www.youtube.com/@Sr.monsty/videos"><i class="bi bi-youtube"></i></a>
    
</footer>