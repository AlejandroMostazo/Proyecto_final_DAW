<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionController extends Controller
{
    public function create()
    {
        return view('ubicaciones.create');
    }

    public function store(Request $request)
    {

        $ubicacion = new Ubicacion();
        $ubicacion->nombre = $request->input('nombre');
        $ubicacion->calle = $request->input('calle');
        $ubicacion->localidad = $request->input('localidad');
        $ubicacion->save();

        return redirect()->route('dashboard');
    }

    public function mostrarUbicaciones()
    {
        $ubicaciones = Ubicacion::all();
        return view('ubicaciones', ['ubicaciones' => $ubicaciones]);
    }



}