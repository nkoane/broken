<x-layout heading="register">
    <div class="flex items-center gap-2">
        <h2 class="text-4xl font-bold">Register</h2>
        <span>/</span>
        <h2 class="text-3xl">Sign up</h2>
    </div>
    <x-forms.register action="{{ route('register.store') }}" />
</x-layout>
