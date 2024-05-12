<x-layout heading="jobs">
    <h2>Jobs : {{ $job['title'] }}</h2>

    <dl class="w-full">
        <dt class="mb-2 text-xl font-bold">
            <a class="text-blue-600" href="jobs/{{ $job['id'] }}">{{ $job['title'] }}</a>
        </dt>
        <dd>{{ $job['description'] }}</dd>
        <dd>
            <strong>ZAR</strong>
            {{ number_format($job['salary'], 0, '.', ' ') }}
        </dd>
    </dl>
</x-layout>
