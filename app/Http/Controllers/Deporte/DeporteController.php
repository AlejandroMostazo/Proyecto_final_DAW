<?php

namespace App\Http\Controllers\Deporte;

use Illuminate\Http\Request;
use App\Models\Deporte;
use App\Http\Controllers\Controller;

class DeporteController extends Controller
{
    public function create()
    {
       /*  if (!Auth::user()->hasRole('admin')) {
            abort(403);
        } */
        return view('Deporte.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255', 'unique:deportes'],
            'icono' => ['required', 'string', 'max:255', 'unique:deportes'],
            'color' => ['required', 'string', 'max:255'],
        ]);

        $deporte = new Deporte;
        $deporte->nombre = $request->input('nombre');
        $deporte->icono = $request->input('icono');
        $deporte->color = $request->input('color');
        $deporte->save();

        $tags = $request->input('tags', []);

        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $deporteDinamico = new Deporte();
                $deporteDinamico->nombre = $tag;
                $deporteDinamico->save();
            }
        }

        return redirect()->route('deportes.mostrar');
    }


    public function mostrar()
    {
        $deportes = Deporte::paginate(12);

        return view('Deporte.deportes', compact('deportes'));
    }

    public function edit($id)
    {
        $deporte = Deporte::findOrFail($id);
        return view('Deporte.editar', compact('deporte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255', 'unique:deportes,nombre,' . $id],
            'icono' => ['required', 'string', 'max:255' . $id],
        ]);

        $deporte = Deporte::findOrFail($id);
        $deporte->nombre = $request->input('nombre');
        $deporte->icono = $request->input('icono');
        $deporte->color = $request->input('color');
        $deporte->save();

        return redirect()->route('deportes.mostrar');
    }

    public function delete($id)
    {
        $deporte = Deporte::findOrFail($id);
        $deporte->delete();

        return redirect()->route('deportes.mostrar');
    }

}
