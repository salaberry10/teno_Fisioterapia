<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2>Iniciar Sesión</h2>
    <p class="auth-sub">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="form-group">
            <label class="inline-flex">
                <input type="checkbox" name="remember">
                <span>Recordarme</span>
            </label>
        </div>

        <x-primary-button>
            {{ __('Iniciar Sesión') }}
        </x-primary-button>

        @if (Route::has('password.request'))
            <div class="auth-footer">
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            </div>
        @endif
    </form>
</x-guest-layout>