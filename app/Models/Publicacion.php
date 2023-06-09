<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deporte;
use App\Models\Ubicacion;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $fillable = [
        'user_id',
        'nivel',
        'num_max_apuntados',
        'ac_apuntados',
        'fecha_hora',
        'ubicacion_id',
        'deporte_id',
    ];

    public function deporte()
    {
        return $this->belongsTo(Deporte::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function usuariosApuntados()
    {
        return $this->hasMany(User::class, 'publicacion_id');
    }


}
