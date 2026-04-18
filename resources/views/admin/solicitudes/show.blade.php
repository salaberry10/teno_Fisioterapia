@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Detalles de la Solicitud</h2>
        
        <div class="admin-card">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <p><strong>Nombre:</strong> {{ $solicitud->nombre }}</p>
                    <p><strong>Email:</strong> {{ $solicitud->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $solicitud->telefono ?? 'No proporcionado' }}</p>
                </div>
                <div>
                    <p><strong>Tratamiento:</strong> {{ $solicitud->tratamiento->titulo ?? 'Sin tratamiento' }}</p>
                    <p><strong>Fecha:</strong> {{ $solicitud->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Estado:</strong> 
                        @if($solicitud->leida)
                            <span class="tag" style="background: #f0fff4; color: #276749;">Leída</span>
                        @else
                            <span class="tag" style="background: #fffaf0; color: #c05621;">Nueva</span>
                        @endif
                    </p>
                </div>
            </div>
            
            <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e2e8f0;">
                <p><strong>Mensaje:</strong></p>
                <p style="margin-top: 0.5rem; line-height: 1.6;">{{ $solicitud->mensaje }}</p>
            </div>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('admin.solicitudes.index') }}" class="btn-cancelar">← Volver</a>
            <form action="{{ route('admin.solicitudes.destroy', $solicitud) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-borrar" onclick="return confirm('¿Eliminar esta solicitud?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection