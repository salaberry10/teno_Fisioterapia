@extends('layouts.app')

@section('content')
<div class="tratamientos-page">
    <!-- Tabs -->
    <div class="tabs-container">
        <button class="tab-btn active" data-category="fisioterapia">FISIOTERAPIA</button>
        <button class="tab-btn" data-category="medicina_estetica">MEDICINA ESTÉTICA</button>
    </div>

    <!-- Grid de tratamientos -->
    <div class="tratamientos-grid-container">
        <div class="tratamientos-grid" id="tratamientos-grid">
            @foreach($tratamientos->where('categoria', 'fisioterapia') as $index => $tratamiento)
            <div class="tratamiento-card {{ $index == 3 ? 'tratamiento-card-wide' : '' }}" 
                 data-id="{{ $tratamiento->id }}" 
                 data-titulo="{{ $tratamiento->titulo }}">
                @if($tratamiento->imagen)
                <img src="{{ asset('storage/' . $tratamiento->imagen) }}" alt="{{ $tratamiento->titulo }}">
                @else
                <div class="tratamiento-card-placeholder"></div>
                @endif
                <div class="tratamiento-card-overlay">
                    <span class="tratamiento-card-title">{{ $tratamiento->titulo }}</span>
                </div>
            </div>
            @endforeach
        </div>
        
        <p id="no-tratamientos" class="no-data" style="display: none; text-align: center; padding: 2rem;">
            No hay tratamientos en esta categoría.
        </p>
    </div>
</div>

<!-- Modal de formulario -->
<div class="modal" id="contacto-modal">
    <div class="modal-content">
        <button class="modal-close" id="modal-close">&times;</button>
        <h2>Solicitar Información</h2>
        <p class="modal-subtitle">Tratamiento: <span id="modal-tratamiento-nombre"></span></p>
        
        <form id="contacto-form" method="POST" action="{{ route('solicitud.store') }}">
            @csrf
            <input type="hidden" name="tratamiento_id" id="tratamiento_id">
            
            <div class="form-group">
                <label for="nombre">Nombre *</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" required>
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" id="telefono">
            </div>
            
            <div class="form-group">
                <label for="mensaje">Mensaje *</label>
                <textarea name="mensaje" id="mensaje" rows="4" required>Quiero información sobre este tratamiento.</textarea>
            </div>
            
            <button type="submit" class="btn-form">Enviar Solicitud</button>
        </form>
    </div>
</div>

<style>
.tratamientos-page {
    min-height: calc(100vh - 68px);
    padding-bottom: 3rem;
}

.tabs-container {
    display: flex;
    justify-content: center;
    gap: 1rem;
    padding: 2rem;
    background: white;
    border-bottom: 1px solid #e2e8f0;
}

.tab-btn {
    background: transparent;
    border: none;
    font-size: 14px;
    font-weight: 600;
    color: #718096;
    padding: 10px 24px;
    cursor: pointer;
    transition: all 0.2s;
    letter-spacing: 1px;
}

.tab-btn:hover {
    color: var(--color-principal);
}

.tab-btn.active {
    color: var(--color-principal);
    border-bottom: 2px solid var(--color-principal);
}

.tratamientos-grid-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.tratamientos-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}

.tratamiento-card {
    position: relative;
    height: 280px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
}

.tratamiento-card-wide {
    grid-column: span 2;
}

.tratamiento-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.tratamiento-card-placeholder {
    width: 100%;
    height: 100%;
    background: var(--color-muy-oscuro);
}

.tratamiento-card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(15, 84, 104, 0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s;
}

.tratamiento-card:hover .tratamiento-card-overlay {
    background: rgba(15, 84, 104, 0.5);
}

.tratamiento-card:hover img {
    transform: scale(1.05);
}

.tratamiento-card-title {
    color: white;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: center;
    padding: 0 1rem;
}

