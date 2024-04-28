<!--
    <a href="{{ $href }}" class="block px-1 font-bold text-yellow-600 transition-all duration-500 hover:bg-yellow-300 hover:text-black">
        {{ $slot }}
    </a>
//-->
{{-- <a    {{ $attributes->merge(['class' => 'block font-bold text-yellow-600 transition-all duration-500 hover:bg-yellow-300 hover:text-black']) }}> --}}
<a {{ $attributes }}>
    {{ $slot }}
</a>

<style>
    nav a {
        padding: 0.5rem 1rem;
    }
    nav a.active {
        outline: 2px solid currentColor;
    }
</style>
