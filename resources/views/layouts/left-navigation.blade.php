<nav id="leftnav" class="left-nav left-nav-common-styles ">
    <i id="btnleftnav" class="fa-solid fa-circle-left back"></i>
 

    <!-- Navigation Links -->
    <x-nav-link :href="route('publicaciones')" :active="request()->routeIs('publicaciones')">
        <i class="fa-solid fa-map-pin"></i>
        <h1>{{ __('Publicaciones') }}</h1> 
    </x-nav-link>

    @if(Auth::user())
        @if(!Auth::user()->publicacion_id)
            <x-nav-link :href="route('auth.publicacion.create')" :active="request()->routeIs('auth.publicacion.create')">
                <i class="fa-solid fa-users"></i>
                <h1>{{ __('Crear Equipo') }}</h1>
                
            </x-nav-link>
        @endif
    @else
        <x-nav-link :href="route('auth.publicacion.create')" :active="request()->routeIs('auth.publicacion.create')">
            <i class="fa-solid fa-users"></i>
            <h1>{{ __('Crear Equipo') }}</h1>
        </x-nav-link>
    @endif

    <x-nav-link :href="route('ubicaciones')" :active="request()->routeIs('ubicaciones')">
        <i class="fa-solid fa-map-location-dot"></i>
        <h1>{{ __('Ubicaciones') }}</h1>
    </x-nav-link>

    <x-nav-link :href="route('deportes.mostrar')" :active="request()->routeIs('deportes.mostrar')">
        <span><i class="fa-solid fa-volleyball"></i></span> 
        <h1>{{ __('Deportes') }}</h1>
    </x-nav-link>

    <x-nav-link :href="route('noticias')" :active="request()->routeIs('noticias')">
    <i class="fa-solid fa-newspaper"></i>
       <h1>{{ __('Noticias') }}</h1> 
    </x-nav-link>

</nav>
<footer id="footer" class="social-media left-nav-common-styles">
    <a class="icons" target="_blank" href="https://github.com/AlejandroMostazo?tab=repositories"><i class="bi bi-github"></i></a>
    <a class="icons" target="_blank" href="mailto:alejandromostazo39@gmail.com?Subject=Contacto%20por%20web%20SportMeetUp"><i class="fa-solid fa-envelope"></i></a>
    <a class="icons" target="_blank" href="https://www.linkedin.com/in/alejandro-mostazo-94a1a2184/"><i class="bi bi-linkedin"></i></a>
    <a class="icons" target="_blank" href="https://www.youtube.com/@Sr.monsty/videos"><i class="bi bi-youtube"></i></a>
    
</footer>

<script defer src="{{ mix('js/leftnav.js') }}"></script>