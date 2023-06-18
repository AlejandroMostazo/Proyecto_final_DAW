<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Deporte;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $deportes  = Deporte::all();
        return view('auth.editarusuario', compact('user', 'deportes'));
    }

    public function nuevaFoto(Request $request, $id) {

        $user = User::findOrFail($id);
        
        $archivo = $request->file('foto');
        $rutaArchivo = $archivo->store('public/images/usuarios', 'public');
        $user->foto = $rutaArchivo;

        $user->save();

        return redirect()->route('perfil');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->genero = $request->input('genero');
        $user->nacimiento = $request->input('nacimiento');
        
        
        
        if (request()->filled('password') || request()->filled('password_confirmation')) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8'],
            ]);

            if ($request->input('password') !== $request->input('password_confirmation')) {
                return redirect()->back()->withErrors(['password' => 'Las contraseñas no coinciden.']);
            }

            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('perfil');
    }


    public function delete($id, Request $request)
    {
        $user = User::findOrFail($id);
        
        $user->delete();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
