@extends('layouts.app')

@if(session('success'))
    <div class="alert-exito" style="text-align: center; margin: 1rem 2rem;">
        {{ session('success') }}
    </div>
@endif

@section('content')
<div class="contacto-page">
    <div class="contacto-hero">
        <h1>Contacto</h1>
        <p>¿Tienes alguna pregunta? Estamos aquí para ayudarte</p>
    </div>

    <div class="contacto-container">
        <div class="contacto-info">
            <div class="contacto-card">
                <div class="contacto-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <h3>Dirección</h3>
                <p>Av. de Andalucía, Nº10, Bajo<br>18640 Padul, Granada</p>
            </div>

            <div class="contacto-card">
                <div class="contacto-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <h3>Teléfono</h3>
                <p><a href="tel:667303730">667 303 730</a></p>
            </div>

            <div class="contacto-card">
                <div class="contacto-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <h3>Email</h3>
                <p><a href="mailto:info@tenofisioterapia.com">info@tenofisioterapia.com</a></p>
            </div>

            <div class="contacto-card">
                <div class="contacto-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <h3>Horario</h3>
                <p>Lunes a Jueves<br>10:00 - 14:00 | 16:00 - 20:00<br>Viernes: 10:00 - 14:00<br>Sábados y Domingos: Cerrado</p>
            </div>
        </div>

        <div class="contacto-formulario">
            <h2>Envíanos un mensaje</h2>
            <form method="POST" action="{{ route('contacto.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre completo *</label>
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
                    <textarea name="mensaje" id="mensaje" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn-form">Enviar mensaje</button>
            </form>
        </div>
    </div>

    <div class="contacto-mapa">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3185.3433054382317!2d-3.6302461999999993!3d37.025459999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71f179e3911e7d%3A0x4005d2abb85f0387!2sTeno%20Fisioterapia!5e0!3m2!1ses!2ses!4v1776532058676!5m2!1ses!2ses" 
            width="100%" 
            height="400" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<style>
.contacto-page {
    min-height: calc(100vh - 68px);
}

.contacto-hero {
    background: var(--color-principal);
    color: white;
    padding: 3rem 2rem;
    text-align: center;
}

.contacto-hero h1 {
    font-size: 2rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.contacto-hero p {
    opacity: 0.9;
}

.contacto-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 3rem 2rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
}

.contacto-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.contacto-card {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
}

.contacto-icon {
    width: 50px;
    height: 50px;
    background: var(--color-claro);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: var(--color-principal);
}

.contacto-card h3 {
    font-size: 1rem;
    color: var(--color-muy-oscuro);
    margin-bottom: 0.5rem;
}

.contacto-card p {
    font-size: 14px;
    color: var(--color-texto-suave);
    line-height: 1.5;
}

.contacto-card a {
    color: var(--color-principal);
}

.contacto-formulario {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 2rem;
}

.contacto-formulario h2 {
    font-size: 1.3rem;
    color: var(--color-muy-oscuro);
    margin-bottom: 1.5rem;
}

.contacto-mapa {
    width: 100%;
    height: 400px;
    background: #e2e8f0;
}

@media (max-width: 768px) {
    .contacto-container {
        grid-template-columns: 1fr;
    }
    
    .contacto-info {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection