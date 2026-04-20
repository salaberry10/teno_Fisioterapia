<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Horario;
use Illuminate\Http\Request;

class CitaControllerAdmin extends Controller
{
    public function index(Request $request)
    {
        $citas = Cita::with('user')
            ->when($request->tipo, function($query) use ($request) {
                $query->where('tipo', $request->tipo);
            })
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();

        return view('admin.citas.index', compact('citas'));
    }

    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'required|in:activa,cancelada,completada',
        ]);

        $cita->update($request->all());

        return back()->with('success', 'Cita actualizada');
    }

    public function destroy(Cita $cita)
    {
        $cita->update(['estado' => 'cancelada']);
        return back()->with('success', 'Cita cancelada');
    }

    public function horarios()
    {
        $horarios = Horario::orderBy('dia_semana')->orderBy('hora_inicio')->get();
        return view('admin.citas.horarios', compact('horarios'));
    }

    public function actualizarHorarios(Request $request)
    {
        $horariosData = $request->horarios;

        foreach ($horariosData as $key => $turnos) {
            foreach ($turnos as $turno => $data) {
                if (!isset($data['tipo'])) {
                    continue;
                }

                $data['activo'] = isset($data['activo']) ? 1 : 0;
                
                Horario::updateOrCreate(
                    [
                        'tipo' => $data['tipo'],
                        'dia_semana' => $data['dia_semana'],
                        'turno' => $data['turno'],
                    ],
                    $data
                );
            }
        }

        return back()->with('success', 'Horarios actualizados');
    }
}