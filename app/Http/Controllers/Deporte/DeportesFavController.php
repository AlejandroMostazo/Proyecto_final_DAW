<?php

namespace App\Http\Controllers\Deporte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deporte;
use App\Models\User;

class DeportesFavController extends Controller
{
    public function create()
    {
        $deportes = Deporte::all();
        return view('Deporte.fav', compact('deportes'));
    }

    public function store(Request $request)
    {        

        $user = $request->user();
        $deportesFavIds = $request->input('deportes');

        $user->deportesFav()->attach($deportesFavIds);

        return redirect()->route('dashboard');
    }

    public function show(User $user)
    {
        $user->load('deportesFav');

        return view('dashboard', compact('user'));
    }

}
