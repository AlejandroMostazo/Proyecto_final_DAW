<script defer src="{{ mix('js/localdata.js') }}"></script>
<script defer src="{{ mix('js/canvas.js') }}"></script>
<x-guest-layout>

    <script>
        var iflogeado = {{ Auth::check() ? 'true' : 'false' }};
    </script>

    <div style="color: #fff;" id="contenedor-login">

        <a id="entrarComoInvitado" class="efecto" href="{{ route('publicaciones') }}" >Entrar como invitado</a>
        
        <canvas id="canvas" style="float: left;"></canvas>
        
        <div id="primerLogo">
            <x-application-logo></x-application-logo>
        </div>

        <div id="content-form" class="flex-center" style="flex-direction:column;">
            
            <video loop muted autoplay>
                <source src="{{ asset('videos/login.mp4') }}" type="video/mp4" />
            </video>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors  :errors="$errors" />
            <x-auth-session-status  :status="session('status')" />
                
            <div class="change" style="transform: translateX(23px);" >
                <span>Iniciar Sesión</span>
                <a href="{{ route('register') }}" >Regristrarse</a>
            </div>    
            <form method="POST" style="position: relative;" action="{{ route('login') }}">
                @csrf

                <div id="segundoLogo">
                    <x-application-logo></x-application-logo>
                </div>
                
                <!-- Email Address -->
                <div class="content-input">
                    <x-label for="email" :value="__('Email')" />
                    <div class="flex-center">
                        <i class="fa-solid fa-user"></i>
                        <x-input id="email" placeholder="user-email@email.com"  type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                </div>

                <!-- Password -->
                <div class="content-input">
                    <x-label for="password" :value="__('Password')" />
                    <div class="flex-center">
                        <i class="fa-solid fa-lock"></i>
                        <x-input id="password" placeholder="password" type="password" name="password" required autocomplete="current-password" />
                    </div>
                </div>

                <!-- Remember Me -->
                <div style="width: 100%; text-align:center">
                    <x-button >
                        {{ __('Iniciar Sesión') }}
                    </x-button>
                </div>
                <div class="flex-center">
                    <i id="iconrecuerda" class="fa-regular fa-bookmark"></i> 
                    <span style="position: relative;">
                        <x-label id="label-remember" class="efecto" for="recuerdame" :value="__('Mantener sesión iniciada')"/>
                    </span>
                    <input id="recuerdame" type="checkbox" class="hidden" name="remember">
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
