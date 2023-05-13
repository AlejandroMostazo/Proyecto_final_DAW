<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Http\Controllers\Controller;
use App\Models\Deporte;
use App\Models\Ubicacion;
use Carbon\Carbon;


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
            'deporte_id' => ['required', 'exists:deportes,id', 'string']
         ]);

        $publicacion = new Publicacion();
        $publicacion->nivel = $request->nivel;
        $publicacion->num_max_apuntados = $request->num_max_apuntados;
        $publicacion->ac_apuntados = $request->ac_apuntados;
        $publicacion->fecha_hora = $request->fecha_hora;
        $publicacion->ubicacion_id = $request->ubicacion_id;
        $publicacion->deporte_id = $request->deporte_id;
        $publicacion->id_usuario = auth()->id();
        $publicacion->save();

        return redirect()->route('dashboard');
    }

    public function mostrarPublicaciones()
    {
        $publicaciones = Publicacion::all();
        return view('publicaciones', ['publicaciones' => $publicaciones]);
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
        $publicacion = Publicacion::find($id);
        $publicacion->ac_apuntados += 1;
        $publicacion->save();
        return redirect()->route('publicaciones');
    }

}
