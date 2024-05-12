@props([
    'active' => false,
])
<a
    {{ $attributes }}
    aria-current="{{ $active ? 'active' : 'false' }}"
    class="{{ $active ? ' outline outline-black ' : '' }} px-2 py-1 transition-colors duration-75">
    {{ $slot }}
</a>
