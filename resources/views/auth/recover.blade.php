<x-layout heading="register">
    <div class="flex items-center gap-2">
        <h2 class="text-4xl font-bold">Auth</h2>
        <span>/</span>
        <h2 class="text-3xl">Recover</h2>
    </div>
    <x-forms.auth.recover action="{{ route('auth.recover') }}" />
</x-layout>
