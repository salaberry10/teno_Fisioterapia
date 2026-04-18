@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Detalles del Tratamiento</h2>
        
        <div class="admin-card">
            <h3 style="margin-bottom: 1rem; font-size: 1.3rem;">{{ $tratamiento->titulo }}</h3>
            
            @if($tratamiento->imagen)
                <div style="margin-bottom: 1.5rem;">
                    <img src="{{ asset('storage/' . $tratamiento->imagen) }}" width="200" style="border-radius: 8px; object-fit: cover;">
                </div>
            @endif
            
            <p style="margin-bottom: 0.5rem;">
                <strong>Categoría:</strong> 
                <span class="tag">{{ $tratamiento->categoria === 'fisioterapia' ? 'Fisioterapia' : 'Medicina Estética' }}</span>
            </p>
            
            @if($tratamiento->descripcion)
            <p style="margin-top: 1rem;">
                <strong>Descripción:</strong>
            </p>
            <p style="color: var(--color-texto-suave); margin-top: 0.5rem; line-height: 1.6;">{{ $tratamiento->descripcion }}</p>
            @endif
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('admin.tratamientos.edit', $tratamiento) }}" class="nav-btn">Editar</a>
            <a href="{{ route('admin.tratamientos.index') }}" class="btn-cancelar" style="margin: 0; padding-top: 8px;">← Volver al listado</a>
        </div>
    </div>
</div>
@endsection