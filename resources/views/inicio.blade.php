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

    {{-- ===== TRATAMIENTOS (lo que ya ten\u00edas) ===== --}}
    <section class="section-tratamientos">
        <div class="section-header">
            <span class="section-accent"></span>
            <h2>Nuestros Tratamientos</h2>
            <p>Ofrecemos una amplia gama de servicios de fisioterapia</p>
        </div>
        <div class="tratamientos-grid">
            <div class="tcard">
                <h3>Fisioterapia Deportiva</h3>
                <p>Tratamiento especializado para deportistas de todos los niveles</p>
            </div>
            <div class="tcard">
                <h3>Rehabilitación</h3>
                <p>Recuperación post-operatoria y tratamiento de lesiones</p>
            </div>
            <div class="tcard">
                <h3>Terapia Manual</h3>
                <p>Técnicas manuales para aliviar el dolor y mejorar movilidad</p>
            </div>
            <div class="tcard">
                <h3>Punción Seca</h3>
                <p>Tratamiento efectivo para puntos gatillo miofasciales</p>
            </div>
        </div>
    </section>
@endsection