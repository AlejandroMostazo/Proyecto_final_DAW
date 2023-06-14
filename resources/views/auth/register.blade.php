
<script defer src="{{ mix('js/dragAndDrop.js') }}"></script>
<script defer src="{{ mix('js/canvas.js') }}"></script>
<script defer src="{{ mix('js/pswdsecure.js') }}"></script>
<x-guest-layout>
    <div style="color: #fff; padding-bottom: 50px;" id="contenedor-login">
        
        <canvas id="canvas" style="float: left;"></canvas>
        
        <div id="primerLogo">
            <x-application-logo></x-application-logo>
        </div>

        <div id="content-form" class="flex-center register" >

            
            <video loop muted autoplay>
                <source src="{{ asset('videos/login.mp4') }}" type="video/mp4" />
            </video>
            
            
            <!-- Validation Errors -->
            <x-auth-validation-errors  :errors="$errors" />
            <x-auth-session-status  :status="session('status')" />
            
            <div class="change" style="margin: 30px 0px;">
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                <span>Regristrarse</span>
            </div>    
            <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-label class="margin-auto" class="margin-auto" for="name" :value="__('Name *')" />
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
                    <x-label class="margin-auto" for="password" :value="__('Password *')" />
                    <a href="#generarpwd" id="generarpwd"><i class="fa-solid fa-key"></i>Generar</a>
                    <div class="flex-center">
                        <x-input id="password" placeholder="password*" type="password" name="password" required />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="content-input">
                    <x-label class="margin-auto" for="password_confirmation" :value="__('Confirm Password *')" />
                    <div class="flex-center">
                        <x-input id="password_confirmation" placeholder="confirm password*" type="password" name="password_confirmation" required />
                    </div>
                </div>
                
                <!-- Fecha de nacimiento -->
                <div class="content-input">
                    <x-label class="margin-auto" for="nacimiento" :value="__('Fecha de Nacimiento *')" />
                    <div class="flex-center">
                        <x-input id="nacimiento" type="date" max="{{ \Carbon\Carbon::now()->subYears(3)->format('Y-m-d') }}" required name="nacimiento" :value="old('nacimiento')" />
                    </div>
                </div>

                <!-- Genero -->
                <div class="content-input">
                    <x-label class="margin-auto" for="genero" :value="__('Genero')" />
                    <div class="flex-center">
                        <x-select id="genero" name="genero" :value="old('genero')" />
                    </div>
                </div>
                
                <div class="content-input" style="padding: 10px;">
                    <x-label class="margin-auto" for="foto">Foto de perfil:</x-label>
                    <div id="dropZone" class="drop-zone"><i class="fa-solid fa-image"></i></div>
                    <input type="file" id="fotoInput" name="foto" style="display: none;">
                </div>

                <div style="width: 100%; text-align:center; transform:translate(5px)">
                    <x-button >
                        {{ __('Registrarse') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
<script src="{{ mix('js/pswdsecure.js') }}"></script>