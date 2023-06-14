<x-app-layout>
    <x-slot name="header"> 
        <link href="{{ asset('css/crearPublicacion.css') }}" rel="stylesheet" type="text/css" >
        <script defer src="{{ mix('js/crearPublicacion.js') }}"></script>
        <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet" type="text/css" >

    </x-slot> 
        <div class="flex-center">
            <div id="cardPublicacion" style="padding-bottom: 50px;">
                <form method="POST" action="{{ route('publicacion.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div id="content-selects" class="space-around">
                        <div style="margin-top: 35px;" class="divinput">
                            <label class="labelPublicacion"><i class="fa-solid fa-volleyball"></i> Deporte</label>
                            <select id="deporte_id" class="select" name="deporte_id" :value="old('deporte_id')" required>
                                @foreach($deportes as $deporte)
                                    <option value="{{ $deporte->id }}">{{ $deporte->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="divinput">
                            <label style="margin-top: 35px;" class="labelPublicacion"><i class="fa-solid fa-location-dot"></i> Ubicacion</label>
                            
                            <select id="ubicacion_id" class="select" name="ubicacion_id" :value="old('ubicacion_id')" required>
                                @foreach($ubicaciones as $ubicacion)
                                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            
            
                    <div id="content-niveles" class="divinput space-around">
                        <label class="labelPublicacion" for="nivel">Destreza</label>
                        <input id="nivel" type="range"  min="1" max="3" value="1" >

                        <select hidden name="nivel" id="valorNivel">
                            <option  id="uno" value="Principiante">Principiante</option>
                            <option id="dos" value="Intermedio">Intermedio</option>
                            <option id="tres" value="Profesional">Profesional</option>
                        </select>
                        <div id="contentlevels" style="text-align: center;" >          
                            <p class="nivel_publicacion">Principiante</p>
                        </div>
                    </div>                   
            
                    <div class="flex-center">
                        <div id="contentplayers" class="space-around">
                            <div style="text-align:center">
                                <i style="font-size:xxx-large;" class="bi bi-person-fill"></i>
                                <h1 style="font-weight: 900; font-size:20px; margin-top: -20px">Jugadores</h1>
                            </div>
                            <div>
                                <div style="font-weight: 900;" class="space-around">
                                    <label style=" color:#151826 !important" >Participando</label>
                                    <label style=" color:#151826 !important">Total</label>
                                </div>
                                <input id="ac_apuntados" class="players"  type="number" name="ac_apuntados" value="1" min="1" required>
                                <span style="color: #027353; font-weight: 900;">/</span>
                                <input id="num_max_apuntados"  class="players" type="number" name="num_max_apuntados" value="2" min="2" max="12" required >
                            </div>
                        </div>
                    </div>
            
                    <div style="margin-top: 35px;" class="divinput">
                        <input id="fecha_hora" class="inputText" type="datetime-local"  name="fecha_hora" value="old('fecha_hora')" min="{{ date('Y-m-d\TH:i') }}" required >
                    </div>
                    <div class="divinput">
                        <button style="float: none; margin-left: 17px;" class="btnf"><i class="fa-solid fa-circle-plus"></i> Crear publicación</button>
                    </div>
                </form>
            </div>    
        </div>  
</x-app-layout>
