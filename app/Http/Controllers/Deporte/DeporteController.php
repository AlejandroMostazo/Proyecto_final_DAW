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
        ]);

        $deporte = new Deporte;
        $deporte->nombre = $request->input('nombre');
        $deporte->save();

        return redirect()->route('dashboard')
            ->with('success', 'Deporte agregado exitosamente');
    }
}
