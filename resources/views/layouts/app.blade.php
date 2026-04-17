<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="/">Inicio</a>
            <a href="#">Tratamientos</a>
            <a href="#">Contacto</a>
            <a href="/sobre-nosotros">Sobre Nosotros</a>
        </div>
        <div class="nav-actions">
            <a href="/login" class="nav-btn">Iniciar Sesión</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; 2026 Teno Fisioterapia</p>
    </footer>
</body>
</html>