@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container" style="max-width: 600px;">
        <h2 style="color: var(--color-muy-oscuro); margin-bottom: 2rem;">Mi Perfil</h2>
        
        @if(session('status') === 'profile-updated')
            <div class="alert-exito">Cambios guardados correctamente</div>
        @endif

        <div class="admin-card">
            @include('profile.partials.update-profile-information-form')
        </div>
        
        <a href="{{ url('/') }}" class="btn-cancelar" style="margin-top: 1rem;">← Volver al inicio</a>
    </div>
</div>
@endsection