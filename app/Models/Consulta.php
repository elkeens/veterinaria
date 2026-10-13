<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consulta extends Model
{
    protected $fillable = [
        'mascota_id',
        'fecha',
        'motivo_consulta',
        'diagnostico',
        'procedimiento_realizado',
        'tratamiento',
        'observaciones',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function mascota(): BelongsTo
    {
        return $this->belongsTo(Mascota::class);
    }
}