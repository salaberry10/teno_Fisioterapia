<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'mensaje' => 'required|string',
            'tratamiento_id' => 'required|exists:tratamientos,id',
        ]);

        Solicitud::create($validated);

        return redirect()->back()->with('success', 'Tu solicitud ha sido enviada correctamente. Te contactaremos pronto.');
    }
}
