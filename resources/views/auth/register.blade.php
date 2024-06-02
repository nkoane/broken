<x-layout heading="register">
    <div class="flex items-center gap-2">
        <h2 class="text-4xl font-bold">Authenticate</h2>
        <span>/</span>
        <h2 class="text-3xl">Up</h2>
    </div>
    <x-forms.auth.register action="{{ route('register.store') }}" />
</x-layout>
