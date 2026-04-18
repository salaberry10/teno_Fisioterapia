<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'mensaje' => 'required|string',
        ]);

        Solicitud::create([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'mensaje' => $validated['mensaje'],
            'tratamiento_id' => null,
            'leida' => false,
        ]);

        return redirect()->route('contacto')->with('success', 'Tu mensaje ha sido enviado correctamente. Te contactaremos pronto.');
    }
}