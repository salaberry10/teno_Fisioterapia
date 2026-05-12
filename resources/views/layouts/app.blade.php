<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Teno Fisioterapia</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

            {{-- Botón hamburguesa (solo visible en móvil) --}}
            <button class="hamburguesa" id="btn-hamburguesa" aria-label="Menú">
                <i class="fas fa-bars"></i>
            </button>

            <div class="nav-right" id="nav-right">
                <div class="nav-links">
                    <a href="{{ url('/') }}" class="{{ request()->routeIs('inicio') ? 'activo' : '' }}">Inicio</a>
                    <a href="{{ url('/tratamientos') }}" class="{{ request()->routeIs('tratamientos') || request()->routeIs('tratamiento.show') ? 'activo' : '' }}">Tratamientos</a>
                    <a href="{{ route('sobre-nosotros') }}" class="{{ request()->routeIs('sobre-nosotros') ? 'activo' : '' }}">Sobre Nosotros</a>
                    <a href="{{ route('contacto') }}" class="{{ request()->routeIs('contacto') ? 'activo' : '' }}">Contacto</a>
                    @guest
                        <a href="{{ route('login') }}" class="nav-link-login">Iniciar Sesión</a>
                    @endguest
                </div>
                @auth
                    <a href="{{ route('profile.edit') }}" class="nav-user-name">{{ Auth::user()->name }}</a>
                    @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.usuarios.index') }}" class="nav-admin-link">Usuarios</a>
                    <a href="{{ route('admin.citas.index') }}" class="nav-admin-link">Citas</a>
                    <a href="{{ route('admin.index') }}" class="nav-admin-link">Panel Admin</a>
                    @else
                    <a href="{{ route('citas.mis-citas') }}" class="nav-admin-link">Mis Citas</a>
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

        <footer class="footer-nuevo">
            <div class="footer-grid">
                {{-- Columna 1: Logo --}}
                <div class="footer-col footer-col-logo">
                    <img src="{{ asset('img/logo.png') }}" alt="Teno" class="footer-logo-img">
                    <div class="footer-logo-text">
                        <span class="logo-name">TENO</span>
                        <span class="logo-sub">Fisioterapia</span>
                    </div>
                </div>

                {{-- Columna 2: Explorar --}}
                <div class="footer-col">
                    <h4>Explorar</h4>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li><a href="{{ route('sobre-nosotros') }}">Sobre Nosotros</a></li>
                        <li><a href="{{ url('/tratamientos') }}">Tratamientos</a></li>
                        <li><a href="{{ route('contacto') }}">Contacto</a></li>
                    </ul>
                </div>

                {{-- Columna 3: Contacto --}}
                <div class="footer-col">
                    <h4>Contacto</h4>
                    <ul class="footer-contacto">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Av. de Andalucía, Nº10, Bajo<br>18640 Padul, Granada</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:tenofisioterapia@gmail.com">tenofisioterapia@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+34667303730">667 303 730</a>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>L-J: 10:00-14:00 / 16:00-20:00<br>V: 10:00-14:00<br>S-D: Cerrado</span>
                        </li>
                    </ul>
                </div>

                {{-- Columna 4: Reservar cita --}}
                <div class="footer-col">
                    <h4>Reservar cita</h4>
                    <p>Reserva tu cita online de forma rápida y sencilla.</p>
                    <a href="{{ auth()->check() ? route('citas.create') : route('login') }}" class="footer-btn-reservar">Reservar</a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2026 Teno Fisioterapia. Todos los derechos reservados.</p>
            </div>
        </footer>

        <!-- Botones flotantes de contacto -->
        <div class="botones-flotantes">
            <a href="https://wa.me/34667303730" target="_blank" class="boton-flotante boton-whatsapp" title="WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="tel:+34667303730" class="boton-flotante boton-telefono" title="Llamar">
                <i class="fas fa-phone"></i>
            </a>
            <a href="mailto:tenofisioterapia@gmail.com" class="boton-flotante boton-email" title="Email">
                <i class="fas fa-envelope"></i>
            </a>
        </div>

        {{-- Script del menú hamburguesa --}}
        <script>
            document.getElementById('btn-hamburguesa').addEventListener('click', function() {
                document.getElementById('nav-right').classList.toggle('menu-abierto');
            });
        </script>
    </body>
</html>