<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-form']) }}>
    {{ $slot }}
</button>