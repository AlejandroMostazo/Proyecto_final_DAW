<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;

    protected $table = 'deportes';

    protected $fillable = [
        'nombre',
    ];

    public function deportesFav()
    {
        return $this->belongsToMany(Deporte::class, 'deportes_fav', 'user_id', 'deporte_id')->withTimestamps();
    }
}
