<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Http\Controllers\Controller;
use App\Models\Deporte;
use App\Models\Ubicacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deportes = Deporte::all();
        $ubicaciones = Ubicacion::all();
        return view('auth.publicacion',  compact('deportes', 'ubicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nivel' => ['required', 'string'],
            'num_max_apuntados' => ['required', 'integer'],
            'ac_apuntados' => ['required', 'integer', 'max:' . $request->input('num_max_apuntados')-1],
            'fecha_hora' => ['required'],
            'ubicacion_id' => ['required', 'exists:ubicaciones,id', 'string'], 
            'deporte_id' => ['required', 'exists:deportes,id', 'string'],
            'user_id' => ['required', 'exists:users,id', 'integer', 'unique:publicaciones'],
         ]);

        $publicacion = new Publicacion();
        $publicacion->nivel = $request->nivel;
        $publicacion->num_max_apuntados = $request->num_max_apuntados;
        $publicacion->ac_apuntados = $request->ac_apuntados;
        $publicacion->fecha_hora = $request->fecha_hora;
        $publicacion->ubicacion_id = $request->ubicacion_id;
        $publicacion->deporte_id = $request->deporte_id;
        $publicacion->user_id = auth()->id();
        $publicacion->save();

        return redirect()->route('dashboard');
    }

    public function mostrarPublicaciones()
    {
        $publicaciones = Publicacion::all();
        $deportes = Deporte::all();
        $ubicaciones = Ubicacion::all();
        return view('publicaciones', ['publicaciones' => $publicaciones, 'deportes' => $deportes, 'ubicaciones' => $ubicaciones]);
    }

    public function deletePublicacionFechaHora()
    {
        $publicaciones = Publicacion::where('fecha_hora', '<', Carbon::now())->get();

        foreach ($publicaciones as $publicacion) {
            $publicacion->delete();
        }
    }
    // Borra las publicacionse que ya hayan pasado de la fecha a la que fueron programadas antes de mostrarlas 
    public function mostrarPublicacionesConBorrado() {
        $this->deletePublicacionFechaHora();
        return $this->mostrarPublicaciones();
    }

    public function apuntarsePublicacion($id)
    {
        $user = auth()->user();

        // Verificar si el usuario ya se ha unido a alguna publicación
        $publicacionUnida = Publicacion::whereHas('usuariosApuntados', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->exists();

        if ($publicacionUnida) {
            return redirect()->back()->withErrors('Ya estás unido a una publicación.');
        }

        // Obtener la publicación específica por ID
        $publicacion = Publicacion::find($id);

        // Unir al usuario a la publicación
        $publicacion->usuariosApuntados()->attach($user);

        // Incrementar el contador de apuntados de la publicación
        $publicacion->ac_apuntados += 1;
        $publicacion->save();

        return redirect()->route('publicaciones');
    }

    public function mostrarPublicacionesConFiltro(Request $request)
    {

        if ($request->filled('deporte') || $request->filled('ubicacion') || $request->filled('nivel') || $request->filled('fecha')) {

            if ($request->filled('deporte')) {
                $query = Publicacion::where('deporte_id', $request->input('deporte_id'));
            }

            if ($request->filled('ubicacion')) {
                $query = Publicacion::where('ubicacion_id', $request->input('ubicacion'));
            }

            if ($request->filled('nivel')) {
                $query = Publicacion::where('nivel', $request->input('nivel'));
            }

            if ($request->filled('fecha')) {
                $query = Publicacion::whereDate('fecha_hora', $request->input('fecha'));
            }
        } else {
            return $this->mostrarPublicacionesConBorrado();
        }

        $publicaciones = $query->get();
    
        $deportes = Deporte::all();
        $ubicaciones = Ubicacion::all();
        return view('publicaciones', compact('publicaciones', 'deportes', 'ubicaciones'));
    }

}
