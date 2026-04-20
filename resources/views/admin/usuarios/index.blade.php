@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Gestión de Usuarios</h2>
        
        @if(session('success'))
            <div class="alert-exito">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif
        
        <div class="admin-card">
            @if($usuarios->count() > 0)
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @if($usuario->is_admin)
                                <span class="tag" style="background: #e53e3e; color: white;">Admin</span>
                            @else
                                <span class="tag" style="background: #38a169; color: white;">Usuario</span>
                            @endif
                        </td>
                        <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="acciones">
                                @if(auth()->id() !== $usuario->id)
                                <form action="{{ route('admin.usuarios.toggleAdmin', $usuario) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn-editar">
                                        {{ $usuario->is_admin ? 'Quitar Admin' : 'Hacer Admin' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-borrar" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                                </form>
                                @else
                                <span style="color: #718096; font-size: 0.85em;">(tú)</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No hay usuarios registrados.</p>
            @endif
        </div>
        
        <a href="{{ route('admin.index') }}" class="btn-editar">← Panel Admin</a>
        <a href="{{ url('/') }}" class="btn-cancelar">← Inicio</a>
    </div>
</div>
@endsection