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
            <div class="nav-right">
                <div class="nav-links">
                    <a href="{{ url('/') }}">Inicio</a>
                    <a href="{{ url('/tratamientos') }}">Tratamientos</a>
                    <a href="/sobre-nosotros">Sobre Nosotros</a>
                    <a href="{{ route('contacto') }}">Contacto</a>
                    @guest
                        <a href="{{ route('login') }}" class="nav-link-login">Iniciar Sesión</a>
                    @endguest
                </div>
                @auth
                    <a href="{{ route('profile.edit') }}" class="nav-user-name">{{ Auth::user()->name }}</a>
                    <a href="{{ route('citas.mis-citas') }}" class="nav-admin-link">Mis Citas</a>
                    @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.usuarios.index') }}" class="nav-admin-link">Usuarios</a>
                    <a href="{{ route('admin.citas.index') }}" class="nav-admin-link">Citas</a>
                    <a href="{{ route('admin.index') }}" class="nav-admin-link">Panel Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-btn">Cerrar Sesión</button>
                    </form>
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