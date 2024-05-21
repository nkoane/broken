<x-layout heading="jobs">
    <div class="flex items-center gap-2">
        <h2 class="text-4xl font-bold">Jobs</h2>
        <span>/</span>
        <h2 class="text-3xl">Edit</h2>
    </div>
    <x-forms.job action="{{ route('jobs.update', $job->id) }}" :job="$job" :employers="$employers" :method="'PATCH'"
        :cancel="route('jobs.show', $job->id)" />
</x-layout>
