@extends('layouts.app')

@section('content')
    {{-- ===== HERO ===== --}}
    <section class="hero-banner">
        <div class="hero-banner-content">
            <h1 class="hero-banner-title">
                CLÍNICA DE<br>
                <strong>REHABILITACIÓN, FISIOTERAPIA Y MEDICINA ESTÉTICA</strong>
            </h1>
            <p class="hero-banner-subtitle">
                Consigue el mejor resultado en el menor tiempo posible gracias a nuestro enfoque multidisciplinar y personalizado.
            </p>
            <a href="{{ auth()->check() ? route('citas.create') : route('login') }}" class="hero-banner-btn">Pedir cita</a>
        </div>
        <div class="hero-banner-image">
            <img src="{{ asset('img/Banner_Home.png') }}" alt="Teno Fisioterapia">
        </div>
    </section>

    {{-- ===== CATEGORÍAS ===== --}}
    <section class="categorias">
        <a href="{{ route('tratamientos') }}" class="categoria-card">
            <img src="{{ asset('img/Fisioterapia.png') }}" alt="Fisioterapia">
            <div class="categoria-overlay">
                <h2>FISIOTERAPIA</h2>
            </div>
        </a>
        <a href="{{ route('tratamientos') }}" class="categoria-card">
            <img src="{{ asset('img/Medicina_Estetica.png') }}" alt="Medicina Estética">
            <div class="categoria-overlay">
                <h2>MEDICINA ESTÉTICA</h2>
            </div>
        </a>
    </section>

    {{-- ===== Sección: Nuestra visión ===== --}}
    <section class="vision-section">
        <div class="vision-container">
            <div class="vision-imagen">
                @if(file_exists(public_path('img/fisio.png')))
                    <img src="{{ asset('img/fisio.png') }}" alt="Fisioterapeuta Teno">
                @else
                    <div class="vision-placeholder">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
            </div>
            <div class="vision-texto">
                <h2>Nuestra visión: Salud, integridad y movimiento.</h2>
                <p>Somos fisioterapeutas convencidos de que otra manera de cuidar al paciente es posible.</p>
                <p>Para conseguir una recuperación óptima es esencial personalizar el tratamiento a cada persona.</p>
                <p>Nuestro objetivo es restablecer el equilibrio y normalizar la función a través de terapia manual y ejercicio terapéutico.</p>
                <a href="{{ route('contacto') }}" class="vision-btn">Conoce más</a>
            </div>
        </div>
    </section>

    {{-- ===== Sección: Por qué elegirnos ===== --}}
    <section class="valores-section">
        <div class="valores-container">
            <div class="valor-card">
                <div class="valor-circulo">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>ENFOCADOS A<br>TUS NECESIDADES</h3>
            </div>
            <div class="valor-card">
                <div class="valor-circulo">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>AGENDA FLEXIBLE</h3>
            </div>
            <div class="valor-card">
                <div class="valor-circulo">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h3>SESIÓN DE VALORACIÓN</h3>
            </div>
        </div>
    </section>

    {{-- ===== Sección: Testimonios ===== --}}
    <section class="testimonios-section">
        <div class="testimonios-container">
            <div class="testimonios-header">
                <span class="testimonios-tag">Testimonios</span>
                <h2>Qué dicen nuestros<br>pacientes</h2>
            </div>
            <div class="testimonios-grid">
                <div class="testimonio-card">
                    <span class="testimonio-comilla">"</span>
                    <p>Llevo años con dolor de espalda y desde que empecé mis sesiones en Teno he notado una mejora enorme. Rafa es muy atento y el tratamiento totalmente personalizado.</p>
                    <strong>María G.</strong>
                </div>
                <div class="testimonio-card">
                    <span class="testimonio-comilla">"</span>
                    <p>Después de una lesión deportiva pensé que no podría volver a correr. Gracias al equipo de Teno he recuperado mi movilidad y mi confianza por completo. ¡Muy recomendable!</p>
                    <strong>Carlos M.</strong>
                </div>
                <div class="testimonio-card">
                    <span class="testimonio-comilla">"</span>
                    <p>La atención es excelente desde el primer día. Te explican cada paso del tratamiento y te hacen sentir como en casa. Sin duda la mejor clínica de fisioterapia de la zona.</p>
                    <strong>Laura R.</strong>
                </div>
            </div>
        </div>
    </section>
@endsection