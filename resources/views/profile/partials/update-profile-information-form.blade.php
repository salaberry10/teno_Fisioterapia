@php
$esAdmin = Auth::user()->is_admin ?? false;
@endphp

<section>
    <header>
        <h2 class="text-lg font-medium" style="color: var(--color-muy-oscuro);">
            Mi Perfil
        </h2>

        <p class="mt-1 text-sm" style="color: var(--color-texto-suave);">
            Actualiza tu información personal.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">
                Nombre @if(!$esAdmin)<span style="color: var(--color-texto-suave); font-weight: normal;">(solo admin puede cambiar)</span>@endif
            </label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" 
                @if(!$esAdmin) readonly style="background: #f3f4f6; cursor: not-allowed;" @endif
                style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px;">
        </div>

        <div class="form-group">
            <label for="apellidos" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">
                Apellidos @if(!$esAdmin)<span style="color: var(--color-texto-suave); font-weight: normal;">(solo admin puede cambiar)</span>@endif
            </label>
            <input id="apellidos" name="apellidos" type="text" value="{{ old('apellidos', $user->apellidos) }}"
                @if(!$esAdmin) readonly style="background: #f3f4f6; cursor: not-allowed;" @endif
                style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px;">
        </div>

        <div class="form-group">
            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">
                Email @if(!$esAdmin)<span style="color: var(--color-texto-suave); font-weight: normal;">(solo admin puede cambiar)</span>@endif
            </label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                @if(!$esAdmin) readonly style="background: #f3f4f6; cursor: not-allowed;" @endif
                style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px;">
        </div>

        <div class="form-group">
            <label for="telefono" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">
                Teléfono @if(!$esAdmin)<span style="color: var(--color-texto-suave); font-weight: normal;">(solo admin puede cambiar)</span>@endif
            </label>
            <input id="telefono" name="telefono" type="text" value="{{ old('telefono', $user->telefono) }}"
                @if(!$esAdmin) readonly style="background: #f3f4f6; cursor: not-allowed;" @endif
                placeholder="Ej: 666 123 456" 
                style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px;">
        </div>

        <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 1.5rem 0;">

        <div class="form-group">
            <label for="fecha_nacimiento" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Fecha de Nacimiento</label>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}" style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px;">
        </div>

        <div class="form-group">
            <label for="direccion" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Dirección</label>
            <input id="direccion" name="direccion" type="text" value="{{ old('direccion', $user->direccion) }}" placeholder="Calle, número, piso..." style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px;">
        </div>

        <div class="form-group">
            <label for="localidad" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Localidad</label>
            <input id="localidad" name="localidad" type="text" value="{{ old('localidad', $user->localidad) }}" placeholder="Ciudad/Pueblo" style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px;">
        </div>

        <div class="form-group">
            <label for="observaciones_medicas" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Observaciones Médicas</label>
            <textarea id="observaciones_medicas" name="observaciones_medicas" rows="3" placeholder="Alergias, medicamentos, lesiones..." style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px;">{{ old('observaciones_medicas', $user->observaciones_medicas) }}</textarea>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" style="padding: 12px 24px; background: var(--color-principal); color: white; border: none; border-radius: 8px; font-weight: 500; cursor: pointer;">Guardar Cambios</button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm" style="color: var(--color-principal);">Guardado correctamente.</p>
            @endif
        </div>
    </form>
</section>