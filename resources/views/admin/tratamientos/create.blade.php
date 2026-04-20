@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <h2>Nuevo Tratamiento</h2>
        
        <div class="admin-card">
            <form action="{{ route('admin.tratamientos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="titulo">Título *</label>
                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required>
                    @error('titulo')
                        <span style="color: #c53030; font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <span style="color: #c53030; font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*">
                    <span style="font-size: 12px; color: var(--color-texto-suave);">Tamaño máximo: 2MB. Formatos: JPG, PNG, WebP</span>
                    @error('imagen')
                        <span style="color: #c53030; font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="categoria">Categoría *</label>
                    <select name="categoria" id="categoria" required>
                        <option value="">Seleccionar...</option>
                        <option value="fisioterapia" {{ old('categoria') == 'fisioterapia' ? 'selected' : '' }}>Fisioterapia</option>
                        <option value="medicina_estetica" {{ old('categoria') == 'medicina_estetica' ? 'selected' : '' }}>Medicina Estética</option>
                    </select>
                    @error('categoria')
                        <span style="color: #c53030; font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn-form" style="width: auto; padding: 12px 24px;">Guardar Tratamiento</button>
                <a href="{{ route('admin.tratamientos.index') }}" class="btn-cancelar">← Tratamientos</a>
                <a href="{{ route('admin.index') }}" class="btn-editar">← Panel Admin</a>
            </form>
        </div>
    </div>
</div>
@endsection