.tratamiento-card:hover .tratamiento-card-title {
    color: var(--color-principal);
}

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1000;
    align-items: center;
    justify-content: center;
}

.modal.active {
    display: flex;
}

.modal-content {
        background: white;
    border-radius: 12px;
    padding: 2rem;
    width: 90%;
    max-width: 480px;
    position: relative;
}

.modal-close {
    position: absolute;
    top: 12px;
    right: 16px;
    background: none;
    border: none;
    font-size: 28px;
    color: #718096;
    cursor: pointer;
}

.modal-close:hover {
    color: #2D3748;
}

.modal-content h2 {
    font-size: 1.4rem;
    margin-bottom: 0.5rem;
    color: var(--color-muy-oscuro);
}

.modal-subtitle {
    font-size: 14px;
    color: var(--color-texto-suave);
    margin-bottom: 1.5rem;
}

.modal-subtitle span {
    color: var(--color-principal);
    font-weight: 500;
}

/* Responsive */
@media (max-width: 768px) {
    .tratamientos-grid {
        grid-template-columns: 1fr;
    }
    
    .tratamiento-card-wide {
        grid-column: span 1;
    }
    
    .tabs-container {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const grid = document.getElementById('tratamientos-grid');
    const cards = document.querySelectorAll('.tratamiento-card');
    const noTratamientos = document.getElementById('no-tratamientos');
    
    // Modal
    const modal = document.getElementById('contacto-modal');
    const modalClose = document.getElementById('modal-close');
    const modalTratamientoNombre = document.getElementById('modal-tratamiento-nombre');
    const tratamientoInput = document.getElementById('tratamiento_id');
    
    // Cambiar tabs
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Actualizar botones activos
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filtrar tarjetas
            let visibleCount = 0;
            cards.forEach((card, index) => {
                const cardCategory = card.closest('[data-category]') ? 
                    card.closest('[data-category]').dataset.category : 
                    card.dataset.titulo; // Fallback para las tarjetas ya renderizadas
                
                if (card.dataset.titulo) {
                    // Las tarjetas tienen la categoría en el tratamiento original
                    // Necesitamos filtrar por la categoría del tratamiento
                    card.style.display = 'none';
                }
            });
            
            // Filtrar correctamente
            const tratamientos = @json($tratamientos);
            const filtered = tratamientos.filter(t => t.categoria === category);
            
            if (filtered.length === 0) {
                grid.style.display = 'none';
                noTratamientos.style.display = 'block';
            } else {
                grid.style.display = 'grid';
                noTratamientos.style.display = 'none';
                
                // Reconstruir el grid
                grid.innerHTML = '';
                filtered.forEach((t, i) => {
                    const isWide = i === 3; // La 4ª tarjeta es grande
                    const div = document.createElement('div');
                    div.className = 'tratamiento-card' + (isWide ? ' tratamiento-card-wide' : '');
                    div.dataset.id = t.id;
                    div.dataset.titulo = t.titulo;
                    div.onclick = () => abrirModal(t.id, t.titulo);
                    
                    if (t.imagen) {
                        div.innerHTML = `
                            <img src="/storage/${t.imagen}" alt="${t.titulo}">
                            <div class="tratamiento-card-overlay">
                                <span class="tratamiento-card-title">${t.titulo}</span>
                            </div>
                        `;
                    } else {
                        div.innerHTML = `
                            <div class="tratamiento-card-placeholder"></div>
                            <div class="tratamiento-card-overlay">
                                <span class="tratamiento-card-title">${t.titulo}</span>
                            </div>
                        `;
                    }
                    grid.appendChild(div);
                });
            }
        });
    });
    
    // Función abrir modal
    window.abrirModal = function(id, titulo) {
        tratamientoInput.value = id;
        modalTratamientoNombre.textContent = titulo;
        modal.classList.add('active');
    };
    
    // Cerrar modal
    modalClose.addEventListener('click', function() {
        modal.classList.remove('active');
    });
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
});
</script>
@endsection
