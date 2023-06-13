<script defer src="{{ mix('js/localdata.js') }}"></script>
<x-guest-layout>
    <div style="color: #fff;" id="contenedor-login">

        <a id="entrarComoInvitado" href="{{ route('publicaciones') }}" >Entrar como invitado</a>
        
        <canvas id="canvas" style="float: left;"></canvas>
        <script>
        var canvas = document.getElementById('canvas');
        var ctx = canvas.getContext('2d');

        function drawShapes() {
            canvas.height = window.innerHeight;

            ctx.fillStyle = '#151826';
            ctx.beginPath();
            ctx.moveTo(0, canvas.height);
            ctx.lineTo(canvas.width, canvas.height);
            ctx.lineTo(canvas.width, 0);
            ctx.closePath();
            ctx.fill();
            
            // Agregar borde a la línea izquierda
            ctx.lineWidth = 4;
            ctx.strokeStyle = '#F2B705';
            ctx.beginPath();
            ctx.moveTo(0, canvas.height);
            ctx.lineTo(canvas.width, 0);
            ctx.closePath();
            ctx.stroke();
        }

        // Dibujar los elementos al cargar la página y al redimensionar la ventana
        window.addEventListener('load', drawShapes);
        window.addEventListener('resize', drawShapes);

        </script>

        <x-application-logo></x-application-logo>

        <div id="content-form" class="flex-center" style="flex-direction:column;">

            
            <video loop muted autoplay>
                <source src="{{ asset('videos/login.mp4') }}" type="video/mp4" />
            </video>
            
            
            <!-- Validation Errors -->
            <x-auth-validation-errors  :errors="$errors" />
            <x-auth-session-status  :status="session('status')" />
            
            <div id="change">
                <span>Iniciar Sesión</span>
                <a href="{{ route('register') }}" >Regristrarse</a>
            </div>    
            <form method="POST" action="{{ route('login') }}">
                @csrf


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
                        <x-label id="label-remember" for="recuerdame" :value="__('Mantener sesión iniciada')"/>
                    </span>
                    <input id="recuerdame" type="checkbox" class="hidden" name="remember">
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
