@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Solicitudes de Contacto</h2>
        
        @if(session('success'))
            <div class="alert-exito">{{ session('success') }}</div>
        @endif
        
        <div class="admin-card">
            @if($solicitudes->count() > 0)
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tratamiento</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                        <td>{{ $solicitud->nombre }}</td>
                        <td>{{ $solicitud->email }}</td>
                        <td>{{ $solicitud->tratamiento->titulo ?? 'Sin tratamiento' }}</td>
                        <td>
                            @if($solicitud->leida)
                                <span class="tag" style="background: #f0fff4; color: #276749;">Leída</span>
                            @else
                                <span class="tag" style="background: #fffaf0; color: #c05621;">Nueva</span>
                            @endif
                        </td>
                        <td>
                            <div class="acciones">
                                <a href="{{ route('admin.solicitudes.show', $solicitud) }}" class="btn-editar">Ver</a>
                                <form action="{{ route('admin.solicitudes.destroy', $solicitud) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-borrar" onclick="return confirm('¿Eliminar esta solicitud?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No hay solicitudes todavía.</p>
            @endif
        </div>
        
        <a href="{{ url('/') }}" class="btn-cancelar">← Volver al inicio</a>
    </div>
</div>
@endsection