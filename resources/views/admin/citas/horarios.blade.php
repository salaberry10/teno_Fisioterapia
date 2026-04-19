@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Configurar Horarios</h2>
        
        @if(session('success'))
            <div class="alert-exito">{{ session('success') }}</div>
        @endif
        
        <form method="POST" action="{{ route('admin.citas.horarios.update') }}" class="admin-form">
            @csrf
            
            <div class="horarios-section">
                <h3>Fisioterapia</h3>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[0][activo]" value="1" {{ isset($horarios->first()->activo) && $horarios->first()->activo ? 'checked' : '' }}> Lunes</label>
                    <input type="time" name="horarios[0][hora_inicio]" value="10:00">
                    <input type="time" name="horarios[0][hora_fin]" value="14:00">
                    <input type="hidden" name="horarios[0][tipo]" value="fisioterapia">
                    <input type="hidden" name="horarios[0][dia_semana]" value="1">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[1][activo]" value="1" checked> Martes</label>
                    <input type="time" name="horarios[1][hora_inicio]" value="10:00">
                    <input type="time" name="horarios[1][hora_fin]" value="14:00">
                    <input type="hidden" name="horarios[1][tipo]" value="fisioterapia">
                    <input type="hidden" name="horarios[1][dia_semana]" value="2">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[2][activo]" value="1" checked> Miércoles</label>
                    <input type="time" name="horarios[2][hora_inicio]" value="10:00">
                    <input type="time" name="horarios[2][hora_fin]" value="14:00">
                    <input type="hidden" name="horarios[2][tipo]" value="fisioterapia">
                    <input type="hidden" name="horarios[2][dia_semana]" value="3">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[3][activo]" value="1" checked> Jueves</label>
                    <input type="time" name="horarios[3][hora_inicio]" value="10:00">
                    <input type="time" name="horarios[3][hora_fin]" value="14:00">
                    <input type="hidden" name="horarios[3][tipo]" value="fisioterapia">
                    <input type="hidden" name="horarios[3][dia_semana]" value="4">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[4][activo]" value="1" checked> Viernes</label>
                    <input type="time" name="horarios[4][hora_inicio]" value="10:00">
                    <input type="time" name="horarios[4][hora_fin]" value="14:00">
                    <input type="hidden" name="horarios[4][tipo]" value="fisioterapia">
                    <input type="hidden" name="horarios[4][dia_semana]" value="5">
                </div>
            </div>
            
            <div class="horarios-section">
                <h3>Presoterapia</h3>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[5][activo]" value="1" checked> Lunes</label>
                    <input type="time" name="horarios[5][hora_inicio]" value="16:00">
                    <input type="time" name="horarios[5][hora_fin]" value="20:00">
                    <input type="hidden" name="horarios[5][tipo]" value="presoterapia">
                    <input type="hidden" name="horarios[5][dia_semana]" value="1">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[6][activo]" value="1" checked> Martes</label>
                    <input type="time" name="horarios[6][hora_inicio]" value="16:00">
                    <input type="time" name="horarios[6][hora_fin]" value="20:00">
                    <input type="hidden" name="horarios[6][tipo]" value="presoterapia">
                    <input type="hidden" name="horarios[6][dia_semana]" value="2">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[7][activo]" value="1" checked> Miércoles</label>
                    <input type="time" name="horarios[7][hora_inicio]" value="16:00">
                    <input type="time" name="horarios[7][hora_fin]" value="20:00">
                    <input type="hidden" name="horarios[7][tipo]" value="presoterapia">
                    <input type="hidden" name="horarios[7][dia_semana]" value="3">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[8][activo]" value="1" checked> Jueves</label>
                    <input type="time" name="horarios[8][hora_inicio]" value="16:00">
                    <input type="time" name="horarios[8][hora_fin]" value="20:00">
                    <input type="hidden" name="horarios[8][tipo]" value="presoterapia">
                    <input type="hidden" name="horarios[8][dia_semana]" value="4">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[9][activo]" value="1" checked> Viernes</label>
                    <input type="time" name="horarios[9][hora_inicio]" value="16:00">
                    <input type="time" name="horarios[9][hora_fin]" value="20:00">
                    <input type="hidden" name="horarios[9][tipo]" value="presoterapia">
                    <input type="hidden" name="horarios[9][dia_semana]" value="5">
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-guardar">Guardar Horarios</button>
                <a href="{{ route('admin.citas.index') }}" class="btn-cancelar">← Volver</a>
            </div>
        </form>
    </div>
</div>
@endsection