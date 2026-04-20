@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container" style="max-width: 600px;">
        <h2 style="color: var(--color-muy-oscuro); margin-bottom: 2rem; text-align: center;">Pedir Cita</h2>
        
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('citas.store') }}" class="admin-form" style="background: var(--color-blanco); padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            @csrf
            
            <div class="form-group">
                <label for="tipo" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--color-texto);">Tipo de Servicio</label>
                <select name="tipo" id="tipo" required onchange="actualizarHoras()" style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 14px; background: var(--color-blanco);">
                    <option value="">Selecciona un servicio</option>
                    <option value="fisioterapia">Fisioterapia</option>
                    <option value="presoterapia">Presoterapia</option>
                </select>
                @error('tipo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="fecha" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--color-texto);">Fecha</label>
                <input type="date" name="fecha" id="fecha" required min="{{ date('Y-m-d') }}" onchange="actualizarHoras()" style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 14px;">
                @error('fecha')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" id="grupo-hora" style="display: none;">
                <label for="hora" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--color-texto);">Hora Disponible</label>
                <select name="hora" id="hora" required style="width: 100%; padding: 12px; border: 2px solid var(--color-principal); border-radius: 8px; font-size: 14px; background: var(--color-claro);">
                    <option value="">Selecciona una hora</option>
                </select>
                @error('hora')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="observaciones" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--color-texto);">Observaciones</label>
                <textarea name="observaciones" id="observaciones" rows="4" placeholder="Describe tu dolencia o motivo de la consulta..." style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 14px; resize: vertical;"></textarea>
                @error('observaciones')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions" style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                <button type="submit" class="btn-guardar" style="flex: 1; padding: 14px; background: var(--color-principal); color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 500; cursor: pointer; transition: background 0.2s;">Solicitar Cita</button>
                <a href="{{ route('citas.mis-citas') }}" class="btn-cancelar" style="padding: 14px 24px; background: #e2e8f0; color: var(--color-texto); border-radius: 8px; font-size: 14px; text-align: center;">Ver Mis Citas</a>
            </div>
        </form>
    </div>
</div>

<script>
const horarios = @json($horarios);
const tipoSeleccionado = document.getElementById('tipo');

function actualizarHoras() {
    const tipo = document.getElementById('tipo').value;
    const fecha = document.getElementById('fecha').value;
    const horaSelect = document.getElementById('hora');
    const grupoHora = document.getElementById('grupo-hora');
    
    horaSelect.innerHTML = '<option value="">Selecciona una hora</option>';
    grupoHora.style.display = 'none';
    
    if (!tipo || !fecha) {
        return;
    }
    
    const fechaObj = new Date(fecha + 'T00:00:00');
    let diaSemana = fechaObj.getDay();
    
    // Convertir: JavaScript 0=domingo, BD 1=Lunes. Si es domingo (0), convertir a 7 para comparar
    if (diaSemana === 0) diaSemana = 7;
    
    const horariosFiltrados = horarios.filter(h => 
        h.tipo === tipo && 
        h.dia_semana === diaSemana && 
        h.activo == 1
    );
    
    if (horariosFiltrados.length === 0) {
        // Mostrar mensaje según el día
        const nombresDias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        const nombreDia = nombresDias[fechaObj.getDay()];
        horaSelect.innerHTML = '<option value="">No hay disponibilidad el ' + nombreDia + '</option>';
        grupoHora.style.display = 'block';
        return;
    }
    
    // Ordenar por turno (manana primero)
    horariosFiltrados.sort((a, b) => (a.turno === 'manana' ? -1 : 1));
    
    horariosFiltrados.forEach(horario => {
        const inicio = convertirAHoras(horario.hora_inicio);
        const fin = convertirAHoras(horario.hora_fin);
        
        for (let h = inicio; h < fin; h += 0.5) {
            const horaStr = Math.floor(h).toString().padStart(2, '0') + ':' + ((h % 1) * 60).toString().padStart(2, '0');
            const option = document.createElement('option');
            option.value = horaStr;
            option.textContent = horaStr + (horario.turno === 'manana' ? ' (Mañana)' : ' (Tarde)');
            horaSelect.appendChild(option);
        }
    });
    
    grupoHora.style.display = 'block';
}

function convertirAHoras(timeStr) {
    const [horas, minutos] = timeStr.split(':').map(Number);
    return horas + (minutos / 60);
}
</script>
@endsection