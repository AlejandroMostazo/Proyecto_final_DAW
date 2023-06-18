
<script defer src="{{ mix('js/dragAndDrop.js') }}"></script>
<script defer src="{{ mix('js/canvas.js') }}"></script>
<script defer src="{{ mix('js/pswdsecure.js') }}"></script>
<x-guest-layout>
    <div style="color: #fff; padding-bottom: 50px;" id="contenedor-login">
        
        <canvas id="canvas" style="float: left;"></canvas>
        
        <div id="primerLogo">
            <x-application-logo></x-application-logo>
        </div>

        <a style="top: 10px" class="entrarComoInvitado" href="{{ route('lang.change') }}"><i style="font-size: xx-large;" class="fa-solid fa-language"></i></a>


        <div id="content-form" class="flex-center register" >

            <div style="height: 100%;">
                <div id="changeRegistro" class="change">
                    <a href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    <span>{{ __('Regristrarse') }}</span>
                </div>    
                
                <video id="videoRegistro" loop muted autoplay>
                    <source src="{{ asset('videos/login.mp4') }}" type="video/mp4" />
                </video>
                
                
                <!-- Validation Errors -->
                <x-auth-validation-errors  :errors="$errors" />
                <x-auth-session-status  :status="session('status')" />
                
                <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Name -->
                    <div>
                        <x-label class="margin-auto" class="margin-auto" for="name" :value="__('Nombre') " /> *
                        <div class="flex-center">
                            <x-input id="name" type="text" placeholder="user-name *" name="name" :value="old('name')" required autofocus />
                        </div>
                    </div>
    
                    
                    <!-- Email Address -->
                    <div class="content-input">
                        <x-label class="margin-auto" for="email" :value="__('Email *')" />
                        <div class="flex-center">
                            <x-input id="email" placeholder="user-email@email.com *"  type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                    </div>
                    
                    <!-- Password -->
                    <div class="content-input">
                        <div style="color: #F23005" id="divpwd"></div>
                        <x-label class="margin-auto" for="password" :value="__('Contraseña')" /> *
                        <a id="generarpwd"><i class="fa-solid fa-key"></i>{{ __('Generar') }}</a>
                        <div class="flex-center">
                            <x-input id="password" placeholder="{{ __('Contraseña') }} *" type="password" name="password" required />
                        </div>
                    </div>
    
                    <!-- Confirm Password -->
                    <div class="content-input">
                        <x-label class="margin-auto" for="password_confirmation" :value="__('Confirmar Contraseña')" /> *
                        <div class="flex-center">
                            <x-input id="password_confirmation" placeholder="{{ __('Confirmar Contraseña') }} *" type="password" name="password_confirmation" required />
                        </div>
                    </div>
                    
                    <!-- Fecha de nacimiento -->
                    <div class="content-input">
                        <x-label class="margin-auto" for="nacimiento" :value="__('Fecha de Nacimiento')" /> *
                        <div class="flex-center">
                            <x-input id="nacimiento" type="date" max="{{ \Carbon\Carbon::now()->subYears(3)->format('Y-m-d') }}" required name="nacimiento" :value="old('nacimiento')" />
                        </div>
                    </div>
    
                    <!-- Genero -->
                    <div class="content-input">
                        <x-label class="margin-auto" for="genero" :value="__('Género')" />
                        <div class="flex-center">
                            <x-select id="genero" name="genero" :value="old('genero')" />
                        </div>
                    </div>
                    
                    <div class="content-input" style="padding: 10px;">
                        <x-label class="margin-auto" for="foto">{{ __('Foto de Perfil') }}</x-label>
                        <div id="dropZone" class="drop-zone"><i class="fa-solid fa-image"></i></div>
                        <input type="file" id="fotoInput" name="foto" style="display: none;">
                    </div>
    
                    <div id="boton-registro">
                        <x-button >
                            {{ __('Registrarse') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
<script src="{{ mix('js/pswdsecure.js') }}"></script>