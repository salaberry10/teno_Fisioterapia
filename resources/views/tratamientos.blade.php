@extends('layouts.app')

@if(session('success'))
    <div class="alert-exito" style="text-align: center; margin: 1rem 2rem;">
        {{ session('success') }}
    </div>
@endif

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
            <a href="{{ route('tratamiento.show', $tratamiento->slug) }}" class="tratamiento-card {{ $index == 3 ? 'tratamiento-card-wide' : '' }}">
                @if($tratamiento->imagen)
                <img src="{{ asset('storage/' . $tratamiento->imagen) }}" alt="{{ $tratamiento->titulo }}">
                @else
                <div class="tratamiento-card-placeholder"></div>
                @endif
                <div class="tratamiento-card-overlay">
                    <span class="tratamiento-card-title">{{ $tratamiento->titulo }}</span>
                </div>
            </a>
            @endforeach
        </div>
        
        <p id="no-tratamientos" class="no-data" style="display: none; text-align: center; padding: 2rem;">
            No hay tratamientos en esta categoría.
        </p>
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
    display: block;
    position: relative;
    height: 280px;
    border-radius: 12px;
    overflow: hidden;
    text-decoration: none;
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
    const noTratamientos = document.getElementById('no-tratamientos');
    
    // Cambiar tabs
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Actualizar botones activos
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filtrar correctamente
            const tratamientos = @json($tratamientos);
            const filtered = tratamientos.filter(t => t.categoria === category);
            
            if (filtered.length === 0) {
                grid.style.display = 'none';
                noTratamientos.style.display = 'block';
            } else {
                grid.style.display = 'grid';
                noTratamientos.style.display = 'none';
                
                // Reconstruir el grid con enlaces
                grid.innerHTML = '';
                filtered.forEach((t, i) => {
                    const isWide = i === 3; // La 4ª tarjeta es grande
                    const a = document.createElement('a');
                    a.href = '/tratamiento/' + t.slug;
                    a.className = 'tratamiento-card' + (isWide ? ' tratamiento-card-wide' : '');
                    
                    if (t.imagen) {
                        a.innerHTML = `
                            <img src="/storage/${t.imagen}" alt="${t.titulo}">
                            <div class="tratamiento-card-overlay">
                                <span class="tratamiento-card-title">${t.titulo}</span>
                            </div>
                        `;
                    } else {
                        a.innerHTML = `
                            <div class="tratamiento-card-placeholder"></div>
                            <div class="tratamiento-card-overlay">
                                <span class="tratamiento-card-title">${t.titulo}</span>
                            </div>
                        `;
                    }
                    grid.appendChild(a);
                });
            }
        });
    });
});
</script>
@endsection