@props([
    'active' => false,
    'type' => 'anchor',
])

@if ($type == 'button')
    <form {{ $attributes }}>
        <button type="submit">{{ $slot }}</button>
    </form>
@else
    <a
        {{ $attributes }}
        aria-current="{{ $active ? 'active' : 'false' }}"
        class="{{ $active ? ' outline outline-black ' : '' }} px-2 py-1 transition-colors duration-75">
        {{ $slot }}
    </a>
@endif
