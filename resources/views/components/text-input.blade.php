@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-group input']) }}>