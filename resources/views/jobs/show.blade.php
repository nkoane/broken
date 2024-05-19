<x-layout heading="jobs">
    <div class="mb-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <h2 class="text-4xl font-bold">
                <a class="hover:underline" href="{{ route('jobs.index') }}">jobs</a>
            </h2>
            <!-- auth () -->
            /
            <h3 class="text-3xl">
                <a href="{{ route('jobs.show', $job->id) }}" class="text-blue-600 hover:underline">{{ $job->title }}</a>
            </h3>
        </div>
        <div class="">
            <a href="{{ route('jobs.edit', $job->id) }}" class="text-sky-600 hover:underline">edit,</a>
            <a href="{{ route('jobs.delete', $job->id) }}" class="text-sky-600 hover:underline">delete</a>
        </div>
    </div>

    <dl class="w-full">
        <dt class="mb-2 text-lg font-bold">
            #
            <a href="{{ route('jobs.employer', $job->employer->id) }}" class="text-sky-600 hover:underline">
                {{ $job->employer->name }}
            </a>
        </dt>
        <dd>{{ $job->description }}</dd>
        <dd>
            <strong>ZAR</strong>
            {{ number_format($job->salary, 0, '.', ' ') }}
        </dd>
    </dl>
</x-layout>
