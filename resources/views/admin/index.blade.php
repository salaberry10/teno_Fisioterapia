@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Panel de Administración</h2>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 30px;">
            <a href="{{ route('admin.tratamientos.index') }}" style="display: block; background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; text-decoration: none; color: #2D3748; transition: all 0.2s;">
                <h3 style="margin: 0 0 10px 0; padding-bottom: 10px; border-bottom: 1px solid #e2e8f0;">Tratamientos</h3>
                <p style="margin: 0; color: #718096;">Gestionar servicios de fisioterapia y medicina estética</p>
            </a>
            
            <a href="{{ route('admin.usuarios.index') }}" style="display: block; background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; text-decoration: none; color: #2D3748; transition: all 0.2s;">
                <h3 style="margin: 0 0 10px 0; padding-bottom: 10px; border-bottom: 1px solid #e2e8f0;">Usuarios</h3>
                <p style="margin: 0; color: #718096;">Administrar usuarios y permisos</p>
            </a>
            
            <a href="{{ route('admin.citas.index') }}" style="display: block; background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; text-decoration: none; color: #2D3748; transition: all 0.2s;">
                <h3 style="margin: 0 0 10px 0; padding-bottom: 10px; border-bottom: 1px solid #e2e8f0;">Citas</h3>
                <p style="margin: 0; color: #718096;">Ver y gestionar citas de pacientes</p>
            </a>
            
            <a href="{{ route('admin.solicitudes.index') }}" style="display: block; background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; text-decoration: none; color: #2D3748; transition: all 0.2s;">
                <h3 style="margin: 0 0 10px 0; padding-bottom: 10px; border-bottom: 1px solid #e2e8f0;">Solicitudes</h3>
                <p style="margin: 0; color: #718096;">Ver solicitudes de contacto</p>
            </a>
        </div>
        
        <a href="{{ url('/') }}" class="btn-cancelar">← Volver al inicio</a>
    </div>
</div>
@endsection