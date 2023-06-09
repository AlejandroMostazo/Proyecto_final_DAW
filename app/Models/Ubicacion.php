<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publicacion;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones';

    protected $fillable = [
        'nombre',
        'calle',
        'localidad'
    ];

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }
}
