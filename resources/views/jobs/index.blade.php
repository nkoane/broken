<x-layout heading="jobs">
    <h2 class="text-4xl font-bold">Jobs</h2>

    @if (! empty($jobs))
        <ol class="flex flex-wrap gap-2">
            @foreach ($jobs as $job)
                <li class="w-1/4 flex-grow bg-gray-50 p-4 py-2 even:bg-blue-100 hover:bg-slate-100">
                    <dl class="flex h-full w-full flex-col">
                        <dt class="mb-2 text-xl font-bold">
                            <a class="text-blue-600 hover:underline" href="{{ route('jobs.job.show', $job->id) }}">{{ $job['title'] }}</a>
                        </dt>
                        <dd class="g-yellow-100 flex-grow pb-1">
                            {{ $job->description }}
                        </dd>
                        <dd class="border-t pt-2">
                            <strong>ZAR</strong>
                            {{ number_format($job->salary, 0, '.', ' ') }}
                        </dd>
                    </dl>
                </li>
            @endforeach
        </ol>
    @else
        <p><em>no jobs</em></p>
    @endif
</x-layout>
