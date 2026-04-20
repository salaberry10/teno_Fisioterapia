<?php

namespace App\Policies;

use App\Models\Cita;
use App\Models\User;
use Carbon\Carbon;

class CitaPolicy
{
    public function cancelar(User $user, Cita $cita): bool
    {
        // Solo puede cancelar si es owner O admin
        if ($user->id !== $cita->user_id && $user->is_admin !== true) {
            return false;
        }
        
        // Verificar que quedan más de 24h para la cita
        $fechaCita = Carbon::parse($cita->fecha . ' ' . $cita->hora);
        $horasRestantes = Carbon::now()->diffInHours($fechaCita, false);
        
        return $horasRestantes >= 24;
    }
}
