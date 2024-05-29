@props([
    'active' => false,
    'type' => 'anchor',
])

@if ($type == 'button')
    <form {{ $attributes }}>
        @csrf
        <button type="submit">{{ $slot }}</button>
    </form>
@elseif ($type == 'anchor')
    <a
        {{ $attributes }}
        aria-current="{{ $active ? 'active' : 'false' }}"
        class="{{ $active ? ' outline outline-black ' : '???' }} px-2 py-1 text-blue-500"
    >
        {{ $slot }}
    </a>
@endif
