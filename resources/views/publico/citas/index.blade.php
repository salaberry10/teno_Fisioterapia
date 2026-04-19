@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Mis Citas</h2>
        
        @if(session('success'))
            <div class="alert-exito">{{ session('success') }}</div>
        @endif
        
        <div class="admin-card">
            @if($citas->count() > 0)
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ ucfirst($cita->tipo) }}</td>
                        <td>
                            @switch($cita->estado)
                                @case('activa')
                                    <span class="tag" style="background: #38a169; color: white;">Activa</span>
                                    @break
                                @case('cancelada')
                                    <span class="tag" style="background: #e53e3e; color: white;">Cancelada</span>
                                    @break
                                @case('completada')
                                    <span class="tag" style="background: #3182ce; color: white;">Completada</span>
                                    @break
                            @endswitch
                        </td>
                        <td>
                            @if($cita->estado === 'activa')
                                @php
                                    $ahora = \Carbon\Carbon::now();
                                    $fechaCita = \Carbon\Carbon::parse($cita->fecha . ' ' . $cita->hora);
                                    $horasRestantes = $ahora->diffInHours($fechaCita, false);
                                @endphp
                                
                                @if($horasRestantes >= 24)
                                <form action="{{ route('citas.destroy', $cita) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-borrar" onclick="return confirm('¿Cancelar esta cita?')">Cancelar</button>
                                </form>
                                @else
                                <span style="color: #718096; font-size: 0.85em;">No cancelable (menos de 24h)</span>
                                @endif
                            @else
                            <span style="color: #718096; font-size: 0.85em;">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No tienes citas programadas.</p>
            @endif
        </div>
        
        <a href="{{ route('citas.create') }}" class="btn-guardar">Pedir Nueva Cita</a>
        <a href="{{ url('/') }}" class="btn-cancelar">← Volver al inicio</a>
    </div>
</div>
@endsection