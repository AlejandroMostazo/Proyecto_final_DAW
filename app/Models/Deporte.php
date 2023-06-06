<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publicacion;

class Deporte extends Model
{
    use HasFactory;

    protected $table = 'deportes';

    protected $fillable = [
        'nombre',
        'icono',
        'color',
    ];

    public function deportesFav()
    {
        return $this->belongsToMany(Deporte::class, 'deportes_fav', 'user_id', 'deporte_id')->withTimestamps();
    }

    // hasMany porque es una relacion N:N
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }
}
