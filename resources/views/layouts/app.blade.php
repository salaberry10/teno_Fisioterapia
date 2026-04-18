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
                <a href="{{ url('/tratamientos') }}">Tratamientos</a>
                <a href="#">Contacto</a>
                <a href="/sobre-nosotros">Sobre Nosotros</a>
            </div>
            <div class="nav-actions">
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-user">{{ Auth::user()->name }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-btn">Cerrar Sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-btn">Iniciar Sesión</a>
                @endauth
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="footer">
            <div class="footer-content">
                <div class="footer-logo">
                    <span class="logo-name">TENO</span>
                    <span class="logo-sub">Fisioterapia</span>
                </div>
                <p>&copy; 2026 Teno Fisioterapia</p>
            </div>
        </footer>
    </body>
</html>