@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Pedir Cita</h2>
        
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('citas.store') }}" class="admin-form">
            @csrf
            
            <div class="form-group">
                <label for="tipo">Tipo de Serviço</label>
                <select name="tipo" id="tipo" required>
                    <option value="">Selecciona un serviço</option>
                    <option value="fisioterapia">Fisioterapia</option>
                    <option value="presoterapia">Presoterapia</option>
                </select>
                @error('tipo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" required min="{{ date('Y-m-d') }}">
                @error('fecha')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="hora">Hora</label>
                <select name="hora" id="hora" required>
                    <option value="">Selecciona un horario</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                </select>
                @error('hora')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" rows="4" placeholder="Describe tu dolencia o motivo de la consulta..."></textarea>
                @error('observaciones')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-guardar">Solicitar Cita</button>
                <a href="{{ route('citas.mis-citas') }}" class="btn-cancelar">Ver Mis Citas</a>
            </div>
        </form>
    </div>
</div>
@endsection