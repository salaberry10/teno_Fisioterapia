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
        return view('publico.citas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:fisioterapia,presoterapia',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'observaciones' => 'nullable|string',
        ]);

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