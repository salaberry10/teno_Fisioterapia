<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Horario;
use App\Models\User;
use App\Notifications\NuevaCitaReservada;
use App\Notifications\CitaCancelada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class CitaControllerPublico extends Controller
{
    public function create()
    {
        $horarios = Horario::where('activo', true)->get();

        // Obtener las citas activas con fecha de hoy o futuro
        $citasOcupadas = Cita::where('estado', 'activa')
            ->whereDate('fecha', '>=', now()->format('Y-m-d'))
            ->get(['fecha', 'hora', 'tipo']);

        return view('publico.citas.create', compact('horarios', 'citasOcupadas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:fisioterapia,presoterapia',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'observaciones' => 'nullable|string',
        ]);

        // Si la fecha es hoy, validar que la hora no haya pasado
        if ($request->fecha === now()->format('Y-m-d')) {
            $horaCita = Carbon::parse($request->fecha . ' ' . $request->hora);
            if ($horaCita->isPast()) {
                return back()->withErrors(['hora' => 'No puedes reservar una hora que ya ha pasado.'])->withInput();
            }
        }

        // Validar que la hora no esté ya ocupada
        $citaExistente = Cita::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('tipo', $request->tipo)
            ->where('estado', 'activa')
            ->exists();

        if ($citaExistente) {
            return back()->withErrors(['hora' => 'Esta hora ya está reservada. Por favor, elige otra.'])->withInput();
        }

        $cita = Cita::create([
            'user_id' => Auth::id(),
            'tipo' => $request->tipo,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'observaciones' => $request->observaciones,
            'estado' => 'activa',
        ]);

        // Notificar a todos los admins por email
        $admins = User::where('is_admin', true)->get();
        Notification::send($admins, new NuevaCitaReservada($cita));

        return redirect()->route('citas.mis-citas')->with('success', 'Cita solicitada correctamente');
    }

    public function misCitas()
    {
        $citas = Cita::where('user_id', Auth::id())
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();

        return view('publico.citas.index', compact('citas'));
    }

    public function destroy(Cita $cita)
    {
        $this->authorize('cancelar', $cita);
        
        $cita->update(['estado' => 'cancelada']);
        
        // Notificar a todos los admins por email
        $admins = User::where('is_admin', true)->get();
        Notification::send($admins, new CitaCancelada($cita));
        
        return back()->with('success', 'Cita cancelada correctamente');
    }
}