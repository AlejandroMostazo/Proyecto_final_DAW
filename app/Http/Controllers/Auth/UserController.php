<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('auth.editarusuario', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        if (request()->filled('new_password') || request()->filled('password_confirmation')) {
            $validatedData = $request->validate([
                'new_password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            if ($validatedData['new_password'] !== $validatedData['password_confirmation']) {
                return redirect()->back()->withErrors(['password' => 'Las contraseñas no coinciden.'])->withInput();
            }

            $user->password = Hash::make($validatedData['new_password']);
        }

        $user->save();

        return redirect()->route('dashboard');
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();

        return redirect()->route('/');
    }

}
