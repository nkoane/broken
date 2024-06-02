<x-layout heading="jobs">
    <div class="flex items-center gap-2">
        <h2 class="text-4xl font-bold">Jobs</h2>
        <span>/</span>
        <h2 class="text-3xl">Create</h2>
    </div>
    <x-forms.job action="{{ route('jobs.store') }}" :employers="$employers" :job="$job" />
</x-layout>
