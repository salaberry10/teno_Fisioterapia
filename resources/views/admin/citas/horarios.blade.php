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
                
                @foreach(['1' => 'Lunes', '2' => 'Martes', '3' => 'Miércoles', '4' => 'Jueves', '5' => 'Viernes'] as $dia => $nombre)
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[{{ $dia }}][manana][activo]" value="1" checked> {{ $nombre }} - Mañana</label>
                    <input type="time" name="horarios[{{ $dia }}][manana][hora_inicio]" value="10:00">
                    <input type="time" name="horarios[{{ $dia }}][manana][hora_fin]" value="14:00">
                    <input type="hidden" name="horarios[{{ $dia }}][manana][tipo]" value="fisioterapia">
                    <input type="hidden" name="horarios[{{ $dia }}][manana][dia_semana]" value="{{ $dia }}">
                    <input type="hidden" name="horarios[{{ $dia }}][manana][turno]" value="manana">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[{{ $dia }}][tarde][activo]" value="1" checked> {{ $nombre }} - Tarde</label>
                    <input type="time" name="horarios[{{ $dia }}][tarde][hora_inicio]" value="16:00">
                    <input type="time" name="horarios[{{ $dia }}][tarde][hora_fin]" value="20:00">
                    <input type="hidden" name="horarios[{{ $dia }}][tarde][tipo]" value="fisioterapia">
                    <input type="hidden" name="horarios[{{ $dia }}][tarde][dia_semana]" value="{{ $dia }}">
                    <input type="hidden" name="horarios[{{ $dia }}][tarde][turno]" value="tarde">
                </div>
                @endforeach
            </div>
            
            <div class="horarios-section">
                <h3>Presoterapia</h3>
                
                @foreach(['1' => 'Lunes', '2' => 'Martes', '3' => 'Miércoles', '4' => 'Jueves', '5' => 'Viernes'] as $dia => $nombre)
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[p{{ $dia }}][manana][activo]" value="1" checked> {{ $nombre }} - Mañana</label>
                    <input type="time" name="horarios[p{{ $dia }}][manana][hora_inicio]" value="10:00">
                    <input type="time" name="horarios[p{{ $dia }}][manana][hora_fin]" value="14:00">
                    <input type="hidden" name="horarios[p{{ $dia }}][manana][tipo]" value="presoterapia">
                    <input type="hidden" name="horarios[p{{ $dia }}][manana][dia_semana]" value="{{ $dia }}">
                    <input type="hidden" name="horarios[p{{ $dia }}][manana][turno]" value="manana">
                </div>
                <div class="horario-dia">
                    <label><input type="checkbox" name="horarios[p{{ $dia }}][tarde][activo]" value="1" checked> {{ $nombre }} - Tarde</label>
                    <input type="time" name="horarios[p{{ $dia }}][tarde][hora_inicio]" value="16:00">
                    <input type="time" name="horarios[p{{ $dia }}][tarde][hora_fin]" value="20:00">
                    <input type="hidden" name="horarios[p{{ $dia }}][tarde][tipo]" value="presoterapia">
                    <input type="hidden" name="horarios[p{{ $dia }}][tarde][dia_semana]" value="{{ $dia }}">
                    <input type="hidden" name="horarios[p{{ $dia }}][tarde][turno]" value="tarde">
                </div>
                @endforeach
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-guardar">Guardar Horarios</button>
                <a href="{{ route('admin.citas.index') }}" class="btn-cancelar">← Citas</a>
                <a href="{{ route('admin.index') }}" class="btn-cancelar">← Panel Admin</a>
            </div>
        </form>
    </div>
</div>
@endsection