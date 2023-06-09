<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Http\Controllers\Controller;
use App\Models\Deporte;
use App\Models\Ubicacion;
use App\Models\User;
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
        return view('auth.publicacion-create',  compact('deportes', 'ubicaciones'));
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
            'num_max_apuntados' => ['required', 'integer', 'min:2', 'max: 12'],
            'ac_apuntados' => ['required', 'integer', 'min:1', 'max:' . ($request->input('num_max_apuntados') - 1)],
            'fecha_hora' => ['required'],
            'ubicacion_id' => ['required', 'exists:ubicaciones,id'],
            'deporte_id' => ['required', 'exists:deportes,id'],
        ]);
	
	    $user = auth()->user();
		
        if(Publicacion::where('user_id', '=', $user->id)->count() > 0 || $user->publicacion_id) {
            return redirect('publicaciones');
        }

        $publicacion = new Publicacion();
        $publicacion->nivel = $request->nivel;
        $publicacion->num_max_apuntados = $request->num_max_apuntados;
        $publicacion->ac_apuntados = $request->ac_apuntados;
        $publicacion->fecha_hora = $request->fecha_hora;
        $publicacion->ubicacion_id = $request->ubicacion_id;
        $publicacion->deporte_id = $request->deporte_id;
        $publicacion->user_id = auth()->id(); 
        $publicacion->save();

        $this->apuntarsePublicacion($publicacion->id);
	
        return redirect()->route('publicaciones');
    }


    public function edit($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        $deportes = Deporte::all();
        $ubicaciones = Ubicacion::all();

        return view('auth.mi-publicacion', compact('publicacion', 'deportes', 'ubicaciones'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nivel' => ['required', 'string'],
            'num_max_apuntados' => ['required', 'integer', 'min:2', 'max:12'],
            'ac_apuntados' => ['required', 'integer', 'min:1', 'max:' . ($request->input('num_max_apuntados') - 1)],
            'fecha_hora' => ['required'],
            'ubicacion_id' => ['required', 'exists:ubicaciones,id'],
            'deporte_id' => ['required', 'exists:deportes,id'],
        ]);

        $publicacion = Publicacion::findOrFail($id);

        if ($publicacion->user_id !== auth()->id()) {
            return redirect()->route('publicaciones');
        }

        $publicacion->nivel = $request->nivel;
        $publicacion->num_max_apuntados = $request->num_max_apuntados;
        $publicacion->ac_apuntados = $request->ac_apuntados;
        $publicacion->fecha_hora = $request->fecha_hora;
        $publicacion->ubicacion_id = $request->ubicacion_id;
        $publicacion->deporte_id = $request->deporte_id;
        $publicacion->save();

        return redirect()->route('publicaciones');
    }

    
    public function allPublicaciones()
    {
        $user = auth()->user();
        $publicaciones = Publicacion::orderBy('created_at', 'desc')->paginate(12);
        $deportes = Deporte::all();
        $ubicaciones = Ubicacion::all();
        
        return view('publicaciones', compact('user', 'publicaciones', 'deportes', 'ubicaciones'));
    }

    public function mostrarApuntados($id)
    {
        $users = User::where('publicacion_id', '=', $id)->paginate(6);
        $publicacion = Publicacion::where('id', '=', $id)->first();

        return view('apuntados', compact('users', 'publicacion'));
    }

    public function deletePublicacion()
    {
            $user = auth()->user();
            $publicacion = Publicacion::where('user_id', '=', $user->id);
	        $user->publicacion_id = null;
	        $user->update;
            $publicacion->delete();

            return redirect()->route('publicaciones');
    }

    public function deletePublicacionFechaHora()
    {
        $publicaciones = Publicacion::where('fecha_hora', '<', Carbon::now())->get();

        foreach ($publicaciones as $publicacion) {
            $publicacion->delete();
        }
    }
    // Borra las publicacionse que ya hayan pasado de la fecha a la que fueron programadas antes de mostrarlas 
    public function mostrarPublicaciones() {
        $this->deletePublicacionFechaHora();
        return $this->allPublicaciones();
    }

    public function apuntarsePublicacion($id)
    {
        $user = auth()->user();
    
        // Verificar que el usuario no esta unido a ninguna publicacion
        if ($user->publicacion_id != null) {
            return redirect()->back();
        }

        // Obtener la publicación específica por ID
        $publicacion = Publicacion::find($id);

        // Verificar que no es el creador 
        if ($publicacion->user_id != $user->id) {
            $publicacion->ac_apuntados += 1;
            $publicacion->save();
        }
    
        // Unir al usuario a la publicación
        $publicacion->usuariosApuntados()->save($user);
    
    
        return redirect()->route('publicaciones');
    }
    

    public function desapuntarsePublicacion()
    {
        $user = auth()->user();

        // Obtener la publicación específica por ID
        $publicacion = Publicacion::find($user->publicacion_id);

        // Quitar al usuario de la publicación
        $user->publicacion_id = null;
        $user->save();

        $publicacion->ac_apuntados -= 1;
        $publicacion->save();

        return redirect()->route('publicaciones');
    }


    public function buscar(Request $request)
    {

        $request = $request->input('buscador');

        $query = Publicacion::query();

        $query->join('deportes', 'deportes.id', '=', 'publicaciones.deporte_id')
            ->join('ubicaciones', 'ubicaciones.id', '=', 'publicaciones.ubicacion_id')
            ->select('publicaciones.*');

        $query->orWhere('deportes.nombre', 'LIKE', '%'.$request.'%');
        $query->orWhere('ubicaciones.nombre', 'LIKE', '%'.$request.'%');
        $query->orWhere('ubicaciones.calle', 'LIKE', '%'.$request.'%');
        $query->orWhere('ubicaciones.localidad', 'LIKE', '%'.$request.'%');

        $publicaciones = $query->paginate(12);
        $deportes = Deporte::all();
        $ubicaciones = Ubicacion::all(); 
        $user = auth()->user();

        return view('publicaciones', compact('publicaciones', 'deportes', 'ubicaciones', 'user'));
    }


    public function publicacionesConFiltro(Request $request)
    {
        $deportes = $request->input('deportes', []);
        $ubicaciones = $request->input('ubicaciones', []);
        $nivel = $request->input('nivel', []);
        $fecha = $request->input('fecha');

        $query = Publicacion::query();

        if ($request->filled('fecha')) {
            $query->whereDate('fecha_hora', '=', $fecha);
        }

        if (!empty($deportes)) {
            $query->whereIn('deporte_id', $deportes);
        }

        if (!empty($ubicaciones)) {
            $query->whereIn('ubicacion_id', $ubicaciones);
        }

        if (!empty($nivel)) {
            $query->whereIn('nivel', $nivel);
        }

        $publicaciones = $query->with('deporte')->get();
        $publicaciones = $query->with('ubicacion')->get();
        $user = auth()->user();

        if ($request->ajax()) {
            return response()->json([
                'publicaciones' => $publicaciones,
                'user' => $user,
            ]);
        }
        
        return view('publicaciones', compact('publicaciones', 'user'));
    }

}
