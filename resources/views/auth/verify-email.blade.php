<x-guest-layout>
    <h2>Verifica tu Email</h2>
    <p class="auth-sub">Gracias por registrarte. Antes de continuar, verifica tu email haciendo clic en el enlace que te enviamos.</p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert-exito">
            Se ha enviado un nuevo enlace de verificación al email que proporcionaste.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <x-primary-button>
            {{ __('Reenviar Email de Verificación') }}
        </x-primary-button>
    </form>

    <form method="POST" action="{{ route('logout') }}" style="margin-top: 1rem;">
        @csrf
        <button type="submit" style="color: var(--color-principal); background: none; border: none; cursor: pointer; font-size: 14px;">
            {{ __('Cerrar Sesión') }}
        </button>
    </form>
</x-guest-layout>