@extends('layouts.app')

@if(session('success'))
    <div class="alert-exito" style="text-align: center; margin: 1rem 2rem;">
        {{ session('success') }}
    </div>
@endif

@section('content')
<div class="tratamiento-detalle">
    <!-- Imagen principal -->
    <div class="tratamiento-hero">
        @if($tratamiento->imagen)
        <img src="{{ asset('storage/' . $tratamiento->imagen) }}" alt="{{ $tratamiento->titulo }}" class="tratamiento-hero-img">
        @else
        <div class="tratamiento-hero-placeholder"></div>
        @endif
        <div class="tratamiento-hero-overlay">
            <div class="tratamiento-hero-content">
                <span class="tag">{{ $tratamiento->categoria === 'fisioterapia' ? 'Fisioterapia' : 'Medicina Estética' }}</span>
                <h1>{{ $tratamiento->titulo }}</h1>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="tratamiento-contenido">
        <div class="tratamiento-descripcion">
            <h2>Descripción del tratamiento</h2>
            @if($tratamiento->descripcion)
            <p>{{ $tratamiento->descripcion }}</p>
            @else
            <p class="no-data">Próximamente información detallada sobre este tratamiento.</p>
            @endif
        </div>

        <!-- Formulario de contacto -->
        <div class="tratamiento-formulario">
            <h2>Solicitar información</h2>
            <p class="formulario-subtitle">¿Te interesa este tratamiento? Rellena el formulario y te contactaremos.</p>
            
            <form method="POST" action="{{ route('solicitud.store') }}">
                @csrf
                <input type="hidden" name="tratamiento_id" value="{{ $tratamiento->id }}">
                
                <div class="form-group">
                    <label for="nombre">Nombre *</label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" required>
                </div>
                
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" name="telefono" id="telefono">
                </div>
                
                <div class="form-group">
                    <label for="mensaje">Mensaje *</label>
                    <textarea name="mensaje" id="mensaje" rows="4" required>Quiero información sobre este tratamiento.</textarea>
                </div>
                
                <button type="submit" class="btn-form">Enviar Solicitud</button>
            </form>
        </div>
    </div>

    <!-- Volver -->
    <div class="tratamiento-volver">
        <a href="{{ route('tratamientos') }}" class="btn-volver">&larr; Volver a todos los tratamientos</a>
    </div>
</div>

<style>
.tratamiento-hero {
    position: relative;
    height: 350px;
    overflow: hidden;
}

.tratamiento-hero-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.tratamiento-hero-placeholder {
    width: 100%;
    height: 100%;
    background: var(--color-muy-oscuro);
}

.tratamiento-hero-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 2rem;
    background: linear-gradient(to top, rgba(15, 84, 104, 0.9), transparent);
    color: white;
}

.tratamiento-hero-content {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.tratamiento-hero-content .tag {
    margin-bottom: 0.5rem;
}

.tratamiento-hero-overlay h1 {
    font-size: 2rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.tratamiento-contenido {
    max-width: 900px;
    margin: 0 auto;
    padding: 2rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
}

.tratamiento-descripcion h2,
.tratamiento-formulario h2 {
    font-size: 1.3rem;
    color: var(--color-muy-oscuro);
    margin-bottom: 1rem;
}

.tratamiento-descripcion p {
    color: var(--color-texto);
    line-height: 1.7;
}

.formulario-subtitle {
    font-size: 14px;
    color: var(--color-texto-suave);
    margin-bottom: 1.5rem;
}

.tratamiento-volver {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 2rem 2rem;
}

.btn-volver {
    color: var(--color-principal);
    font-weight: 500;
}

.btn-volver:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .tratamiento-contenido {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection