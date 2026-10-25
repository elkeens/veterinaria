<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Veterinario extends Model
{
    protected $fillable = [
        'nombre',
        'cedula',
        'telefono',
    ];

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }
}