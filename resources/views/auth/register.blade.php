<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2>Crear Cuenta</h2>
    <p class="auth-sub">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button>
            {{ __('Registrarse') }}
        </x-primary-button>
    </form>
</x-guest-layout>