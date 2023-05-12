<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deporte;
use App\Models\User;
use App\Models\Ubicacion;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $fillable = [
        'id_usuario',
        'nivel',
        'num_max_apuntados',
        'ac_apuntados',
        'fecha_hora',
        'ubicacion_id',
        'deporte_id',
    ];
}
