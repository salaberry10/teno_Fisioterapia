<x-guest-layout>
    <h2>Confirmar Contraseña</h2>
    <p class="auth-sub">Esta es un área segura. Por favor, confirma tu contraseña antes de continuar.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-primary-button>
            {{ __('Confirmar') }}
        </x-primary-button>
    </form>
</x-guest-layout>