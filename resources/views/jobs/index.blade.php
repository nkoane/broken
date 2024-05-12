<x-layout heading="jobs">
    <h2 class="text-4xl font-bold">Jobs</h2>

    @if (! empty($jobs))
        <ol class="flex flex-wrap gap-2">
            @foreach ($jobs as $job)
                <li class="w-1/4 flex-grow bg-gray-50 p-4">
                    <dl class="w-full">
                        <dt class="mb-2 text-xl font-bold">
                            <a class="text-blue-600 hover:underline" href="jobs/{{ $job['id'] }}">{{ $job['title'] }}</a>
                        </dt>
                        <dd>{{ $job['description'] }}</dd>
                        <dd>
                            <strong>ZAR</strong>
                            {{ number_format($job['salary'], 0, '.', ' ') }}
                        </dd>
                    </dl>
                </li>
            @endforeach
        </ol>
    @else
        <p><em>no jobs</em></p>
    @endif
</x-layout>
