<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'mensaje',
        'tratamiento_id',
        'leida',
    ];

    public function tratamiento()
{
    return $this->belongsTo(Tratamiento::class);
}
}
