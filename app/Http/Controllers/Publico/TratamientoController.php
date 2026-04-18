<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('tratamientos', compact('tratamientos'));
    }
}
