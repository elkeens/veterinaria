<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mascota extends Model
{
    protected $fillable = [
        'nombre',
        'dueno',
        'telefono_dueno',
        'especie',
        'raza',
        'edad',
        'sexo',
        'observaciones',
    ];

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }
}
