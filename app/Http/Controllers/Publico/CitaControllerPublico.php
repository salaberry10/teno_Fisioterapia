<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaControllerPublico extends Controller
{
    public function create()
    {
        $horarios = Horario::where('activo', true)->get();
        return view('publico.citas.create', compact('horarios'));
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
        $horaCita = \Carbon\Carbon::parse($request->fecha . ' ' . $request->hora);
        if ($horaCita->isPast()) {
            return back()->withErrors(['hora' => 'No puedes reservar una hora que ya ha pasado.'])->withInput();
        }
    }

    Cita::create([
        'user_id' => Auth::id(),
        'tipo' => $request->tipo,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'observaciones' => $request->observaciones,
        'estado' => 'activa',
    ]);

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
        
        return back()->with('success', 'Cita cancelada correctamente');
    }
}