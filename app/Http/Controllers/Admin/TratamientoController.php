<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('admin.tratamientos.index', compact('tratamientos'));
    }

    public function create()
    {
        return view('admin.tratamientos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'categoria' => 'required|in:fisioterapia,medicina_estetica',
        ]);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('tratamientos', 'public');
        }

        Tratamiento::create($validated);

        return redirect()->route('admin.tratamientos.index')->with('success', 'Tratamiento creado correctamente');
    }

    public function show(Tratamiento $tratamiento)
    {
        return view('admin.tratamientos.show', compact('tratamiento'));
    }

    public function edit(Tratamiento $tratamiento)
    {
        return view('admin.tratamientos.edit', compact('tratamiento'));
    }

    public function update(Request $request, Tratamiento $tratamiento)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'categoria' => 'required|in:fisioterapia,medicina_estetica',
        ]);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('tratamientos', 'public');
        }

        $tratamiento->update($validated);

        return redirect()->route('admin.tratamientos.index')->with('success', 'Tratamiento actualizado correctamente');
    }

    public function destroy(Tratamiento $tratamiento)
    {
        $tratamiento->delete();
        return redirect()->route('admin.tratamientos.index')->with('success', 'Tratamiento eliminado correctamente');
    }
}
