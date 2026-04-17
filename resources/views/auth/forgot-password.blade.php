<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        ¿Olvidaste tu contraseña? No hay problema. Déjanos tu email y te enviaremos un enlace para restablecerla.
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button>
            {{ __('Enviar Enlace de Recuperación') }}
        </x-primary-button>
    </form>
</x-guest-layout>