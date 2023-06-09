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
        $ubicacion->url = $request->input('url');
        $archivo = $request->file('foto');
        $rutaArchivo = $archivo->store('public/images/ubicaciones', 'public');
        $ubicacion->foto = $rutaArchivo;
        $ubicacion->save();

        return redirect()->route('ubicaciones');
    }

    public function mostrarUbicaciones()
    {
        $ubicaciones = Ubicacion::all();
        return view('ubicaciones', ['ubicaciones' => $ubicaciones]);
    }

    public function edit($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicaciones.edit', ['ubicacion' => $ubicacion]);
    }

    public function update(Request $request, $id)
    {
        $ubicacion = Ubicacion::find($id);
        $ubicacion->nombre = $request->input('nombre');
        $ubicacion->calle = $request->input('calle');
        $ubicacion->localidad = $request->input('localidad');
        $ubicacion->url = $request->input('url');
        $archivo = $request->file('foto');
        $rutaArchivo = $archivo->store('public/images/ubicaciones', 'public');
        $ubicacion->foto = $rutaArchivo;
        $ubicacion->save();

        return redirect()->route('ubicaciones');
    }

    public function delete($id)
{
    $ubicacion = Ubicacion::findOrFail($id);
    $ubicacion->delete();
    return redirect()->back();
}


}