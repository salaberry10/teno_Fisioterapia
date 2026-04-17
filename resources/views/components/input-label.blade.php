@props(['value'])

<label {{ $attributes->merge(['class' => 'form-group label']) }}>
    {{ $value ?? $slot }}
</label>