# Teno Fisioterapia

Aplicación web para la gestión de citas y servicios de la clínica Teno Fisioterapia, ubicada en Padul (Granada). Permite a los pacientes consultar tratamientos, reservar citas online y contactar con la clínica, y al administrador gestionar todos los datos desde un panel privado.

Proyecto Fin de Grado del ciclo formativo de Desarrollo de Aplicaciones Web (2.º DAW), curso 2025/2026.


## Demo

URL del repositorio: https://github.com/salaberry10/teno_Fisioterapia


## Funcionalidades

**Zona pública**
- Catálogo de tratamientos divididos en dos categorías (Fisioterapia y Medicina Estética).
- Página de detalle por cada tratamiento con formulario de solicitud de información.
- Página "Sobre Nosotros" con biografía del fisioterapeuta y datos de la clínica.
- Formulario de contacto general.
- Diseño responsive adaptado a móvil, tablet y escritorio.

**Zona cliente**
- Registro e inicio de sesión con validaciones.
- Recuperación de contraseña por correo electrónico.
- Reserva de cita con disponibilidad real (filtra las horas ya ocupadas y las pasadas).
- Cancelación de cita con la restricción de al menos 24 horas de antelación.
- Email automático de confirmación.
- Edición del perfil personal.

**Zona administrador**
- CRUD de tratamientos con subida de imágenes.
- Gestión de citas con filtrado y cambio de estado.
- Configuración de horarios semanales por tipo de servicio.
- Promoción o degradación de usuarios al rol de administrador.
- Bandeja de solicitudes recibidas desde los formularios.
- Notificaciones automáticas al recibir nuevas reservas, cancelaciones o solicitudes.


## Stack tecnológico

- Backend: PHP 8.2, Laravel 12, Eloquent ORM, Blade.
- Frontend: HTML5, CSS3, JavaScript (sin framework), Font Awesome 6.
- Base de datos: MySQL 8.
- Servidor local: XAMPP.
- Control de versiones: Git, GitHub.
- Envío de emails: Gmail SMTP mediante App Password.


## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL 8.0 o superior
- XAMPP (recomendado)
- Git
- Cuenta de Gmail con verificación en dos pasos activada


## Instalación

Clonar el repositorio:

```
git clone https://github.com/salaberry10/teno_Fisioterapia.git
cd teno_Fisioterapia
```

Instalar dependencias de Composer:

```
composer install
```

Copiar el archivo de entorno y generar la clave de aplicación:

```
cp .env.example .env
php artisan key:generate
```

Configurar la conexión a la base de datos en el archivo `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teno_fisioterapia
DB_USERNAME=root
DB_PASSWORD=
```

Crear la base de datos en phpMyAdmin con el nombre `teno_fisioterapia` y ejecutar las migraciones:

```
php artisan migrate
```

Con XAMPP arrancado, la aplicación quedará disponible en:

```
http://localhost/teno_Fisioterapia/public
```


## Configuración del correo

El proyecto utiliza Gmail SMTP para todos los envíos de email (recuperación de contraseña, confirmación de citas y notificaciones al administrador).

Para configurarlo:

1. Activar la verificación en dos pasos en la cuenta de Google (https://myaccount.google.com/security).
2. Generar una App Password de 16 caracteres (https://myaccount.google.com/apppasswords).
3. Añadir la configuración al archivo `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu_email@gmail.com
MAIL_PASSWORD=tu_app_password_sin_espacios
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=tu_email@gmail.com
MAIL_FROM_NAME="Teno Fisioterapia"
```

4. Limpiar la caché de configuración:

```
php artisan config:clear
```


## Estructura del proyecto

```
teno_Fisioterapia/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/         Controladores del panel admin
│   │   └── Publico/       Controladores de la zona pública
│   ├── Models/             Modelos Eloquent
│   ├── Notifications/      Clases de notificación por email
│   └── Policies/           Policies de autorización
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── css/style.css
│   └── img/
├── resources/views/
│   ├── admin/
│   ├── auth/
│   ├── layouts/
│   └── publico/
├── routes/web.php
├── .env.example
└── README.md
```


## Crear un usuario administrador

Para crear el primer usuario admin, registrarse normalmente desde `/register` y después actualizar manualmente el campo `is_admin` a `1` en la tabla `users` desde phpMyAdmin.

A partir de ese momento, ese usuario tendrá acceso a la zona `/admin`.


## Autor

Jose Manuel Salaberry Hidalgo
GitHub: https://github.com/salaberry10


## Licencia

Proyecto desarrollado con fines académicos como Trabajo Fin de Grado del ciclo superior  DAW.
