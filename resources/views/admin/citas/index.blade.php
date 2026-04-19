@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Gestión de Citas</h2>
        
        <div class="filtros">
            <a href="{{ route('admin.citas.index') }}" class="btn-filtro {{ !request('tipo') ? 'active' : '' }}">Todas</a>
            <a href="{{ route('admin.citas.index', ['tipo' => 'fisioterapia']) }}" class="btn-filtro {{ request('tipo') == 'fisioterapia' ? 'active' : '' }}">Fisioterapia</a>
            <a href="{{ route('admin.citas.index', ['tipo' => 'presoterapia']) }}" class="btn-filtro {{ request('tipo') == 'presoterapia' ? 'active' : '' }}">Presoterapia</a>
        </div>
        
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
                        <th>Usuario</th>
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
                        <td>
                            <strong>{{ $cita->user->name }}</strong><br>
                            <small>{{ $cita->user->email }}</small>
                        </td>
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
                            <form action="{{ route('admin.citas.destroy', $cita) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-borrar" onclick="return confirm('¿Cancelar esta cita?')">Cancelar</button>
                            </form>
                            @else
                            <span style="color: #718096;">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No hay citas.</p>
            @endif
        </div>
        
        <div class="admin-actions">
            <a href="{{ route('admin.citas.horarios') }}" class="btn-editar">Configurar Horarios</a>
            <a href="{{ url('/') }}" class="btn-cancelar">← Volver al inicio</a>
        </div>
    </div>
</div>
@endsection