<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Teno Fisioterapia</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar">
            <div class="nav-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Teno" class="logo-img">
                <div class="logo-text-wrap">
                    <span class="logo-name">TENO</span>
                    <span class="logo-sub">Fisioterapia</span>
                </div>
            </div>
            <div class="nav-links">
                <a href="{{ url('/') }}">Inicio</a>
                <a href="#">Tratamientos</a>
                <a href="#">Contacto</a>
                <a href="/sobre-nosotros">Sobre Nosotros</a>
            </div>
        </nav>

        <main class="auth-main">
            <div class="auth-card">
                {{ $slot }}
            </div>
        </main>
    </body>
</html>