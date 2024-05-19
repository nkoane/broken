<x-layout heading="jobs">
    <h2 class="text-4xl font-bold">Jobs</h2>
    <h3 class="text-2xl font-bold">{{ $job->id }}</h3>

    <dl class="w-full">
        <dt class="mb-2 text-lg font-bold">{{ $job->title }}</dt>
        <dd>{{ $job->description }}</dd>
        <dd>
            <strong>ZAR</strong>
            {{ number_format($job->salary, 0, '.', ' ') }}
        </dd>
    </dl>
</x-layout>
