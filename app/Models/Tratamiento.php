<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tratamiento extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'imagen',
        'categoria',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tratamiento) {
            if (empty($tratamiento->slug)) {
                $tratamiento->slug = Str::slug($tratamiento->titulo);
            }
        });

        static::updating(function ($tratamiento) {
            if (empty($tratamiento->slug) || $tratamiento->isDirty('titulo')) {
                $tratamiento->slug = Str::slug($tratamiento->titulo);
            }
        });
    }
}
