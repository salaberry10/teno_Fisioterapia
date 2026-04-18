<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::with('tratamiento')->orderBy('created_at', 'desc')->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function show(Solicitud $solicitud)
    {
        if (!$solicitud->leida) {
            $solicitud->leida = true;
            $solicitud->save();
        }
        return view('admin.solicitudes.show', compact('solicitud'));
    }

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('admin.solicitudes.index')->with('success', 'Solicitud eliminada');
    }
}
