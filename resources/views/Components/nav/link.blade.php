@props([
    'active',
])
<a
    {{ $attributes }}
    aria-current="{{ $active ? 'active' : 'false' }}"
    class="{{ $active ? 'outline outline-yellow-400' : '' }} px-2 py-1">
    {{ $slot }}
</a>
