@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Tratamientos</h2>
        
        @if(session('success'))
            <div class="alert-exito">{{ session('success') }}</div>
        @endif
        
        <div class="admin-card">
            <a href="{{ route('admin.tratamientos.create') }}" class="nav-btn" style="display: inline-block; margin-bottom: 1rem;">
                + Nuevo Tratamiento
            </a>
            
            @if($tratamientos->count() > 0)
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tratamientos as $tratamiento)
                    <tr>
                        <td>{{ $tratamiento->id }}</td>
                        <td>{{ $tratamiento->titulo }}</td>
                        <td>
                            <span class="tag">
                                {{ $tratamiento->categoria === 'fisioterapia' ? 'Fisioterapia' : 'Medicina Estética' }}
                            </span>
                        </td>
                        <td>
                            @if($tratamiento->imagen)
                                <img src="{{ asset('storage/' . $tratamiento->imagen) }}" width="50" style="border-radius: 6px; object-fit: cover;">
                            @else
                                <span style="color: var(--color-texto-suave);">Sin imagen</span>
                            @endif
                        </td>
                        <td>
                            <div class="acciones">
                                <a href="{{ route('admin.tratamientos.edit', $tratamiento) }}" class="btn-editar">Editar</a>
                                <form action="{{ route('admin.tratamientos.destroy', $tratamiento) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-borrar" onclick="return confirm('¿Estás seguro de eliminar este tratamiento?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No hay tratamientos creados aún.</p>
            @endif
        </div>
        
        <a href="{{ url('/') }}" class="btn-cancelar">← Volver al inicio</a>
    </div>
</div>
@endsection