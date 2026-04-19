<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo',
        'fecha',
        'hora',
        'observaciones',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}