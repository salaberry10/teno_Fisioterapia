@extends('layouts.app')

@section('content')
    <section class="hero">
        <h1>Bienvenido a <em>Teno Fisioterapia</em></h1>
        <p>Tu salud, nuestra prioridad. Tratamientos personalizados para tu bienestar.</p>
        <div class="hero-btns">
            <a href="#" class="btn-primary">Pedir Cita</a>
            <a href="#" class="btn-outline">Ver Tratamientos</a>
        </div>
    </section>

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